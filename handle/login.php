<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("./connect.php");

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username']) && isset($_POST['passwd'])) {
        $username = $_POST['username'];
        $passwd = $_POST['passwd'];

        if (isset($_POST['fullname']) && isset($_POST['phone']) && isset($_POST['repasswd'])) {
            // Xử lý đăng ký
            $fullname = $_POST['fullname'];
            $phone = $_POST['phone'];
            $repasswd = $_POST['repasswd'];

            if ($passwd === $repasswd) {
                $sql = "INSERT INTO users (fullname, phone, username, passwd) VALUES ('$fullname', '$phone', '$username', '$passwd')";
                if ($con->query($sql) === TRUE) {
                    $response['status'] = 'success';
                    $response['message'] = 'Đăng ký thành công';
                } else {
                    $response['status'] = 'error';
                    $response['message'] = 'Lỗi: ' . $sql . '<br>' . $con->error;
                }
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Mật khẩu không khớp';
            }
        } else {
            // Xử lý đăng nhập
            $sql = "SELECT * FROM accounts WHERE username='$username' AND password='$passwd'";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                $response['status'] = 'success';
                $response['message'] = 'Đăng nhập thành công';
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Tên đăng nhập hoặc mật khẩu không đúng';
            }
        }
    }
}
    header('Content-Type: application/json');
    echo json_encode($response);
    
    $con->close();