<?php
require_once "database.php";

class Import {
    private $conn;

    public function __construct()
    {
        $mysql = new Database();
        $this->conn = $mysql->getConnection();
    }

    public function getAllImport()
    {
        $sql = "SELECT ip.id, ip.created_at, ip.quantity, ip.total_price, 
                       sp.sup_name AS sp_name
                FROM import ip
                LEFT JOIN supplier sp ON ip.sup_id = sp.id";
        $result = mysqli_query($this->conn, $sql);
        $imports = [];
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                $imports[] = $rows;
            }
        }
        return $imports;
    }

    public function getAllImportByPagination($limit, $offset, $supplierId = '')
    {
        $sql = "SELECT i.*, s.sup_name as sp_name, a.full_name as staff_name
            FROM import i
            LEFT JOIN supplier s ON i.sup_id = s.id
            LEFT JOIN admin a ON i.staff_id = a.id";
        if ($supplierId) 
            $sql .= " WHERE i.sup_id = $supplierId";
        $result = mysqli_query($this->conn, $sql);
        $imports = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $imports[] = $row;
            }
        }
        return $imports;
    }

    public function getTotalImport()
    {
        $sql = "SELECT COUNT(*) as total FROM import";
        $result = mysqli_query($this->conn, $sql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row['total'];
        }
        return 0;
    }

    public function getTotalImportBySupplier($idSupplier)
    {
        $sql = "SELECT COUNT(*) as total FROM import WHERE sup_id = $idSupplier";
        $result = mysqli_query($this->conn, $sql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row['total'];
        }
        return 0;
    }

    public function insertImport($supID, $staffID, $quantity, $date, $totalPrice)
    {   
        $sql = "INSERT INTO import (sup_id, staff_id, quantity, created_at, total_price) 
                VALUES ('$supID', '$staffID', '$quantity', '$date', '$totalPrice')";
        $result = mysqli_query($this->conn, $sql);
        if ($result) {
            return mysqli_insert_id($this->conn); // Trả về ID của phiếu nhập
        }
        return false;
    }

    public function insertImportDetail($importID, $productDetailID, $quantity, $price, $totalPrice)
    {
        $sql = "INSERT INTO import_details (import_id, product_detail_id, quantity, price, total_price) 
                VALUES ('$importID', '$productDetailID', '$quantity', '$price', '$totalPrice')";
        $result = mysqli_query($this->conn, $sql);
        if ($result) {
            return true;
        }
        return false;
    }

    public function updateProductDetailStock($product_detail_id, $quantity) 
    {
        $sql = "UPDATE product_details 
                SET stock = stock + $quantity 
                WHERE id = $product_detail_id";
        $result = mysqli_query($this->conn, $sql);
        if ($result) {
            return true;
        }
        return false;
    }

    public function getImportDetailsByImport($importID)
    {
        $sql = "SELECT p.name, pd.size, pd.color, pd.img_src, id.quantity, id.price, id.total_price, b.name as brand_name
                FROM import_details id
                JOIN product_details pd ON id.product_detail_id = pd.id
                JOIN products p ON pd.product_id = p.id
                LEFT JOIN brand b ON p.brand_id = b.id
                WHERE id.import_id = $importID";
        $result = mysqli_query($this->conn, $sql);
        $details = [];
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                $details[] = $rows;
            }
        }
        return $details;
    }

    public function getImportById($import_id)
    {
        $sql = "SELECT ip.id, ip.created_at, ip.quantity, ip.total_price, ip.staff_id, sp.sup_name
                FROM import ip
                JOIN supplier sp ON ip.sup_id = sp.id
                WHERE ip.id = '$import_id'";
        $result = mysqli_query($this->conn, $sql);
        if ($result) 
            return mysqli_fetch_assoc($result);
        return null;
    }

    public function getTotalImportBySearch($search, $supplierId = '') 
    {
        $search = mysqli_real_escape_string($this->conn, $search);
        $sql = "SELECT COUNT(*) as total 
                FROM import i 
                LEFT JOIN supplier s ON i.sup_id = s.id 
                WHERE (i.id LIKE '%$search%' OR s.sup_name LIKE '%$search%')";
        if ($supplierId) {
            $sql .= " AND i.sup_id = $supplierId";
        }
        $result = mysqli_query($this->conn, $sql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row['total'];
        }
        return 0;
    }
    
    public function getImportBySearch($search, $supplierId = '', $limit, $offset) 
    {
        $search = mysqli_real_escape_string($this->conn, $search);
        $sql = "SELECT i.*, s.sup_name as sp_name, a.full_name as staff_name 
                FROM import i 
                LEFT JOIN supplier s ON i.sup_id = s.id 
                LEFT JOIN admin a ON i.staff_id = a.id 
                WHERE (i.id LIKE '%$search%' OR s.sup_name LIKE '%$search%')";
        if ($supplierId) {
            $sql .= " AND i.sup_id = $supplierId";
        }
        $sql .= " LIMIT $limit OFFSET $offset";
        $result = mysqli_query($this->conn, $sql);
        $imports = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $imports[] = $row;
            }
        }
        return $imports;
    }
} 
?>