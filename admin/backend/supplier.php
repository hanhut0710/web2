<?php
require_once "database.php";
class Supplier{
    private $conn;

    public function __construct()
    {
        $mysql = new Database();
        $this->conn = $mysql -> getConnection();
    }

    public function getAllSupplierByPagination($limit, $offset)
    {
        $sql = "SELECT * FROM supplier LIMIT $limit OFFSET $offset";
        $result = mysqli_query($this->conn, $sql);
        $supplier = [];
        if($result -> num_rows > 0)
        {
            while($rows = mysqli_fetch_array($result))
                $supplier[] = $rows;
        }
        return $supplier;
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

    public function getSupplierById($id)
    {
        $sql = "SELECT * FROM supplier WHERE id=" .$id;
        $result = mysqli_query($this->conn, $sql);
        if($result -> num_rows > 0)
            $row = mysqli_fetch_array($result);
        return $row;
    }


    public function getTotalSupplier()
    {
        $sql = "SELECT COUNT(*) as total FROM supplier";
        $result = mysqli_query($this->conn, $sql);
        if($result)
            $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }

    public function insert($name, $email, $phone)
    {
        $sql = "INSERT INTO supplier(sup_name, email, phone) VALUES ('$name', '$email', '$phone')";
        $result = mysqli_query($this->conn, $sql);
        if($result)
            return true;
        else {
            echo "Lỗi khi thêm nhà cung cấp: " . mysqli_error($this->conn);
            return false;
        }
    }

    public function update($id, $name, $email, $phone)
    {
        $sql = "UPDATE supplier SET sup_name= '$name', email= '$email', phone= '$phone' WHERE id=" .$id;
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

    public function check($name, $email, $phone)
    {
        $sql = "SELECT sup_name, email, phone 
                FROM supplier 
                WHERE sup_name='$name' OR email='$email' OR phone='$phone'";
        $result = mysqli_query($this->conn, $sql);
        $response = [
            'error' => false,
            'sup_name' => false,
            'email' => false,
            'phone' => false
        ];
        if($result -> num_rows > 0)
        {
            while($row = mysqli_fetch_array($result))
            {
                if($row['sup_name'] == $name)
                {
                    $response['error'] = true;
                    $response['sup_name'] = true;
                }
                if($row['email'] == $email)
                {
                    $response['error'] = true;
                    $response['email'] = true;
                }
                if($row['phone'] == $phone)
                {
                    $response['error'] = true;
                    $response['phone'] = true;
                }
            }
        }
        return $response;
    }
} 
?>