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
                // Mã hóa mật khẩu an toàn
                $hashed_password = password_hash($passwd, PASSWORD_DEFAULT);
                
                $stmt = $con->prepare("INSERT INTO users (fullname, phone, username, passwd) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $fullname, $phone, $username, $hashed_password);
                
                if ($stmt->execute()) {
                    $response['status'] = 'success';
                    $response['message'] = 'Đăng ký thành công';
                } else {
                    $response['status'] = 'error';
                    $response['message'] = 'Lỗi: ' . $stmt->error;
                }
                
                $stmt->close();
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Mật khẩu không khớp';
            }
        } else {
            // Xử lý đăng nhập
            $stmt = $con->prepare("SELECT passwd FROM accounts WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->store_result();
            
            if ($stmt->num_rows > 0) {
                $stmt->bind_result($hashed_password);
                $stmt->fetch();
                
                if (password_verify($passwd, $hashed_password)) {
                    $response['status'] = 'success';
                    $response['message'] = 'Đăng nhập thành công';
                } else {
                    $response['status'] = 'error';
                    $response['message'] = 'Tên đăng nhập hoặc mật khẩu không đúng';
                }
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Tên đăng nhập hoặc mật khẩu không đúng';
            }
            
            $stmt->close();
        }
    }
}

header('Content-Type: application/json');
echo json_encode($response);

$con->close();
