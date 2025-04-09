<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

include("./connect.php");
include("../class/account.php");


$response = [];

// Khởi tạo đối tượng Account
$account = new Account();

// Lấy thông tin từ form và kiểm tra
$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$passwd = isset($_POST['passwd']) ? trim($_POST['passwd']) : '';
$fullname = isset($_POST['fullname']) ? trim($_POST['fullname']) : '';
$phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
$repasswd = isset($_POST['repasswd']) ? trim($_POST['repasswd']) : '';

if (empty($username) || empty($passwd)) {
    $response = ['status' => 'error', 'message' => 'Thiếu thông tin!'];
} else {
    // Kiểm tra nếu là form đăng ký
    if (isset($_POST['fullname'], $_POST['phone'], $_POST['repasswd'])) {
        // Đăng ký
        if ($passwd !== $repasswd) {
            $response = ['status' => 'error', 'message' => 'Mật khẩu không khớp!'];
        } 
        // elseif (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        //     $response = ['status' => 'error', 'message' => 'Email không hợp lệ!'];
        // } 
        elseif (!preg_match('/^[0-9]{10}$/', $phone)) {
            $response = ['status' => 'error', 'message' => 'Số điện thoại không hợp lệ!'];
        } else {
            // Mã hóa mật khẩu trước khi lưu
            // $hashed_password = password_hash($passwd, PASSWORD_DEFAULT);
            // Thực hiện đăng ký
            $response = $account->register($username, $passwd, $fullname, $phone, $con);
        }
    } else {
        // Đăng nhập
        if ($account->login($username, $passwd, $con)) {
            // Lưu thông tin vào session
            $_SESSION['user'] = $account->getUsername();
            $_SESSION['id'] = $account->getId();
            $response = ['status' => 'success', 'message' => 'Đăng nhập thành công!'];
        } else {
            $response = ['status' => 'error', 'message' => 'Mật khẩu hoặc tài khoản không đúng!'];
        }
    }
}

header('Content-Type: application/json');
echo json_encode($response);
$con->close();
?>
