<?php

// require_once('C:/xampp/htdocs/web2-mainNoGit/config/database.php');
require_once('database.php');


class User{
    private $conn;

    public function __construct(){
        $mysql = new Database();
        $this->conn = $mysql -> getConnection();
    } 

    public function getAllUser($limit , $offset){
        $sql= "SELECT users.full_name, users.phone,  users.email, 
        address.address_line, address.ward, address.district, address.city, 
        accounts.username, accounts.status, accounts.id AS accID
        FROM users
        LEFT JOIN address ON users.id = address.user_id
        LEFT JOIN accounts ON users.acc_id = accounts.id
        where address.default = 1 OR address.id IS NULL
        LIMIT $limit OFFSET $offset";
        $result = mysqli_query($this->conn,$sql);
        $users = [];
        if($result){
            while($row = mysqli_fetch_array($result))
                $users[] = $row;
        }
        return $users;
    }


    public function getTotalUser(){
        $sql = "SELECT COUNT(*) as total FROM users";
        $result= mysqli_query($this->conn,$sql);
        if($result)
            $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }

    
    public function getInforUserByAccId($accID){
        $sql="SELECT users.full_name, users.phone,  users.email, 
        address.address_line, address.ward, address.district, address.city, 
        accounts.username, accounts.status 
        FROM users
        LEFT JOIN address ON users.id = address.user_id
        LEFT JOIN accounts ON users.acc_id = accounts.id
        WHERE users.acc_id = '$accID'
        ";
        $result = mysqli_query($this->conn , $sql);
        if($result && mysqli_num_rows($result) > 0)
            return mysqli_fetch_assoc($result); 
        return null;
    }
    

    public function insert($fullname, $email, $phone, $address_line, $ward, $district, $city, $username, $password, $status )
    {
        $sql = "INSERT INTO accounts(username, password, status)
                VALUES ('$username', '$password', '$status')";
        $result = mysqli_query($this->conn, $sql);
        if (!$result)
            return false;
        $acc_id = mysqli_insert_id($this -> conn);


        $sql = "INSERT INTO users(full_name, phone, email, acc_id)
                VALUES ('$fullname', '$phone', '$email', '$acc_id')";
        $result = mysqli_query($this->conn, $sql);
        if (!$result)
            return false;
        $user_id = mysqli_insert_id($this->conn);

        $sql = "INSERT INTO address(user_id, address_line, ward, district, city)
                VALUES ('$user_id','$address_line', '$ward', '$district', '$city')";
        $result = mysqli_query($this->conn, $sql);
        if (!$result)
            return false;
        return true;
    }

    public function update($fullname, $email, $phone,$accID, $address_line, $ward, $district, $city, $username, $password, $status){

        if(!empty($password))
            $sql ="UPDATE accounts SET username = '$username', password = '$password', status = '$status' WHERE id ='$accID'";
        else 
            $sql ="UPDATE accounts SET username = '$username', status = '$status' WHERE id ='$accID'";
        $result = mysqli_query($this->conn, $sql);
        if (!$result)
            return false;

        $sql ="UPDATE users SET full_name= '$fullname', phone ='$phone', email='$email' WHERE acc_id ='$accID'";
        $result = mysqli_query($this->conn, $sql);
        if (!$result)
            return false;

        $sql = "UPDATE address SET address_line = '$address_line', ward = '$ward', district= '$district', city='$city' WHERE user_id = (SELECT id FROM users WHERE acc_id = '$accID')";
        $result = mysqli_query($this->conn, $sql);
        if (!$result)
            return false;

        return true;
    }


    public function delete($accID){
        $sql = "DELETE FROM address WHERE user_id = (SELECT id FROM users WHERE acc_id ='$accID')";
        $result = mysqli_query($this->conn, $sql);
        if(!$result)
            return false;

        $sql ="DELETE FROM users WHERE acc_id ='$accID'";
        $result = mysqli_query($this->conn, $sql);
        if(!$result)
            return false;  
        
        $sql = "DELETE FROM accounts WHERE id = '$accID'";
        $result = mysqli_query($this->conn, $sql);
        if(!$result)
            return false; 

        return true;
    }


    public function checkDuplicateEmail($email){
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($this->conn, $sql);
        if($result && mysqli_num_rows($result)>0)
            return true;
        return false;
    }


    public function checkDuplicatePhone($phone){
        $sql = "SELECT * FROM users WHERE phone = '$phone'";
        $result = mysqli_query($this->conn,$sql);
        if($result && mysqli_num_rows($result)>0)
            return true;
        return false;
    }

    public function checkDuplicateUsername($username){
        $sql = "SELECT * FROM accounts WHERE username = '$username'";
        $result = mysqli_query($this->conn,$sql);
        if($result && mysqli_num_rows($result)>0)
            return true;
        return false;
    }

}

?>
