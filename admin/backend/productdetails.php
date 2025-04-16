<?php
require_once "database.php";
class ProductDetails {
    private $conn;

    public function __construct()
    {
        $mysql = new Database();
        $this->conn = $mysql->getConnection();
    }

    public function getAllDetailsByPagination($limit, $offset, $product_id)
    {
        $sql = "SELECT pd.id, pd.color, pd.size, pd.brand, pd.img_src, pd.stock, p.name as p_name
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
        $sql = "SELECT pd.id, pd.color, pd.size, pd.brand, pd.img_src, pd.stock, p.name as product_name
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

    public function getDetailByAttributes($product_id, $color, $size, $brand) 
    {
        $sql = "SELECT * FROM product_details 
                WHERE product_id = '$product_id' AND color = '$color' 
                AND size = '$size' AND brand = '$brand'";
        $result = mysqli_query($this->conn, $sql);
        if ($result)
            $row = mysqli_fetch_assoc($result);
        return $row;
        
    }

}
?>