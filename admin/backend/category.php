<?php
require_once "../config/database.php";
class Category{
    private $conn;

    public function __construct()
    {
        $mysql = new Database();
        $this->conn = $mysql -> getConnection();
    }

    public function getAllCategory()
    {
        $sql = "SELECT * FROM category";
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