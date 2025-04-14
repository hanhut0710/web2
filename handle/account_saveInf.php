<?php
include("./connect.php");
include("../class/account.php");
include("../class/User.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['FullName'] ?? '';
    $phone = $_POST['Phone'] ?? '';
    $district = $_POST['District'] ?? '';
    $ward = $_POST['Ward'] ?? '';
    $address = $_POST['Address'] ?? '';

    // Xử lý lưu thông tin vào DB tại đây...

    echo "Dữ liệu đã được lưu thành công!";
}
?>