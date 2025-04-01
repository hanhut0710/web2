<?php
require_once "../config/database.php";
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
        $sql = "SELECT * FROM accounts WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($this->conn, $sql);
        if($result)
        {   
            $account = mysqli_fetch_assoc($result);
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $account['username'];
            $_SESSION['id'] = $account['id'];

            $sql2 = "SELECT * FROM admin WHERE acc_id = ". $account['id'];
            $result2 = mysqli_query($this->conn, $sql2);
            if($result2)
            {
                $admin = mysqli_fetch_assoc($result2);
                $_SESSION['role'] = $admin['role'];
            }
            return true;
        }
        return false; //Đăng nhập thất bại;
    }
}
?>