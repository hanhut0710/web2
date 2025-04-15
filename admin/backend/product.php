<?php
require_once "database.php";
class Product {
    private $conn;

    public function __construct()
    {
        $mysql = new Database();
        $this->conn = $mysql->getConnection();
    }

    public function getAllProduct($limit, $offset)
    {
        $sql = "SELECT * FROM products WHERE status=1 LIMIT $limit OFFSET $offset";
        $result = mysqli_query($this->conn, $sql);
        $products = [];
        if ($result) {
            while ($rows = mysqli_fetch_array($result))
                $products[] = $rows;
        }
        return $products;
    }

    public function getAllProductByCategory($limit, $offset)
    {
        $sql = "SELECT products.id, products.name, products.price, products.stock, products.img_src,
                        category.name as cat_name 
                FROM products 
                LEFT JOIN category ON products.category_id = category.id 
                WHERE products.status=1 
                LIMIT $limit OFFSET $offset";
                
        $result = mysqli_query($this->conn, $sql);
        $products = [];
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                $rows['cat_name'] = $rows['cat_name'] ?? 'Không xác định';
                $products[] = $rows;
            }
        }
        return $products;
    }

    public function getProductByCategory($idCategory, $limit, $page_num)
    {   
        $offset = ($page_num - 1) * $limit;
        $sql = "SELECT products.id, products.name, products.price, products.stock, products.img_src, category.name as cat_name 
                FROM products 
                LEFT JOIN category ON products.category_id = category.id 
                WHERE products.status=1 AND products.category_id = $idCategory 
                LIMIT $limit OFFSET $offset";
        $result = mysqli_query($this->conn, $sql);
        $products = [];
        if ($result) 
        {
            while ($rows = mysqli_fetch_array($result)) 
            {
                $rows['cat_name'] = $rows['cat_name'] ?? 'Không xác định';
                $products[] = $rows;
            }
        } 
        return $products;
    }

    public function getTotalProduct()
    {
        $sql = "SELECT COUNT(*) as total FROM products WHERE status=1";
        $result = mysqli_query($this->conn, $sql);
        if ($result)
            $row = mysqli_fetch_assoc($result);
        return $row['total'] ;
    }

    public function getTotalProductByCategory($idCategory)
    {
        $sql = "SELECT COUNT(*) as total FROM products WHERE status=1 AND category_id=$idCategory";
        $result = mysqli_query($this->conn, $sql);
        if ($result)
            $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }

    public function insert($name, $price, $stock, $img, $category_id)
    {
        $sql = "INSERT INTO products(name, price, stock, img_src, category_id)
                VALUES ('$name', '$price', '$stock', '$img', '$category_id')"; 
        $result = mysqli_query($this->conn, $sql);
        if ($result)
            return true;
        return false;
    }

    public function getProductDetails($product_id) {
        $sql = "SELECT * FROM product_details WHERE product_id = $product_id";
        $result = mysqli_query($this->conn, $sql);
        $details = [];
        while ($row = mysqli_fetch_array($result)) {
            $details[] = $row;
        }
        return $details;
    }
}
?>