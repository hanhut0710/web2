<?php
include("./connect.php");
include("../class/User.php");
include("../class/address.php");
session_start();
$acc_id = $_SESSION['acc_id'];
$user_id = $_SESSION['user_id']; 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $city = "Hồ Chí Minh";
    $fullname = $_POST['FullName'] ?? '';
    $phone = $_POST['Phone'] ?? '';
    $district = $_POST['District'] ?? '';
    $ward = $_POST['Ward'] ?? '';
    $addressLine = $_POST['Address'] ?? '';
    $stmt = $con->prepare("SELECT COUNT(*) FROM address WHERE user_id = ? AND `default` = 1");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    // Nếu chưa có địa chỉ mặc định, đặt địa chỉ mới là mặc định (default = 1)
    if ($count == 0) {
        $default = 1;
    } else {
        // Nếu đã có địa chỉ mặc định, để mặc định = 0
        $default = 0;
    }
    $user = new User(); // Tạo đối tượng Account
    if ($user->updateUserInfo($fullname, $phone, $acc_id, $con)) {
        echo "Thông tin cá nhân đã được cập nhật thành công!<br>";
    } else {
        echo "Có lỗi khi cập nhật thông tin cá nhân!<br>";
    }

    if (empty($addressLine) || empty($district) || empty($ward)) {
    } else {
        // Nếu tất cả các trường hợp lệ, tiếp tục lưu địa chỉ
        $address = new Address();
        $address->setUserId($user_id);
        $address->setAddressLine($addressLine);
        $address->setWard($ward);
        $address->setDistrict($district);
        $address->setCity($city); 
        $address->setDefault($default);
        
        // Lưu vào CSDL
        if ($address->saveAddress($con)) {
            echo "Địa chỉ đã được lưu thành công!";
        } else {
            echo "Lỗi khi lưu địa chỉ!";
        }
    }
    $con->close();
}
?>