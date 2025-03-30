<?php
  require_once "./getStatic.php";
  
    $static = new Stactic();

  $mode = isset($_GET['mode']) ? $_GET['mode'] : "product";

  $response = [];
  switch($mode){
    case "home":
        $response['home'] = [
            "customers" => $static->getCustomer(),
            "products" => $static->getProduct(),
            "sale" => $static->getSale()
        ];
        break;
    case "product":
        $response['product'] = $static->getProductList();
        break;
    case "customer":
        $response['customer'] = $static->getCustomerList();
        break;
    case "order":
        $response['order'] = $static->getOrderList();
        break;

  }
  header('Content-Type: application/json');
  echo json_encode($response);