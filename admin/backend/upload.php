<?php
class Upload {
    private $targetDir = "../../img/shoes/";
    private $allowedType = ["image/jpeg", "image/jpg", "image/png"];
    private $maxSize = 1 * 1024 * 1024; // 1MB

    public function uploadImage($file) 
    {
        $fileName = basename($file['name']);
        $targetPath = $this->targetDir . $fileName;
        $fileType = $file["type"];
        $fileSize = $file["size"];

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
        
        // Di chuyển file vào thư mục đích
        if (move_uploaded_file($file["tmp_name"], $targetPath)) 
            return [
                "status" => true,
                "path" => $targetPath
            ];
        else 
            return [
                "status" => false,
                "message" => "Lỗi khi tải file lên"
            ];
        
    }
}
?>