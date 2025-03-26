<?php   
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        include("./connect.php");
        $pageSize = isset($_GET['pageSize']) ? $_GET['pageSize'] : 8;//so luong san pham tren trang
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        $offset = ($page - 1) * $pageSize; // so luong san pham bo qua
         
        $sql = "SELECT id, name, price, img_src FROM products LIMIT $pageSize OFFSET $offset";// tra ve san pham load tren 1 trang
        $result = $con->query($sql);
        $record = [];//tao object tra ve client
        $data = array();
        if($result->num_rows > 0){ 
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
        }
        $record['data'] = $data;
        $sql2 = "SELECT id, name, price, img_src FROM products";
        $result2 = $con->query($sql2);
        $totalProduct = $result2->num_rows;
        $record['totalProduct'] = $totalProduct;
        header('Content-Type: application/json');
        echo json_encode($record);

        $con->close();
    ?>