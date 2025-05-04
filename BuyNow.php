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

    <!-- Css Styles -->
    <!-- <link rel="stylesheet" href="css/account.css" type="text/css"> -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/checkout.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <?php include("./layout/header.php");?>
    <?php include("./layout/checkout.php");?>
    <?php include("./layout/footer.php");?>

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
    <script src="js/buynow.js"></script>

</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $productId = $_POST['product_id'] ?? null;
    $productDetailId = $_POST['product_detail_id'] ?? null;
    $quantity = $_POST['quantity'] ?? 1;
    $action = $_POST['action'] ?? '';
    $data = [
        'product_id' => $_POST['product_id'] ?? null,
        'product_detail_id' => $_POST['product_detail_id'] ?? null,
        'quantity' =>  $_POST['quantity'] ?? 1,
    ];
    // Kiểm tra dữ liệu
    // if ($action === "buy_now" && $productId && $productDetailId) {
    //     // Xử lý đặt hàng nhanh ở đây
    //     echo "Bạn vừa chọn mua ngay sản phẩm ID $productId (chi tiết: $productDetailId), số lượng: $quantity";
    // } else {
    //     echo "Thiếu dữ liệu đặt hàng.";
    // }
} else {
    echo "Phương thức không hợp lệ.";
}
?>
<script>
    const serverData = <?= json_encode($data, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;
    console.log(serverData)
</script>