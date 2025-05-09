<?php
header('Content-Type: application/json');
include('./connect.php');

if (isset($_GET['product_id'])) {
    $productId = $_GET['product_id'];
    $size = isset($_GET['size']) ? $_GET['size'] : null;
    $color = isset($_GET['color']) ? $_GET['color'] : null;

    $query = "SELECT p.*, b.name AS brand_name
              FROM products p
              JOIN brand b ON p.brand_id = b.id
              WHERE p.id = '$productId'";

    $query2 = "SELECT DISTINCT pd.size 
               FROM product_details pd
               WHERE pd.product_id = '$productId' AND pd.stock > 0";

    $query3 = "SELECT DISTINCT pd.color, pd.img_src
               FROM product_details pd
               WHERE pd.product_id = '$productId' AND pd.stock > 0";

    $query4 = "SELECT pd.id, pd.size, pd.color, pd.stock, pd.img_src
               FROM product_details pd
               WHERE pd.product_id = '$productId' AND pd.stock > 0";

    $query5 = null;
    if ($size && $color) {
        $query5 = "SELECT stock, img_src 
                   FROM product_details 
                   WHERE product_id = '$productId' AND size = '$size' AND color = '$color' 
                   LIMIT 1";
    }

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

        while ($row = mysqli_fetch_assoc($result2)) {
            $sizes[] = $row;
        }

        while ($row = mysqli_fetch_assoc($result3)) {
            $colors[] = $row;
        }

        while ($row = mysqli_fetch_assoc($result4)) {
            $variants[] = $row;
        }

        $data['product'] = $product;
        $data['size'] = $sizes;
        $data['color'] = $colors;
        $data['variants'] = $variants;

        if ($result5 && $result5->num_rows > 0) {
            $row = mysqli_fetch_assoc($result5);
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
