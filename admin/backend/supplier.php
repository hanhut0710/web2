<?php
require_once "database.php";
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
                $supplier[] = $rows;
        }
        return $supplier;
    }

    public function insert($name, $email, $phone)
    {
        $sql = "INSERT INTO supplier(sup_name, email, phone) VALUES ('$name', '$email', '$phone')";
        $result = mysqli_query($this->conn, $sql);
        if($result)
            return true;
        return false;
    }

    public function update($name, $email, $phone)
    {
        $sql = "UPDATE supplier SET sup_name= '$name', email= '$email', phone= '$phone'";
        $result = mysqli_query($this->conn, $sql);
        if($result)
            return true;
        return false;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM supplier WHERE id=" .$id;
        $result = mysqli_query($this->conn, $sql);
        if($result)
            return true;
        return false;
    }
} 
?>