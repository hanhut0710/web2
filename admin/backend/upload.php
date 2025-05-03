<?php
class Upload {
    private $targetDir = "../../img/shoes/";
    private $allowedType = ["image/jpeg", "image/jpg", "image/png", "image/pjpeg"];
    private $maxSize = 2 * 1024 * 1024; 

    public function uploadImage($file, $index = null) 
    {
        // Xử lý mảng lồng nhau nếu có $index
        if (is_array($index)) {
            $product_index = $index[0];
            $field = $index[1];

            // Kiểm tra dữ liệu file
            if (!isset($file['name'][$product_index][$field]) ||
                !isset($file['type'][$product_index][$field]) ||
                !isset($file['tmp_name'][$product_index][$field]) ||
                !isset($file['error'][$product_index][$field]) ||
                !isset($file['size'][$product_index][$field])) {
                return [
                    "status" => false,
                    "message" => "Dữ liệu file không tồn tại hoặc không hợp lệ"
                ];
            }

            // Tạo mảng file đúng định dạng
            $fileData = [
                'name' => $file['name'][$product_index][$field],
                'type' => $file['type'][$product_index][$field],
                'tmp_name' => $file['tmp_name'][$product_index][$field],
                'error' => $file['error'][$product_index][$field],
                'size' => $file['size'][$product_index][$field]
            ];
        } else {
            $fileData = $file;
            if (!isset($fileData['name'], $fileData['type'], $fileData['tmp_name'], $fileData['error'], $fileData['size'])) {
                return [
                    "status" => false,
                    "message" => "Cấu trúc dữ liệu file không đầy đủ"
                ];
            }
        }

        // Kiểm tra lỗi file
        if ($fileData['error'] !== UPLOAD_ERR_OK) {
            return [
                "status" => false,
                "message" => "Lỗi khi tải file: " . $fileData['error']
            ];
        }

        $fileName = basename($fileData['name']);
        $targetPath = $this->targetDir . $fileName;
        $fileType = $fileData["type"];
        $fileSize = $fileData["size"];

        if (!in_array($fileType, $this->allowedType)) 
            return [
                "status" => false,
                "message" => "Chỉ chấp nhận file JPEG, JPG, PNG"
            ];
        
        if ($fileSize > $this->maxSize) 
            return [
                "status" => false,
                "message" => "File vượt quá kích thước 1MB"
            ];
        
        // Tạo thư mục đích nếu chưa tồn tại
        if (!is_dir($this->targetDir)) {
            mkdir($this->targetDir, 0777, true);
        }

        // Di chuyển file vào thư mục đích
        if (move_uploaded_file($fileData["tmp_name"], $targetPath)) 
        {
            $normalPath = "./img/shoes/" . $fileName;
            return [
                "status" => true,
                "path" => $normalPath
            ];
        }
        else 
            return [
                "status" => false,
                "message" => "Lỗi khi tải file lên"
            ];
    }
}
?>