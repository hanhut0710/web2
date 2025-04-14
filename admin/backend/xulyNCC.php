<?php
require_once "supplier.php";
$supplier = new Supplier();
$response = [];

/***** XỬ LÝ THÊM*****/
if(isset($_POST['btnAddSupplier']))
{
    $sup_name = $_POST['sup_name']; 
    $email = $_POST['email']; 
    $phone = $_POST['phone']; 

    $newSupplier = $supplier -> insert($sup_name, $email, $phone);
    if($newSupplier)
    {
        echo '<script>alert("Thêm thành công !")</script>';
        header('Location: index.php?page=supplier');
    }
    else
    echo '<script>alert("Thêm thất bại !")</script>';   
}
?>