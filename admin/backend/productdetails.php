<?php
require_once "database.php";
require_once "product.php";

class ProductDetails {
    private $conn;
    private $product;

    public function __construct()
    {
        $mysql = new Database();
        $this->conn = $mysql->getConnection();
        $this->product = new Product();
    }

    public function getAllDetailsByPagination($limit, $offset, $product_id)
    {
        $sql = "SELECT pd.id, pd.color, pd.size, pd.img_src, pd.stock, p.name as p_name
                FROM product_details pd, products p 
                WHERE pd.product_id = p.id";
        if ($product_id != 0) {
            $sql .= " AND pd.product_id = $product_id";
        }
        $sql .= " LIMIT $limit OFFSET $offset";
        $result = mysqli_query($this->conn, $sql);
        $details = [];
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                $details[] = $rows;
            }
        }
        return $details;
    }

    public function getAllDetails()
    {
        $sql = "SELECT pd.id, pd.color, pd.size, pd.img_src, pd.stock, p.name as product_name
                FROM product_details pd, products p
                WHERE pd.product_id = p.id";
        $result = mysqli_query($this->conn, $sql);
        $details = [];
        if ($result) {
            while ($rows = mysqli_fetch_array($result))
                $details[] = $rows;
        }
        return $details;
    }

    public function getTotalDetailsByProduct($idProduct)
    {
        $sql = "SELECT COUNT(*) as total 
                FROM product_details 
                WHERE product_id=" .$idProduct;
        $result = mysqli_query($this->conn, $sql);
        if ($result)
            $row = mysqli_fetch_assoc($result);
        return $row['total'] ;
    }

    public function getTotalDetails()
    {
        $sql = "SELECT COUNT(*) as total 
                FROM product_details";
        $result = mysqli_query($this->conn, $sql);
        if ($result)
            $row = mysqli_fetch_assoc($result);
        return $row['total'] ;
    }

    public function getDetailByAttributes($product_id, $color, $size) 
    {
        $sql = "SELECT * FROM product_details 
                WHERE product_id = '$product_id' AND color = '$color' 
                AND size = '$size'";
        $result = mysqli_query($this->conn, $sql);
        if ($result)
            $row = mysqli_fetch_assoc($result);
        return $row;
    }

    public function insertProductDetail($product_id, $color, $size, $stock, $img_src) 
    {
        $sql = "INSERT INTO product_details (product_id, color, size, stock, img_src) 
                VALUES ('$product_id', '$color', '$size', '$stock', '$img_src')";
        $result = mysqli_query($this->conn, $sql);
        if ($result) 
        {
            $this->product->updateStock($product_id); // Cập nhật tổng stock
            return mysqli_insert_id($this->conn);
        }
        return false;
    }

    public function updateProductDetailStock($product_detail_id, $quantity) 
    {
        $sql = "UPDATE product_details 
                SET stock = stock + $quantity 
                WHERE id = $product_detail_id";
        $result = mysqli_query($this->conn, $sql);
        if ($result) 
        {
            // Cập nhật stock của sản phẩm liên quan
            $sql = "SELECT product_id FROM product_details WHERE id = $product_detail_id";
            $result = mysqli_query($this->conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $this->product->updateStock($row['product_id']);
            return true;
        }
        return false;
    }

    public function updateProductDetail($id, $product_id, $color, $size, $stock, $img_src) 
    {
        $sql = "UPDATE product_details 
                SET product_id = '$product_id', color = '$color', size = '$size', 
                    stock = '$stock', img_src = '$img_src' 
                WHERE id = $id";
        $result = mysqli_query($this->conn, $sql);
        if ($result) {
            $this->product->updateStock($product_id); // Cập nhật tổng stock
            return true;
        }
        return false;
    }
}
?>