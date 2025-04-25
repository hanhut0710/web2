<?php 
    require_once "permission.php";
    $permission = new Permission();
    
    $func_id = isset($_POST['func_id']) ? $_POST['func_id'] : [];
    $acc_id = isset($_POST['acc_id']) ? $_POST['acc_id'] : '';

    $permission->clearPermission($acc_id);
    if($func_id){
        foreach($func_id as $item){
            $permission->addPermission($acc_id, $item);
        }
        
    }

    header('Location: ../index.php?page=staff');
?>