<?php
class Upload() {
    private $targetDir = "../uploads/";
    private $allowedType = ["image/jpeg", "image/jpg"];
    private $maxSize = 1 * 1024 * 1024;

    public function uploadImage($file)
    {
        $fileName = base($file['name']);
        $targetPath = $this->targetDir . "_" . $fileName;
        $fileType = $file["type"];
        $fileSize = $file["size"];

        if(!in_array($fileType, $this->allowedType))
            return ["status" => false
                    "message" => "Chỉ chấp nhận file JPEG và JPG"];
        if($fileSize > $this->$maxSize)
            return ["status" => false
                    "message" => "File vượt quá kích thước 1MB"];
        if(move_uploaded_file($file["tmp_name"]), $targetPath)
            return ["status" => true
                    "path" => $targetPath];
        else
            return ["status" => false
                    "message" => "Lỗi khi tải file lên"];
    }
}
?>