<?php 
    require_once "./backend/permission.php";
    require_once "./backend/acc.php";
    require_once "./backend/staff.php";
    require_once "./backend/function.php";

    $acc = new Account();
    $staff = new Staff();
    $permission = new Permission();
    $function = new Functions();
   
    $staff_id = isset($_GET['id']) ? $_GET['id'] : '';
    $acc_id = $staff->getAccIdByStaffId($staff_id);
    
    $permission_list = $permission->getPermissionList($acc_id);
    $function_list = $function->getFunctionList();
    $function_groups = $function->getFunctionGroup();

    $func_id = [];
    foreach($permission_list as $item){
        $func_id[] = $item['func_id'];
    }


?>


<div class="section active permission">
    <h2 class="page-title">Quản lý quyền</h2>
        <form action="./backend/save_permission.php" method="POST" class="table">
            <input type="hidden" name="acc_id" value="<?php echo $acc_id; ?>">
            <table width="100%">
                <thead>
                    <tr>
                        <td>Nhóm chức năng</td>
                        <td colspan="4">Chức năng</td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach($function_groups as $function_group): ?>  
                            <tr>
                                <td><?php echo $function_group['name'] ?></td>
                                <?php foreach($function_list as $function){
                                    if($function['group_id'] == $function_group['id']){
                                        echo '<td class="function">
                                                <div class="checkbox-container">
                                                <input type="checkbox" name="func_id[]" id="'.$function['func_name'] .'" value="'.$function['id'].'" '.(in_array($function['id'], $func_id) ? 'checked' : '').'>
                                                <label for="'.$function['func_name'] .'">'.$function['func_name'].'</label>
                                                </div>
                                            </td>';
                                    }
                                } ?>
                            </tr>
                        
                    <?php endforeach; ?> 


                </tbody>
            </table>
            <button type="submit" class="btn-save">Lưu quyền</button>
        </form>
</div>
<script>
</script>