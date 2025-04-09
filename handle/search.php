<?php
include 'connect.php';
header('Content-Type: application/json');

$keyword = $_GET['keyword'] ?? '';
$keyword = mysqli_real_escape_string($con, $keyword); // chống injection nếu không dùng prepare
$sql = "SELECT * FROM products WHERE name LIKE '%$keyword%'";
$result = mysqli_query($con, $sql);
$data = array();
if ($result->num_rows > 0) {
    while($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
    }
    echo json_encode($data);
}
?>
