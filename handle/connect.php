<?php
    $servername = "localhost";
    $user = "root";
    $passwd = "";
    $database = "web2";

    $con = new mysqli($servername, $user, $passwd, $database);

    if ($con->connect_error) {
        die("Kết nối thất bại: " . $con->connect_error);
    } 
?>