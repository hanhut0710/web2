<?php
    include "../../config/database.php";
    class Stactic{
        private $conn;

        public function __construct(){   
            $mysql = new Database();
            $this->conn = $mysql->getConnection();
        }
    
        public function getCustomer(){
            $sql = "SELECT id FROM users";
            $result = mysqli_query($this->conn, $sql);
            return $result -> num_rows;
        }

        public function getProduct(){
            $sql = "SELECT id FROM products";
            $result = mysqli_query($this->conn, $sql);
            return $result -> num_rows;
        }

        public function getSale(){
            $sql = "SELECT SUM(total_price) AS total_sale FROM orders";
            $result = mysqli_query($this->conn, $sql);
            if($result){
                $row = mysqli_fetch_assoc($result);
                return $row["total_sale"];
            }
            return 0;
        }

        public function getProductList(){
            $sql = "SELECT category.name AS category_name, products.name AS product_name, products.price, products.img_src FROM category, products WHERE products.category_id = category.id";
            $result = mysqli_query($this->conn, $sql);
            $data = array();
            if($result-> num_rows > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $data[] = $row;
                }
                return $data;
            }
            return null;
        }

        public function getCustomerList(){
            $sql = "SELECT * FROM users";
            $result = mysqli_query($this->conn, $sql);
            $data = array();
            if($result-> num_rows > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $data[] = $row;
                }
                return $data;
            }
            return null;
        }
        
        public function getOrderList(){
            $sql = "SELECT orders.id, users.full_name, orders.created_at, orders.total_price FROM users, orders WHERE user_id = users.id;";
            $result = mysqli_query($this->conn, $sql);
            $data = array();
            if($result-> num_rows > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $data[] = $row;
                }
                return $data;
            }
            return null;
        }
    }