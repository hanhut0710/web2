<?php
require_once "../config/database.php";
class Import{
    private $conn;

    public function __construct()
    {
        $mysql = new Database();
        $this->conn = $mysql -> getConnection();
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