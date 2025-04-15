<?php
include("./connect.php");
include("../class/account.php");
include("../class/User.php");
include("../class/address.php");
session_start();
$user = new User();
$user->getUserInfo($_SESSION['user_id']);

$user_id = $user->getId(); 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['FullName'] ?? '';
    $phone = $_POST['Phone'] ?? '';
    $district = $_POST['District'] ?? '';
    $ward = $_POST['Ward'] ?? '';
    $addressLine = $_POST['Address'] ?? '';
    $default = isset($_POST['Default']) ? 1 : 0;
    $address = new Address();
    $address->setUserId($user_id);
    $address->setAddressLine($addressLine);
    $address->setWard($ward);
    $address->setDistrict($district);
    $address->setCity('Hồ Chí Minh'); // nếu không có city thì để trống hoặc truyền thêm từ form
    $address->setDefault($default);

      // Lưu vào CSDL
    if ($address->saveAddress($con)) {
        echo "Địa chỉ đã được lưu thành công!";
    } else {
        echo "Lỗi khi lưu địa chỉ!";
    }
    $con->close();
    echo "Dữ liệu đã được lưu thành công!";
}
?>