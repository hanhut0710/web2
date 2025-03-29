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
        
    }
}
?>