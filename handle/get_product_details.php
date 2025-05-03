<?php
// Kết nối cơ sở dữ liệu
header('Content-Type: application/json');
include('./connect.php');

if (isset($_GET['product_id'])) {
    $productId = $_GET['product_id'];

    // Truy vấn chi tiết sản phẩm
    $query = "SELECT p.*, b.name AS brand_name, pd.*
    FROM products p
    JOIN product_details pd ON p.id = pd.product_id
    JOIN brand b ON p.brand_id = b.id
    WHERE p.id = '$productId'
    GROUP BY pd.size";
    
    $query2 = "SELECT DISTINCT pd.size 
    FROM product_details pd , products p
    WHERE pd.product_id = p.id";

    $query3 = "SELECT DISTINCT pd.color, pd.img_src
    FROM product_details pd
    JOIN products p ON pd.product_id = p.id
    WHERE p.id = '$productId'";

    $result = $con->query($query);
    $result2 = $con->query($query2);
    $result3 = $con->query($query3);

    $size = [];
    $data = [];
    $color = [];

    if ($result->num_rows > 0 && $result2->num_rows > 0 && $result3->num_rows) {
        $product = $result->fetch_assoc();
        while($row = $result2->fetch_assoc()){
            $size[] = $row;
        }
        while($row = $result3->fetch_assoc()){
            $color[] = $row;
        }
        $data['product'] = $product;
        $data['size'] = $size;
        $data['color'] = $color;
        echo json_encode($data);
    } 
        else {
        echo json_encode(['error' => 'Sản phẩm không tồn tại']);
    }
        $con->close();
    }
?>
