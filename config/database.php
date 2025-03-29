<?php
class Database {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "web2";
    private $conn;

    public function getConnection()
    {
        try {
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);
            return $this->conn;
        } catch (\Throwable $th) {
            echo "Lỗi kết nối database \n";
        }
    }

    public disConnection()
    {
        if($this->conn)
            mysqli_close($this->conn);
    }
}
   
?>