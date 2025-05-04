<?php
include('./handle/connect.php');
session_start();
include('./class/address.php');
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm'])) {
    $order = $_SESSION['order'] ?? null;
    $userId = $_SESSION['user_id'] ?? 0;
    if (!$order || !$userId) {
        echo "Thiếu thông tin đơn hàng hoặc chưa đăng nhập.";
        exit;
    }
    // Tính tổng tiền
    include ('./class/Cart.php');
    $cart = new Cart();
    $cartItems = $cart->getCartByUserId($userId, $con);
    
    $tongTien = 0;
    foreach ($cartItems as $item) {
        $tongTien += $item['quantity'] * $item['price'];
    }

    $tongTien += 30000; // phí vận chuyển

    // Định dạng địa chỉ
    $fullAddress = $order['address_id'];

    // Chuẩn bị dữ liệu chèn
    $sql = "INSERT INTO orders (user_id, pay_method, total_price, status, created_at, name, address_id, phone, email)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        $status = 'Chờ xác nhận';
        $today = date('Y-m-d');
        $name = $order['ho'] . ' ' . $order['ten'];

        mysqli_stmt_bind_param($stmt, "isdssssss", 
            $userId,
            $order['payment_method'],
            $tongTien,
            $status,
            $today,
            $name,
            $fullAddress,
            $order['phone'],
            $order['email']
        );
        if (mysqli_stmt_execute($stmt)) {
            $orderId = mysqli_insert_id($con); // Lấy ID đơn hàng vừa thêm
            foreach ($cartItems as $item) {
                $productId = $item['product_id'];
                $quantity = $item['quantity'];
                $price = $item['price'];
                $detailId = $item['product_detail_id'];
                $sqlDetail = "INSERT INTO order_details (product_id, order_id, quanlity, price, product_detail_id)
                              VALUES (?, ?, ?, ?, ?)";
                $stmtDetail = mysqli_prepare($con, $sqlDetail);
                if ($stmtDetail) {
                    mysqli_stmt_bind_param($stmtDetail, "iiidi", $productId, $orderId, $quantity, $price, $detailId );
                    if (!mysqli_stmt_execute($stmtDetail)) {
                        echo "Lỗi khi lưu chi tiết đơn hàng: " . mysqli_stmt_error($stmtDetail);
                    }
                    mysqli_stmt_close($stmtDetail);
                } else {
                    echo "Lỗi prepare chi tiết đơn hàng: " . mysqli_error($con);
                }
                $sqlUpdateStock = "UPDATE product SET stock = stock - ? WHERE id = ?";
                $stmtUpdate = mysqli_prepare($con, $sqlUpdateStock);
                if ($stmtUpdate) {
                    mysqli_stmt_bind_param($stmtUpdate, "ii", $quantity, $productId);
                    if (!mysqli_stmt_execute($stmtUpdate)) {
                        echo "Lỗi khi cập nhật số lượng tồn kho: " . mysqli_stmt_error($stmtUpdate);
                    }
                    mysqli_stmt_close($stmtUpdate);
                } else {
                    echo "Lỗi prepare cập nhật tồn kho: " . mysqli_error($con);
                }
                $sqlDetailStock = "UPDATE product_details SET stock = stock - ? WHERE id = ?";
                $stmtUpdateDetailStock = mysqli_prepare($con,$sqlDetailStock);
                if($stmtUpdateDetailStock){
                    mysqli_stmt_blind_param($stmtUpdateDetailStock, "ii", $quantity, $detailId);
                    if(!mysqli_stmt_execute($stmtUpdateDetailStock)){
                        echo "Lỗi khi cập nhật số lượng tồn kho: " . mysqli_stmt_error($stmtUpdateDetailStock);
                    }
                    mysqli_stmt_close($stmtUpdateDetailStock);
                } else {
                    echo "Lỗi prepare cập nhật tồn kho: " . mysqli_error($con);
                }
            }
            // Xóa giỏ hàng sau khi đặt hàng
            if (isset($_SESSION['user_id'])) {
                clearCartByUserId($_SESSION['user_id'], $con);
            }
            if ($order['payment_method'] === 'banking') {
                $card = $_SESSION['card'] ;
                $cardholder = $card['cardholder'];
                $cardnumber = $card['cardnumber'];
                $expiryMonth = $card['expiryMonth'];
                $expiryYear = $card['expiryYear'];
                $cvv = $card['cvv'];
            
                $sqlCard = "INSERT INTO banking_info (order_id, cardholder_name, card_number, expiry_month, expiry_year, cvv)
                            VALUES (?, ?, ?, ?, ?, ?)";
                $stmtCard = mysqli_prepare($con, $sqlCard);
                if ($stmtCard) {
                    mysqli_stmt_bind_param($stmtCard, "isssss", $orderId, $cardholder, $cardnumber, $expiryMonth, $expiryYear, $cvv);
                    if (mysqli_stmt_execute($stmtCard)) {
                        echo "Thông tin thẻ đã được lưu.";
                    } else {
                        echo "Lỗi khi lưu thông tin thẻ: " . mysqli_stmt_error($stmtCard);
                    }
                    mysqli_stmt_close($stmtCard);
                } else {
                    echo "Lỗi prepare thông tin thẻ: " . mysqli_error($con);
                }
            }
        } else {
            echo "Lỗi khi lưu đơn hàng: " . mysqli_stmt_error($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Lỗi prepare statement: " . mysqli_error($con);
    }

    mysqli_close($con);
} else {
    echo "Dữ liệu gửi không hợp lệ.";
}
function clearCartByUserId($userId, $con) {
    $sql = "DELETE FROM cart WHERE user_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $userId);
        if (mysqli_stmt_execute($stmt)) {
            return true; // Xóa thành công
        } else {
            error_log("Lỗi khi xóa giỏ hàng: " . mysqli_stmt_error($stmt));
        }
    } else {
        error_log("Lỗi prepare: " . mysqli_error($con));
    }
    return false; // Xóa thất bại
}
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Male-Fashion | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <link rel="stylesheet" href="css/account.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/success.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include("./layout/header.php");?>
    <div class="success-container">
        <div class="success-box">
        <div class="checkmark">&#10004;</div>
        <h2>Đặt Hàng Thành Công!</h2>
        <p>Cảm ơn bạn đã mua hàng tại cửa hàng của chúng tôi.</p>
        <p>Mã đơn hàng của bạn là: <strong>#DH<?= date('Ymd') . rand(100,999) ?></strong></p>
        <a href="index.php" class="btn-home">Quay về Trang Chủ</a>
        </div>
    </div>
    <?php include("./layout/footer.php")?>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script>

    </script>
</body>

</html>