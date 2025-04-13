<?php
require_once "../config/database.php";
class Supplier{
    private $conn;

    public function __construct()
    {
        $mysql = new Database();
        $this->conn = $mysql -> getConnection();
    }

    public function getAllSupplier()
    {
        $sql = "SELECT * FROM supplier";
        $result = mysqli_query($this->conn, $sql);
        $supplier = [];
        if($result -> num_rows > 0)
        {
            while($rows = mysqli_fetch_array($result))
                $supplier[] = $row;
        }
        return $supplier;
    }
} 
?>