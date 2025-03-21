<?php   
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        include("./connect.php");
        $sql = "SELECT id, name, price, img_src FROM products";
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