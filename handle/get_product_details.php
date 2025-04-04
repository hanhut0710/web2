<?php
// Kết nối cơ sở dữ liệu
header('Content-Type: application/json');
include('./connect.php');

if (isset($_GET['product_id'])) {
    $productId = $_GET['product_id'];

    // Truy vấn chi tiết sản phẩm
    $query = "SELECT * FROM products p, product_details pd WHERE p.id = '$productId' AND pd.product_id = p.id GROUP BY pd.size"; 
    
    $result = $con->query($query);

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
    echo json_encode($product);
} 
    else {
    echo json_encode(['error' => 'Sản phẩm không tồn tại']);
}

    $con->close();
}
?>
