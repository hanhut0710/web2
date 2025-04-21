<?php
    require_once "database.php";

    class StatisticCustomer{
        private $conn;

        public function __construct(){
            $db = new Database();
            $this->conn = $db->getConnection();
        }

        public function getTop5Customers($startDate, $endDate, $limit, $sort){
            $startDate = mysqli_real_escape_string($this->conn, $startDate);
            $endDate = mysqli_real_escape_string($this->conn, $endDate);

            $sql = "SELECT u.id, u.full_name, COUNT(o.user_id) AS order_count, SUM(o.total_price) AS total_price
                    FROM users u
                    JOIN orders o ON u.id = o.user_id
                    JOIN (
                        SELECT u.id 
                        FROM users u
                        JOIN orders o ON u.id = o.user_id
                        WHERE o.created_at BETWEEN '$startDate' AND '$endDate'
                        GROUP BY u.id
                        ORDER BY SUM(o.total_price) DESC
                        LIMIT $limit
                    ) top_customers ON u.id = top_customers.id
                    WHERE o.created_at BETWEEN '$startDate' AND '$endDate'
                    GROUP BY u.id
                    ORDER BY total_price $sort, order_count DESC
                    LIMIT $limit";
            $result = mysqli_query($this->conn, $sql);
            $data = [];
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;
            }
            return $data;
        }

        public function getCustomersByTime($startDate, $endDate, $limit, $offset, $sort){
            $startDate = mysqli_real_escape_string($this->conn, $startDate);
            $endDate = mysqli_real_escape_string($this->conn, $endDate);

            $sql = "SELECT u.id, u.full_name, o.email, COUNT(o.user_id) AS order_count, SUM(o.total_price) AS total_price
                    FROM users u
                    JOIN orders o ON u.id = o.user_id
                    WHERE o.created_at BETWEEN '$startDate' AND '$endDate'
                    GROUP BY u.id
                    ORDER BY total_price $sort
                    LIMIT $limit OFFSET $offset";
            $result = mysqli_query($this->conn, $sql);
            $data = [];
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;
            }
            return $data;
        }

        public function changeChartRevenueByTime($startDate, $endDate){
            $startDate = mysqli_real_escape_string($this->conn, $startDate);
            $endDate = mysqli_real_escape_string($this->conn, $endDate);

            $sql = "SELECT DATE(created_at) AS date, SUM(total_price) AS total_price
                    FROM orders
                    WHERE created_at BETWEEN '$startDate' AND '$endDate'
                    GROUP BY DATE(created_at)
                    ORDER BY DATE(created_at) ASC";
            $result = mysqli_query($this->conn, $sql);
            $data = [];
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;
            }
            return $data;
        }

        public function changeChartOrderByTime($startDate, $endDate){
            $startDate = mysqli_real_escape_string($this->conn, $startDate);
            $endDate = mysqli_real_escape_string($this->conn, $endDate);

            $sql = "SELECT DATE(created_at) AS date, COUNT(*) AS order_count
                    FROM orders
                    WHERE created_at BETWEEN '$startDate' AND '$endDate'
                    GROUP BY DATE(created_at)
                    ORDER BY DATE(created_at) ASC";
            $result = mysqli_query($this->conn, $sql);
            $data = [];
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;
            }
            return $data;
        }

        public function changeChartCustomerByTime($startDate, $endDate){
            $startDate = mysqli_real_escape_string($this->conn, $startDate);
            $endDate = mysqli_real_escape_string($this->conn, $endDate);

            $sql = "SELECT DATE(created_at) AS date, COUNT(DISTINCT user_id) AS customer_count
                    FROM orders
                    WHERE created_at BETWEEN '$startDate' AND '$endDate'
                    GROUP BY DATE(created_at)
                    ORDER BY DATE(created_at) ASC";
            $result = mysqli_query($this->conn, $sql);
            $data = [];
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;
            }
            return $data;
        }
        public function getTotalCustomerByTime($startDate, $endDate){
            $startDate = mysqli_real_escape_string($this->conn, $startDate);
            $endDate = mysqli_real_escape_string($this->conn, $endDate);

            $sql = "SELECT COUNT(DISTINCT user_id) AS total FROM orders WHERE created_at BETWEEN '$startDate' AND '$endDate'";
            $result = mysqli_query($this->conn, $sql);
            $row = mysqli_fetch_assoc($result);
            return $row['total'];
        }

        public function getOrderByTime($startDate, $endDate, $limit, $offset, $sort){
            $startDate = mysqli_real_escape_string($this->conn, $startDate);
            $endDate = mysqli_real_escape_string($this->conn, $endDate);

            $sql = "SELECT * FROM orders WHERE created_at BETWEEN '$startDate' AND '$endDate' ORDER BY total_price $sort LIMIT $limit OFFSET $offset";
            $result = mysqli_query($this->conn, $sql);
            $data = [];
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;
            }
            return $data;
        }

        public function getTotalOrderByTime($startDate, $endDate){
            $startDate = mysqli_real_escape_string($this->conn, $startDate);
            $endDate = mysqli_real_escape_string($this->conn, $endDate);

            $sql = "SELECT COUNT(*) AS total FROM orders WHERE created_at BETWEEN '$startDate' AND '$endDate'";
            $result = mysqli_query($this->conn, $sql);
            $row = mysqli_fetch_assoc($result);
            return $row['total'];
        }

        public function getTotalRevenueByTime($startDate, $endDate){
            $startDate = mysqli_real_escape_string($this->conn, $startDate);
            $endDate = mysqli_real_escape_string($this->conn, $endDate);

            $sql = "SELECT SUM(total_price) AS total FROM orders WHERE created_at BETWEEN '$startDate' AND '$endDate'";
            $result = mysqli_query($this->conn, $sql);
            $row = mysqli_fetch_assoc($result);
            return $row['total'];
        }
    }

    

