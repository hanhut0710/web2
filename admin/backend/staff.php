<?php
    require_once "database.php";

   class Staff{
        private $conn;

        public function __construct()
        {
            $db = new Database();
            $this->conn = $db->getConnection();
        }

        public function getStaffList($role, $limit, $offset) {
            if($role == 3){
                $sql = "SELECT admin.*, accounts.status FROM admin JOIN accounts ON admin.acc_id = accounts.id LIMIT $limit OFFSET $offset";
            }else{
                $sql = "SELECT admin.*, accounts.status FROM admin JOIN accounts ON admin.acc_id = accounts.id WHERE role = '$role' LIMIT $limit OFFSET $offset";
            }
            $result = mysqli_query($this->conn, $sql);
            $data = [];
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row ;
            }
            
            return $data;
        }

        public function addStaff($full_name, $phone, $email, $role, $acc_id){
            $sql = "INSERT INTO admin (full_name, phone, email, role, acc_id) VALUES ('$full_name', '$phone', '$email', '$role', '$acc_id')";
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

        public function updateStaff($id, $full_name, $phone, $email, $role){
            $sql = "UPDATE admin SET full_name = '$full_name', phone = '$phone', email = '$email', role = '$role' WHERE id = '$id'";
            mysqli_query($this->conn, $sql);
        }

        public function getAccIdByStaffId($id) {
            $id = mysqli_real_escape_string($this->conn, $id);
            $sql = "SELECT acc_id FROM admin WHERE id = '$id'";
            $result = mysqli_query($this->conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                return mysqli_fetch_assoc($result)['acc_id'];
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

        public function searchStaffById($id, $limit, $offset) {
            $id = mysqli_real_escape_string($this->conn, $id); // Tránh SQL Injection
            $sql = "SELECT admin.id AS admin_id, admin.full_name, admin.phone, admin.email, admin.role, accounts.status 
                    FROM admin 
                    JOIN accounts ON admin.acc_id = accounts.id 
                    WHERE admin.id LIKE '%$id%' 
                    LIMIT $limit OFFSET $offset";
            $result = mysqli_query($this->conn, $sql);
            $staffList = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $staffList[] = $row;
            }
            return $staffList;
        }

        public function getTotalStaffByRole($role) {
            if($role == 3){
                $sql = "SELECT COUNT(*) as total FROM admin ";
            }
            else{
                $sql = "SELECT COUNT(*) as total FROM admin WHERE role = '$role'";
            }
            $result = mysqli_query($this->conn, $sql);
            $row = mysqli_fetch_assoc($result);
            return $row['total'];
        }

        public function getTotalStaffById($search_id) {
            $sql = "SELECT COUNT(*) as total FROM admin WHERE id LIKE '%$search_id%'";
            $result = mysqli_query($this->conn, $sql);
            $row = mysqli_fetch_assoc($result);
            return $row['total'];
        }

        public function checkDulicatePhone($phone){
            $sql = "SELECT * FROM admin WHERE phone = '$phone'";
            $result = mysqli_query($this->conn, $sql);
            if($result && mysqli_num_rows($result) > 0){
                return true;
            }
            return false;
        }
        
        public function checkDulicateUsername($username){
            $sql = "SELECT * FROM admin, accounts WHERE accounts.username = '$username' AND admin.acc_id = accounts.id";
            $result = mysqli_query($this->conn, $sql);
            if($result && mysqli_num_rows($result) > 0){
                return true;
            }
            return false;
        }

        function checkDulicateEmail($email){
            $sql = "SELECT * FROM admin WHERE email = '$email'";
            $result = mysqli_query($this->conn, $sql);
            if($result && mysqli_num_rows($result) > 0){
                return true;
            }
            return false;
        }
   }