<?php 
     require_once "database.php";

     class Order{
         private $conn;
 
         public function __construct(){
             $db = new Database();
             $this->conn = $db->getConnection();
         }

         public function getOrderByTime($startDate, $endDate, $user_id){
            $startDate = mysqli_real_escape_string($this->conn, $startDate);
             $endDate = mysqli_real_escape_string($this->conn, $endDate);
             $user_id = mysqli_real_escape_string($this->conn, $user_id);

             $sql = "SELECT * FROM orders WHERE created_at BETWEEN '$startDate' AND '$endDate' AND user_id = '$user_id'";
             $result = mysqli_query($this->conn, $sql);
             $data = [];
             while($row = mysqli_fetch_assoc($result)){
                 $data[] = $row;
             }
             return $data;
         }

        public function getOrderDetail($order_id){
            $order_id = mysqli_real_escape_string($this->conn, $order_id);
            $sql = "SELECT * FROM order_details od, product_details pd, products p WHERE od.order_id = '$order_id' AND od.product_detail_id = pd.id AND pd.product_id = p.id";
            $result = mysqli_query($this->conn, $sql);
            $data = [];
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;
            }
            return $data;
        }
        
    }
?>