<?php 
    include("./connect.php");

    $sql = "SELECT id, name, price, img_src FROM products
            ORDER BY price DESC
            LIMIT 8";

    $result = $con->query($sql);

    $data = array();

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
    }

    header('Content-Type: application/json');
    echo json_encode($data);

    $con->close();
?>