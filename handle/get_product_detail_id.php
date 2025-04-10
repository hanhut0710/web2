<?php
// get_product_details.php
header('Content-Type: application/json');
include('./connect.php');

if (isset($_GET['product_id'])) {
    $productId = $_GET['product_id'];

    $query = "SELECT id AS product_detail_id, size, color, brand, img_src, stock 
              FROM product_details 
              WHERE product_id = '$productId'";

    $result = $con->query($query);
    $details = [];

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $details[] = $row;
        }
        echo json_encode(['details' => $details]);
    } else {
        echo json_encode(['error' => 'Không có chi tiết sản phẩm']);
    }

    $con->close();
}
?>
