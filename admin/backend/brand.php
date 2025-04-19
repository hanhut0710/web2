<?php
require_once "database.php";
class Brand{
    private $conn;

    public function __construct()
    {
        $mysql = new Database();
        $this->conn = $mysql -> getConnection();
    }

    public function getAllBrand()
    {
        $sql = "SELECT * FROM brand";
        $result = mysqli_query($this->conn, $sql);
        $category = [];
        if($result)
        {
            while($rows = mysqli_fetch_array($result))
                $category[] = $rows;
        }
        return $category;
    }
}
?>