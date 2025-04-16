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
        $sql = "SELECT * FROM import";
        $result = mysqli_query($this->conn, $sql);
        $imports = [];
        if ($result) {
            while ($rows = mysqli_fetch_array($result))
                $imports[] = $rows;
        }
        return $imports;
    }

    public function getAllImportByPagination($limit, $offset)
    {
        $sql = "SELECT * FROM import LIMIT $limit OFFSET $offset";
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

    public function insert($supID, $productID, $quantity, $date)
    {
        $sql = "INSERT INTO import VALUES ('$supID', '$productID', '$quantity', '$date')";
        $result = mysqli_query($this->conn, $sql);
        if($result)
            return true;
        return false;
    }
} 
?>