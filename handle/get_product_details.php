<?php
// get_product_details.php
header('Content-Type: application/json');
include('./connect.php');

if (isset($_GET['product_id'])) {
    $productId = $_GET['product_id'];
    $size = isset($_GET['size']) ? $_GET['size'] : null;
    $color = isset($_GET['color']) ? $_GET['color'] : null;

    // Truy vấn thông tin sản phẩm
    $query = "SELECT p.*, b.name AS brand_name
              FROM products p
              JOIN brand b ON p.brand_id = b.id
              WHERE p.id = '$productId'";

    // Các size còn hàng
    $query2 = "SELECT DISTINCT pd.size 
               FROM product_details pd
               WHERE pd.product_id = '$productId' AND pd.stock > 0";

    // Các màu còn hàng
    $query3 = "SELECT DISTINCT pd.color, pd.img_src
               FROM product_details pd
               WHERE pd.product_id = '$productId' AND pd.stock > 0";

    // Danh sách tất cả biến thể
    $query4 = "SELECT pd.id, pd.size, pd.color, pd.stock, pd.img_src
               FROM product_details pd
               WHERE pd.product_id = '$productId' AND pd.stock > 0";

    // Nếu có cả size và color: lấy stock cụ thể
    $query5 = null;
    if ($size && $color) {
        $query5 = "SELECT stock, img_src 
                   FROM product_details 
                   WHERE product_id = '$productId' AND size = '$size' AND color = '$color' 
                   LIMIT 1";
    }

    // Thực thi các truy vấn
    $result = $con->query($query);
    $result2 = $con->query($query2);
    $result3 = $con->query($query3);
    $result4 = $con->query($query4);
    $result5 = ($query5 !== null) ? $con->query($query5) : false;

    $data = [];
    $sizes = [];
    $colors = [];
    $variants = [];

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();

        while ($row = $result2->fetch_assoc()) {
            $sizes[] = $row;
        }

        while ($row = $result3->fetch_assoc()) {
            $colors[] = $row;
        }

        while ($row = $result4->fetch_assoc()) {
            $variants[] = $row;
        }

        $data['product'] = $product;
        $data['size'] = $sizes;
        $data['color'] = $colors;
        $data['variants'] = $variants;

        // Nếu có selected variant
        if ($result5 && $result5->num_rows > 0) {
            $row = $result5->fetch_assoc();
            $data['selected_variant'] = [
                'stock' => $row['stock'],
                'img_src' => $row['img_src']
            ];
        }

        echo json_encode($data);
    } else {
        echo json_encode(['error' => 'Sản phẩm không tồn tại']);
    }

    $con->close();
}
?>
