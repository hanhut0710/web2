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

        public function getAllOrder($limit , $offset){
            $sql = "SELECT orders.id, orders.user_id, orders.pay_method, orders.total_price, orders.status, orders.created_at,
            orders.name, orders.address, orders.phone, orders.email, 
            order_status.status_name, order_status.updated_at, order_status.status AS order_status_status, 
            accounts.username
            FROM orders 
            LEFT JOIN users ON orders.user_id = users.id
            LEFT JOIN accounts ON users.acc_id = accounts.id
            LEFT JOIN order_status ON orders.status = order_status.status_name
            LIMIT $limit OFFSET $offset";
            $result = mysqli_query($this->conn,$sql);
            $orders=[];
            if($result){
                while($row = mysqli_fetch_array($result))
                    $orders[] = $row;
            }
            return $orders;
        }

        public function getTotalOrder(){
            $sql = "SELECT COUNT(*) as total FROM orders";
            $result = mysqli_query($this->conn,$sql);
            if($result)
            $row = mysqli_fetch_assoc($result);
                return $row['total'];
        }


        public function getOrderDetailLeftByID($orderID){
            $sql="SELECT od.order_id , od.quanlity , od.price,
            pd.color, pd.size, pd.img_src, pd.stock,
            p.name
            FROM products p , product_details pd , order_details od
            WHERE od.order_id = '$orderID' AND od.product_id = p.id AND od.product_detail_id = pd.id";
            $result = mysqli_query($this->conn, $sql);
            $details=[];
            if($result){
                while($row = mysqli_fetch_assoc($result))
                    $details[] = $row;
            }
            return $details;
        }

        public function getOrderDetailRightByID($orderID){
            $sql="SELECT orders.* , accounts.username , order_status.status AS statusEng
            FROM orders
            JOIN users ON orders.user_id = users.id
            JOIN accounts ON users.acc_id = accounts.id
            JOIN order_status ON orders.status = order_status.status_name
            WHERE orders.id = '$orderID'
            ";
            $result = mysqli_query($this->conn , $sql);
            if($result && mysqli_num_rows($result) > 0)
                return mysqli_fetch_assoc($result); 
        return null;
        }

        public function updateOrderStatus($orderID,$status){
            $status_change =[
                'pending' => 'Chờ xác nhận',
                'packing' => 'Chờ lấy hàng',
                'shipping' => 'Đang giao',
                'delivered' => 'Đã giao',
                'cancelled' => 'Đã hủy'
            ];

            if(isset($status_change[$status]))
                $status_update = $status_change[$status];
            else 
                $status_update = $status;
            
            $sql = "UPDATE orders SET status ='$status_update' WHERE id = '$orderID'";
            return mysqli_query($this->conn, $sql);
        }
        
    }
?>