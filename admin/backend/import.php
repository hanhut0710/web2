<?php
require_once "database.php";
class Import{
    private $conn;

    public function __construct()
    {
        $mysql = new Database();
        $this->conn = $mysql -> getConnection();
    }

    public function getAllImport()
    {
        $sql = "SELECT ip.id, ip.created_at, ip.quantity, 
                       p.name AS p_name, sp.sup_name AS sp_name
                FROM import ip, supplier sp, products p
                WHERE ip.product_id = p.id AND ip.sup_id = sp.id";
        $result = mysqli_query($this->conn, $sql);
        $imports = [];
        if ($result) {
            while ($rows = mysqli_fetch_array($result)) {
                $imports[] = $rows;
            }
        }
        return $imports;
    }

    public function getAllImportByPagination($limit, $offset)
    {
        $sql = "SELECT ip.id, ip.created_at, ip.quantity, 
                    p.name AS p_name, sp.sup_name AS sp_name
                FROM import ip, supplier sp, products p
                WHERE ip.product_id = p.id AND ip.sup_id = sp.id
                LIMIT $limit OFFSET $offset";
        $result = mysqli_query($this->conn, $sql);
        $imports = [];
        if ($result) {
            while ($rows = mysqli_fetch_array($result))
                $imports[] = $rows;
        }
        return $imports;
    }

    public function getTotalImport()
    {
        $sql = "SELECT COUNT(*) as total FROM import";
        $result = mysqli_query($this->conn, $sql);
        $imports = [];
        if ($result) {
            while ($rows = mysqli_fetch_array($result))
                $imports[] = $rows;
        }
        return $imports['total'];
    }

    public function getTotalImportBySupplier($idSupplier)
    {
        $sql = "SELECT COUNT(*) as total FROM import WHERE sup_id=" .$idSupplier;
        $result = mysqli_query($this->conn, $sql);
        $imports = [];
        if ($result) {
            while ($rows = mysqli_fetch_array($result))
                $imports[] = $rows;
        }
        return $imports['total'];
    }

    public function insertImport($supID, $productID, $quantity, $date)
    {
        $sql = "INSERT INTO import VALUES ('$supID', '$productID', '$quantity', '$date')";
        $result = mysqli_query($this->conn, $sql);
        if($result)
            return true;
        return false;
    }

    public function insertImportDetail($importID, $productDetailID, $quantity)
    {
        $sql = "INSERT INTO import_details (import_id, product_detail_id, quantity) 
                VALUES ('$import_id', '$product_detail_id', '$quantity')";
        $result = mysqli_query($this->conn, $sql);
        if($result)
            return true;
        return false;
    }

    public function updateProductDetailStock($product_detail_id, $quantity) 
    {
        $sql = "UPDATE product_details 
                SET stock = stock + $quantity 
                WHERE id = $product_detail_id";
        $result = mysqli_query($this->conn, $sql);
        if($result)
            return true;
        return false;
    }

    public function getImportDetailsByImport($importID)
    {
        $sql = "SELECT pd.name, pd.size, pd.color, pd.brand,
                FROM import_details id  , product_details pd
                WHERE id.product_detail_id = pd.id AND id.import_id =" .$importID;
        $result = mysqli_query($this->conn, $sql);
        $details = [];
        if ($result) {
            while ($rows = mysqli_fetch_array($result))
                $details[] = $rows;
        }
        return $details;
    }
} 
?>