<?php
require_once "database.php";

class Product {
    private $conn;
    
    public function __construct()
    {
        $mysql = new Database();
        $this->conn = $mysql->getConnection();
    }

    public function getAllProduct()
    {
        $sql = "SELECT p.*, b.name as brand_name 
                FROM products p 
                LEFT JOIN brand b ON p.brand_id = b.id 
                WHERE p.status=1";
        $result = mysqli_query($this->conn, $sql);
        $products = [];
        if ($result) {
            while ($rows = mysqli_fetch_array($result))
            {
                $rows['stock'] = $this->calculateTotalStock($rows['id']);
                $products[] = $rows;
            }
        }
        return $products;
    }

    public function getAllProductByPagination($limit, $offset)
    {
        $sql = "SELECT p.*, b.name as brand_name 
                FROM products p 
                LEFT JOIN brand b ON p.brand_id = b.id 
                WHERE p.status=1 
                LIMIT $limit OFFSET $offset";
        $result = mysqli_query($this->conn, $sql);
        $products = [];
        if ($result) {
            while ($rows = mysqli_fetch_array($result))
            {
                $rows['stock'] = $this->calculateTotalStock($rows['id']);
                $products[] = $rows;
            }
        }
        return $products;
    }

    public function getAllProductByCategory($limit, $offset)
    {
        $sql = "SELECT p.id, p.name, p.price, p.stock, p.img_src, p.brand_id,
                        c.name as cat_name, b.name as brand_name
                FROM products p 
                LEFT JOIN category c ON p.category_id = c.id 
                LEFT JOIN brand b ON p.brand_id = b.id 
                WHERE p.status=1 
                LIMIT $limit OFFSET $offset";
        $result = mysqli_query($this->conn, $sql);
        $products = [];
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                $rows['stock'] = $this->calculateTotalStock($rows['id']);
                $rows['cat_name'] = $rows['cat_name'] ?? 'Không xác định';
                $rows['brand_name'] = $rows['brand_name'] ?? 'Không xác định';
                $products[] = $rows;
            }
        }
        return $products;
    }

    public function getProductByCategory($idCategory, $limit, $page_num)
    {   
        $offset = ($page_num - 1) * $limit;
        $sql = "SELECT p.id, p.name, p.price, p.stock, p.img_src, p.brand_id,
                        c.name as cat_name, b.name as brand_name
                FROM products p 
                LEFT JOIN category c ON p.category_id = c.id 
                LEFT JOIN brand b ON p.brand_id = b.id 
                WHERE p.status=1 AND p.category_id = $idCategory 
                LIMIT $limit OFFSET $offset";
        $result = mysqli_query($this->conn, $sql);
        $products = [];
        if ($result) 
        {
            while ($rows = mysqli_fetch_array($result)) 
            {   
                $rows['stock'] = $this->calculateTotalStock($rows['id']);
                $rows['cat_name'] = $rows['cat_name'] ?? 'Không xác định';
                $rows['brand_name'] = $rows['brand_name'] ?? 'Không xác định';
                $products[] = $rows;
            }
        } 
        return $products;
    }

    public function getTotalProduct()
    {
        $sql = "SELECT COUNT(*) as total 
                FROM products 
                WHERE status=1";
        $result = mysqli_query($this->conn, $sql);
        if ($result)
            $row = mysqli_fetch_assoc($result);
        return $row['total'] ;
    }

    public function getTotalProductByCategory($idCategory)
    {
        $sql = "SELECT COUNT(*) as total 
                FROM products
                WHERE status=1 AND category_id=$idCategory";
        $result = mysqli_query($this->conn, $sql);
        if ($result)
            $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }

    public function insert($name, $price, $img, $category_id, $status, $brand_id)
    {
        $sql = "INSERT INTO products(name, price, stock, img_src, category_id, status, brand_id)
                VALUES ('$name', '$price', 0, '$img', '$category_id', '$status', '$brand_id')"; 
        $result = mysqli_query($this->conn, $sql);
        if ($result)
            return mysqli_insert_id($this->conn);
        return false;
    }

    public function update($id, $name, $price, $img_src, $category_id, $status, $brand_id) 
    {
        $sql = "UPDATE products 
                SET name = '$name', price = '$price', img_src = '$img_src', 
                    category_id = '$category_id', status = '$status', brand_id = '$brand_id'
                WHERE id = $id";
        $result = mysqli_query($this->conn, $sql);
        if ($result)
            return true;
        return false;
    }

    public function updateStock($product_id) 
    {
        $totalStock = $this->calculateTotalStock($product_id);
        $sql = "UPDATE products SET stock = $totalStock WHERE id = $product_id";
        $result = mysqli_query($this->conn, $sql);
        if ($result)
            return true;
        return false;
    }

    public function updatePrice($product_id, $price) 
    {
        $sql = "UPDATE products SET price = $price WHERE id = $product_id";
        $result = mysqli_query($this->conn, $sql);
        if ($result)
            return true;
        return false;
    }


    public function calculateTotalStock($product_id) 
    {
        $sql = "SELECT SUM(stock) as total 
                FROM product_details 
                WHERE product_id = $product_id";
        $result = mysqli_query($this->conn, $sql);
        if ($result)
            $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }

    public function getFirstImage($product_id)
    {
        $sql = "SELECT img_src FROM product_details WHERE product_id = $product_id LIMIT 1";
        $result = mysqli_query($this->conn, $sql);
        if ($result)
            $row = mysqli_fetch_assoc($result);
        return $row['img_src'];
    }

    public function getProductByName($name)
    {
        $sql = "SELECT * FROM products WHERE name = '$name' AND status = 1";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_assoc($result);
    }
}
?>