<?php
require_once "../config/database.php";
class Product{
    private $conn;

    public function __construct()
    {
        $mysql = new Database();
        $this->conn = $mysql -> getConnection();
    }

    public function getAllProduct()
    {
        $sql = "SELECT * FROM products";
        $result = mysqli_query($this->conn, $sql);
        $products = [];
        if($result)
        {
            while($rows = mysqli_fetch_array($result))
                $products[] = $rows;
        }
        return $products;
    }

    public function getProductByCategory($idCategory)
    {
        $sql = "SELECT * FROM products WHERE category_id=" .$idCategory;
        $result = mysqli_query($this->conn, $sql);
        $products = [];
        if($result)
        {
            while($rows = mysqli_fetch_array($result))
                $products[] = $rows;
        }
        return $products;
    }
}
?>