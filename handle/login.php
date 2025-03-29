<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("./connect.php");

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['username']) || !isset($_POST['passwd'])) {
        $response['status'] = 'error';
        $response['message'] = 'Thiếu thông tin!';
    } else {
        $username = trim($_POST['username']);
        $passwd = trim($_POST['passwd']);

        if (isset($_POST['fullname']) && isset($_POST['phone']) && isset($_POST['repasswd'])) {
            // Xử lý đăng ký
            $fullname = trim($_POST['fullname']);
            $phone = trim($_POST['phone']);
            $repasswd = trim($_POST['repasswd']);

            if ($passwd !== $repasswd) {
                $response['status'] = 'error';
                $response['message'] = 'Mật khẩu không khớp!';
            } else {
                // Kiểm tra username có tồn tại không
                $stmt = $con->prepare("SELECT * FROM accounts WHERE username = ?");
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $response['status'] = 'error';
                    $response['message'] = 'Tên đăng nhập đã tồn tại!';
                } else {
                    // Mã hóa mật khẩu trước khi lưu
                    $hashedPassword = password_hash($passwd, PASSWORD_BCRYPT);
                    // Lưu vào database
                    $stmt = $con->prepare("INSERT INTO accounts (username, password) VALUES (?, ?)");
                    $stmt->bind_param("ss", $username, $hashedPassword);

                    if ($stmt->execute()) {
                        $response['status'] = 'success';
                        $response['message'] = 'Đăng ký thành công!';
                    } else {
                        $response['status'] = 'error';
                        $response['message'] = 'Lỗi khi đăng ký!';
                    }
                }
                $stmt->close();
            }
        } else {
            // Xử lý đăng nhập
            $stmt = $con->prepare("SELECT * FROM accounts WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                
                // Kiểm tra mật khẩu
                // if (password_verify($passwd, $user["password"])) {
                //     session_start();
                //     $_SESSION["user"] = $username;
                    
                //     $response['status'] = 'success';
                //     $response['message'] = 'Đăng nhập thành công!';
                // }
                if ($passwd === $user["password"]) {
                    session_start();
                    $_SESSION["user"] = $username;
                    $response['status'] = 'success';
                    $response['message'] = 'Đăng nhập thành công!';
                } else {
                    $response['status'] = 'error';
                    $response['message'] = 'Mật khẩu không đúng!';
                }
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Tài khoản không tồn tại!';
            }
            $stmt->close();
        }
    }
}

header('Content-Type: application/json');
echo json_encode($response);

$con->close();
?>
