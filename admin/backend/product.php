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
                LEFT JOIN brand b ON p.brand_id = b.id";
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
        $sql = "SELECT p.id, p.name, p.price, p.stock, p.img_src, p.brand_id, p.status,
                        c.name as cat_name, b.name as brand_name
                FROM products p 
                LEFT JOIN category c ON p.category_id = c.id 
                LEFT JOIN brand b ON p.brand_id = b.id 
                -- WHERE p.status=1 
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
        $sql = "SELECT p.id, p.name, p.price, p.stock, p.img_src, p.brand_id, p.status,
                        c.name as cat_name, b.name as brand_name
                FROM products p 
                LEFT JOIN category c ON p.category_id = c.id 
                LEFT JOIN brand b ON p.brand_id = b.id 
                WHERE p.category_id = $idCategory 
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
    
    public function getProductById($id)
    {
        $sql = "SELECT p.*, b.name as brand_name, c.name as cat_name 
                FROM products p 
                LEFT JOIN brand b ON p.brand_id = b.id 
                LEFT JOIN category c ON p.category_id = c.id 
                WHERE p.id = $id";
        $result = mysqli_query($this->conn, $sql);
        if ($result)
        {
            $row= mysqli_fetch_assoc($result);
            if (empty($row['img_src'])) 
                $row['img_src'] = $this->getFirstImage($row['id']) ?? '';
        }
        return $row;
    }

    public function isProductSold($productID)
    {
        $sql = "SELECT COUNT(*) as total
            FROM order_details od
            JOIN orders o ON od.order_id = o.id
            JOIN product_details pd ON od.product_detail_id = pd.id
            WHERE pd.product_id = $productID AND o.status IN ('Đã giao')";
        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_array($result);
        return $row['total'] > 0;
    }

    public function hideProduct($productID)
    {
        $sql = "UPDATE products SET status=0 WHERE id = $productID";
        $result = mysqli_query($this->conn, $sql);
        if($result)
            return true;
        return false;
    }

    public function deleteProduct($productID)
    {   
        //Chi tiết đơn hàng
        $sql = "DELETE od FROM order_details od
                JOIN product_details pd ON od.product_detail_id = pd.id
                WHERE pd.product_id = $productID";
        $result = mysqli_query($this->conn, $sql);
        if ($result == false) 
            return false;

        //Giỏ hàng
        $sql = "DELETE c FROM cart c
                JOIN product_details pd ON c.product_detail_id = pd.id
                WHERE pd.product_id = $productID";
        $result = mysqli_query($this->conn, $sql);
        if ($result == false) 
            return false;

        //Biến thể
        $sql = "DELETE FROM product_details WHERE product_id = $productID";
        $result = mysqli_query($this->conn, $sql);
        if ($result == false) 
            return false;
        
        //Sản phẩm
        $sql = "DELETE FROM products WHERE id = $productID";
        $result = mysqli_query($this->conn, $sql);
        if($result)
            return true;   
    }
}
?>