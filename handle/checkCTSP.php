<?php
include('./connect.php');
header('Content-Type: application/json');

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $stmt = $con->prepare("
        SELECT 1 FORM product_detail 
        WHERE id = ? AND stock > 0
        LIMIT 1
    ");

    $stmt ->bind_param("i" , $id);
    $stmt->execute();
    $result = $stmt->get_result();
    echo json_encode([
        "inStock" => $result->num_rows > 0
    ]);
} else {
    echo json_encode([
        "error" => "Không tìm thấy product"
    ]);
}
?>