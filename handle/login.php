<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

include("./connect.php");
include("../class/account.php");
include("../class/User.php");


$response = [];

// Khởi tạo đối tượng Account
$account = new Account();

// Lấy thông tin từ form và kiểm tra
$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$passwd = isset($_POST['passwd']) ? trim($_POST['passwd']) : '';
$fullname = isset($_POST['fullname']) ? trim($_POST['fullname']) : '';
$phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
$repasswd = isset($_POST['repasswd']) ? trim($_POST['repasswd']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
if (empty($username) || empty($passwd)) {
    $response = ['status' => 'error', 'message' => 'Thiếu thông tin!'];
} else {
    // Kiểm tra nếu là form đăng ký
    if (isset($_POST['fullname'], $_POST['phone'], $_POST['repasswd'])) {
        // Đăng ký
        if ($passwd !== $repasswd) {
            $response = ['status' => 'error', 'message' => 'Mật khẩu không khớp!'];
        } 
        elseif (!preg_match('/^[0-9]{10}$/', $phone)) {
            $response = ['status' => 'error', 'message' => 'Số điện thoại không hợp lệ!'];
        } else {
            $response = $account->register($username, $passwd, $fullname, $phone,$email, $con);
        }
    } else {
        // Đăng nhập
        if ($account->login($username, $passwd, $con)) {
            // Lưu thông tin vào session
            $_SESSION['user'] = $account->getUsername();
            $_SESSION['acc_id'] = $account->getId();
            $user = new User();
            $user->getUserInfo($account->getId(),$con);
            if($user){
                $_SESSION['user_name'] = $user->getFullname();
                $_SESSION['user_phone'] = $user->getPhone();
                $_SESSION['user_id'] = $user->getId();
            }
            $response = ['status' => 'success', 'message' => 'Đăng nhập thành công!' ];
        } else {
            $response = ['status' => 'error', 'message' => 'Mật khẩu hoặc tài khoản không đúng!'];
        }
    }
}

header('Content-Type: application/json');
echo json_encode($response);
$con->close();
?>
