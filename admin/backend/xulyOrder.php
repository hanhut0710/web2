<?php 
    require_once "order.php";
    
    if(isset($_GET['id']) && isset($_GET['status'])){
        $orderID = $_GET['id'];
        $status = $_GET['status'];

        
    $order = new Order();
    $update = $order -> updateOrderStatus($orderID,$status);
    if($update){
        if (isset($_GET['from']) && $_GET['from'] === 'details') {
        header("Location: ../index.php?page=orderdetails&id=".$orderID."");
        return;
        }
        else{
            header("Location: ../index.php?page=order");
            return;
        }
    }else{
        header("Location: ./index.php?page=order");
        return;
    }
    }
?>