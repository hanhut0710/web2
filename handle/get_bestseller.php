<?php 
    include("./connect.php");

    $sql = "SELECT p.id, p.name, p.price, p.img_src, COUNT(od.product_id) AS num FROM products p
				JOIN order_details od ON p.id = od.product_id
            WHERE status = 1 AND isdeleted = 1 AND p.stock > 0
            GROUP BY p.id
            ORDER BY num DESC 
            LIMIT 8";

    $result = $con->query($sql);
    $data = [];

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }

    header('Content-Type: application/json');
    echo json_encode($data);
    $con->close();
?>