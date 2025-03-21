<?php
    $servername = "localhost";
    $user = "root";
    $passwd = "";
    $database = "web2";

    $con = new mysqli($servername, $user, $passwd, $database);

    if($con -> connect_error){
        echo "lỗi";
    }
?>