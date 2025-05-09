<?php 
    include("./connect.php");

    $sql = "SELECT id, name, price, img_src FROM products
            WHERE status = 1 AND isdeleted = 1 AND stock > 0
            ORDER BY price DESC
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