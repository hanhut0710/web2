<?php 
    require_once "database.php";

    class Functions{
        private $conn;

        public function __construct()
        {
            $db = new Database();
            $this->conn = $db->getConnection();
        }

        public function getFunctionList(){
            $sql = "SELECT * FROM functions";
            $result = mysqli_query($this->conn, $sql);
            $data = [];
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;
            }
            return $data;
        }

        public function getFunctionGroup(){
            $sql = "SELECT * FROM function_group";
            $result = mysqli_query($this->conn, $sql);
        
            $data = [];
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $data[] = $row; 
                }
            }
        
            return $data; 
        }
    }