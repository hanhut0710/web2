<?php
require_once "supplier.php";
$supplier = new Supplier();

/***** XỬ LÝ THÊM*****/
if(isset($_POST['btnAddSupplier']))
{
    $sup_name = $_POST['sup_name']; 
    $email = $_POST['email']; 
    $phone = $_POST['phone']; 

    $checked = $supplier -> check($sup_name, $email, $phone);
    if($checked['error'])
    {
        $message = "Thông tin đã tồn tại: ";
        if($checked['sup_name'])
            $message .= "Tên nhà cung cấp, ";
        if($checked['email'])
            $message .= "Email, ";
        if($checked['phone'])
            $message .= "SĐT, ";
        $message = rtrim($message, ", ");
        echo '<script>
            alert("' . $message . '"); 
            </script>';
        header('Location: index.php?page=supplier');
        exit();
    }

    $newSupplier = $supplier -> insert($sup_name, $email, $phone);
    if($newSupplier)
    {
        echo '<script> 
            alert("Thêm thành công !")
            </script>';
        header('Location: index.php?page=supplier');
        exit();
    }
    else
    {
        echo '<script> 
            alert("Thêm thất bại !");
            </script>';
        header('Location: index.php?page=supplier');
        exit();
    }
         
}

/***** XỬ LÝ SỬA*****/
if(isset($_POST['btnEditSupplier']))
{   
    $id = $_POST['id'];
    $sup_name = $_POST['sup_name']; 
    $email = $_POST['email']; 
    $phone = $_POST['phone']; 

    $checked = $supplier -> check($sup_name, $email, $phone);
    if($checked['error'])
    {
        $message = "Thông tin đã tồn tại: ";
        if($checked['sup_name'])
            $message .= "Tên nhà cung cấp, ";
        if($checked['email'])
            $message .= "Email, ";
        if($checked['phone'])
            $message .= "SĐT, ";
        $message = rtrim($message, ", ");
        echo '<script>
            alert("' . $message . '"); 
            window.location.href = "index.php?page=addSupplier";
            </script>';
        exit();
    }

    $updated = $supplier -> update($id, $sup_name, $email, $phone);
    if($updated)
    {
        echo '<script> 
            alert("Thêm thành công !");
            window.location.href = "index.php?page=supplier";
            </script>';
    }
    else
    {
        echo '<script> 
            alert("Thêm thất bại !");
            window.location.href = "index.php?page=supplier";
            </script>';
    }
         
}
?>