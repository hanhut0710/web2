<?php
require_once "../config/database.php";
class Product{
    private $conn;

    public function __construct()
    {
        $mysql = new Database();
        $this->conn = $mysql -> getConnection();
    }

    // public function getAllProduct()
    // {
    //     $sql = "SELECT * FROM products";
    //     $result = mysqli_query($this->conn, $sql);
    //     $products = [];
    //     if($result)
    //     {
    //         while($rows = mysqli_fetch_array($result))
    //             $products[] = $rows;
    //     }
    //     return $products;
    // }

    public function getAllProduct($limit, $offset)
    {
        $sql = "SELECT * FROM products LIMIT $limit OFFSET $offset";
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

    public function getTotalProduct()
    {
        $sql = "SELECT COUNT(*) as total FROM products";
        $result = mysqli_query($this->conn, $sql);
        if($result)
            $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }
}
?>