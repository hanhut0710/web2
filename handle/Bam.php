<?php
include('./connect.php'); // Kết nối CSDL

// Lấy toàn bộ tài khoản
$sql = "SELECT id, password FROM accounts";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $password = $row['password'];

        // Kiểm tra nếu chưa băm (ví dụ: chưa có prefix '$2y$' của bcrypt)
        if (strpos($password, '$2y$') !== 0) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            // Cập nhật lại mật khẩu đã băm
            $stmt = $con->prepare("UPDATE accounts SET password = ? WHERE id = ?");
            $stmt->bind_param("si", $hashedPassword, $id);
            $stmt->execute();
        }
        if ($stmt->execute()) {
            echo "✅ Đã băm mật khẩu cho tài khoản: <strong>$username</strong><br>";
            $count++;
        } else {
            echo "❌ Lỗi khi cập nhật mật khẩu cho: <strong>$username</strong><br>";
        }
    }
    echo "Đã băm toàn bộ mật khẩu thành công.";
} else {
    echo "Không tìm thấy tài khoản nào.";
}
?>
