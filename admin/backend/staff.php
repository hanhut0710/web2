<?php
    require_once "../config/database.php";

   class Staff{
        private $conn;

        public function __construct()
        {
            $db = new Database();
            $this->conn = $db->getConnection();
        }

        public function getStaffList($role){
            if($role == 3){
                $sql = "SELECT * FROM admin";
            }else{
                $sql = "SELECT * FROM admin WHERE role = '$role'";
            }
            $result = mysqli_query($this->conn, $sql);
            $data = [];
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row ;
            }
            
            return $data;
        }

        public function addStaff($full_name, $phone, $role, $acc_id){
            $sql = "INSERT INTO admin (full_name, phone, role, acc_id) VALUES ('$full_name', '$phone', '$role', '$acc_id')";
            mysqli_query($this->conn, $sql);
        }

        public function getStaffById($id) {
            $id = mysqli_real_escape_string($this->conn, $id);
            $sql = "SELECT * FROM admin WHERE id = '$id'";
            $result = mysqli_query($this->conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                return mysqli_fetch_assoc($result);
            }

            return null; 
        }

        public function updateStaff($id, $full_name, $phone, $role){
            $sql = "UPDATE admin SET full_name = '$full_name', phone = '$phone', role = '$role' WHERE id = '$id'";
            mysqli_query($this->conn, $sql);
        }

        public function getAccIdByStaffId($id) {
            $id = mysqli_real_escape_string($this->conn, $id);
            $sql = "SELECT acc_id FROM admin WHERE id = '$id'";
            $result = mysqli_query($this->conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                return mysqli_fetch_assoc($result)['id'];
            }

            return null; 
        }

        public function deleteStaff($id){
            $sql = "DELETE FROM admin WHERE id = '$id'";
            mysqli_query($this->conn, $sql);
        }

        public function getStaffRole($id){
            $sql = "SELECT role FROM admin WHERE id = '$id'";
            $result = mysqli_query($this->conn, $sql);
            if($result && mysqli_num_rows($result) > 0){
                return mysqli_fetch_assoc($result)['role'];
            }
            return null;
        }

        public function searchStaffById($id) {
            $id = mysqli_real_escape_string($this->conn, $id); // Tránh SQL Injection
            $sql = "SELECT * FROM admin WHERE id LIKE '%$id%'";
            $result = mysqli_query($this->conn, $sql);
            $staffList = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $staffList[] = $row;
            }
            return $staffList;
        }
        
   }