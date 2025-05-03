<?php 
    require_once "database.php";

    class Permission{
        private $conn;

        public function __construct(){
            $db = new Database();
            $this->conn = $db->getConnection();
        }

        public function getPermissionIdByAccId($acc_id) {
            $acc_id = mysqli_real_escape_string($this->conn, $acc_id);
            $sql = "SELECT id FROM admin_function WHERE acc_id = $acc_id";
            $result = mysqli_query($this->conn, $sql);
        
            $data = [];
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $data[] = $row['id']; 
                }
            }
        
            return $data; 
        }

        public function getPermissionList($acc_id) {
            $acc_id = mysqli_real_escape_string($this->conn, $acc_id);
            $sql = "SELECT * FROM admin_function WHERE acc_id = $acc_id";
            $result = mysqli_query($this->conn, $sql);
        
            $data = [];
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $data[] = $row; 
                }
            }
        
            return $data; 
        }

        public function clearPermission($acc_id){
            $acc_id = mysqli_real_escape_string($this->conn, $acc_id);
            $sql = "DELETE FROM admin_function WHERE acc_id = '$acc_id'";
            mysqli_query($this->conn, $sql);
        }

        public function addPermission($acc_id, $func_id){
            $acc_id = mysqli_real_escape_string($this->conn, $acc_id);
            $func_id = mysqli_real_escape_string($this->conn, $func_id);
            $sql = "INSERT INTO admin_function (acc_id, func_id) VALUES ('$acc_id', '$func_id')";
            mysqli_query($this->conn, $sql);
        }

    }