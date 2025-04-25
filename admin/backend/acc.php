<?php 
    require_once "database.php";

    class Account{
        private $conn;

        public function __construct()
        {
            $db = new Database();
            $this->conn = $db->getConnection();
        }

        public function addAccount($username, $passwd){
            $sql = "INSERT INTO accounts (username, password) VALUES ('$username', '$passwd')";
            mysqli_query($this->conn, $sql);
        }

        public function getAccId($username, $passwd){
            $sql = "SELECT id FROM accounts WHERE username = '$username' AND password = '$passwd'";
            $result = mysqli_query($this->conn, $sql);
            if($row = mysqli_fetch_assoc($result)){
                return $row['id'];
            }
            return null;
        }

        public function getAccById($id){
            $sql = "SELECT username, password FROM accounts WHERE id = '$id'";
            $result = mysqli_query($this->conn, $sql);
            if($row = mysqli_fetch_assoc($result)){
                return $row ;
            }
            return null;
        }

        public function checkUsername($username){
            $sql = "SELECT id FROM accounts WHERE username= '$username'";
            $result = mysqli_query($this->conn, $sql);
            return $result->num_rows > 0;
        }

        public function updateAccount($id, $username, $passwd){
            $sql = "UPDATE accounts SET username = '$username', password = '$passwd' WHERE id = '$id'";
            mysqli_query($this->conn, $sql);
        }

        public function lockAcc($id){
            $sql = "UPDATE accounts SET status = 0 WHERE id = '$id'";
            mysqli_query($this->conn, $sql);
        }

        public function unlockAcc($id){
            $sql = "UPDATE accounts SET status = 1 WHERE id = '$id'";
            mysqli_query($this->conn, $sql);
        }
    }