<?php
require_once "database.php";
class Auth {
    private $conn;

    public function __construct()
    {   
        session_start();
        $mysql = new Database();
        $this->conn = $mysql->getConnection();
    }

    public function checkLogin($username, $password)
    {
        $sql = "SELECT * FROM accounts WHERE username = '$username'";
        $result = mysqli_query($this->conn, $sql);
        $account = mysqli_fetch_assoc($result);
        if($result && mysqli_num_rows($result) > 0 && password_verify($password, $account['password']))
        {   
            if($account['status'] == 0) return false; //Tài khoản đã bị khóa
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $account['username'];
            $_SESSION['id'] = $account['id'];
    
            $sql2 = "SELECT * FROM admin WHERE acc_id = ". $account['id'];
            $result2 = mysqli_query($this->conn, $sql2);
            
            if($result2 && mysqli_num_rows($result2) > 0)
            {
                $admin = mysqli_fetch_assoc($result2);
                $_SESSION['role'] = $admin['role'];
                $_SESSION['staff_id'] = $admin['id'];
            }
            return true;
        }
        return false; //Đăng nhập thất bại;
    }

    public function hasPermission($acc_id, $function_id){
        $acc_id = mysqli_real_escape_string($this->conn, $acc_id);
        $function_id = mysqli_real_escape_string($this->conn, $function_id);
        $sql = "SELECT * FROM admin_function WHERE acc_id = '$acc_id' AND func_id = '$function_id'";
        $result = mysqli_query($this->conn, $sql);
    
        return mysqli_num_rows($result) > 0; 
    }
}
?>