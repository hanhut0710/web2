<?php
session_start();
include('./connect.php'); // Kết nối cơ sở dữ liệu

// Kiểm tra nếu người dùng đã đăng nhập
if (!isset($_SESSION['acc_id'])) {
    echo "Bạn phải đăng nhập để thực hiện thao tác này.";
    exit;
}
// Kiểm tra dữ liệu POST
if (isset($_POST['PasswordOld'], $_POST['PasswordNew'], $_POST['PasswordNewConfirm'])) {
    $old = $_POST['PasswordOld'];
    $new = $_POST['PasswordNew'];
    $newConfirm = $_POST['PasswordNewConfirm'];

    // Kiểm tra nếu mật khẩu mới và xác nhận mật khẩu trùng khớp
    if ($new !== $newConfirm) {
        echo "Mật khẩu mới và xác nhận không khớp.";
        exit;
    }

    $username = $_SESSION['acc_id']; // Hoặc ID người dùng trong hệ thống

    // Lấy mật khẩu hiện tại trong DB
    $stmt = $con->prepare("SELECT password FROM accounts WHERE id = ?");
    $stmt->bind_param("i", $username);  // Gắn giá trị cho tham số (kiểu "i" là integer)
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Sử dụng fetch_assoc() để lấy kết quả
    $row = $result->fetch_assoc();
    $current = $row['password'];  // Lấy mật khẩu cũ từ kết quả

    // Kiểm tra mật khẩu cũ
    if (!$current || !password_verify($old, $current)) {
        echo "Mật khẩu hiện tại không đúng.";
        exit;
    }

    // Cập nhật mật khẩu mới
    $newHashed = password_hash($new, PASSWORD_DEFAULT); // Mã hóa mật khẩu mới
    $stmt = $con->prepare("UPDATE accounts SET password = ? WHERE id = ?");
    $stmt->bind_param("si", $newHashed, $username);  // Gắn giá trị cho tham số (kiểu "s" cho string và "i" cho integer)
    if ($stmt->execute()) {
        echo "Đổi mật khẩu thành công!";
    } else {
        echo "Lỗi khi cập nhật mật khẩu.";
    }
} else {
    echo "Thiếu dữ liệu.";
}
?>
