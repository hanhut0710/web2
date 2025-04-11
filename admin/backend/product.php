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
        $sql = "SELECT * FROM products  WHERE status=1 LIMIT $limit OFFSET $offset";
        $result = mysqli_query($this->conn, $sql);
        $products = [];
        if($result)
        {
            while($rows = mysqli_fetch_array($result))
                $products[] = $rows;
        }
        return $products;
    }

    public function getAllProductByCategory()
    {
        $sql = "SELECT 
                FROM
                WHERE ";
    }

    public function getProductByCategory($idCategory)
    {
        $sql = "SELECT * FROM products WHERE status=1 AND category_id=" .$idCategory;
        $result = mysqli_query($this->conn, $sql);
        $products = [];
        if($result)
        {
            while($rows = mysqli_fetch_array($result))
                $products[] = $rows;
        }
        return $products;
    }

    public function getTotalProduct() //Đếm sản phẩm hiển thị status=1
    {
        $sql = "SELECT COUNT(*) as total FROM products WHERE status=1";
        $result = mysqli_query($this->conn, $sql);
        if($result)
            $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }

    public function insert($name, $price, $stock, $img, $category_id)
    {
        $sql = "INSERT INTO products(name, price, stock, img_src, category_id)
                VALUES ('$name', '$price', '$stock', '$img', '$price')";
        $result = mysqli_query($this->conn, $sql);
        if($result)
            return true;
        return false;
    }
}
?>