<?php 
    require_once "./backend/user.php";
    require_once "./backend/pagination.php";
    $page_num = isset($_GET['page_num']) ? max(1,intval($_GET['page_num'])) : 1;
    $limit = 5;

    $user = new User();
    $totalUser= $user -> getTotalUser();
    $pagination = new Pagination($totalUser,$page_num,$limit);
    $offset = $pagination -> getOffset();

    $userList = $user -> getAllUser($limit,$offset);
?>
        <!-- Account  -->
            <div class="section active">
                    <div class="admin-user-control-right">  
                    <?php
                        if($authManager->hasPermission($_SESSION['id'], 5)) {
                            echo '<a href="index.php?page=addUser"><button class="btn-adminUser-control-large" id="btn-add-product" ><i class="fa-light fa-plus"></i> Thêm khách hàng</button></a>';
                        }     
                    ?>
                        </div>
                <div class="table">
                    <table width="100%">
                        <thead>
                            <tr>
                                <td>STT</td>
                                <td>Tài khoản</td>
                                <td>Họ và tên</td>
                                <td>Liên hệ</td>
                                <td>Địa chỉ</td>
                                <td>Email</td>
                                <td>Tình trạng</td>
                                <td>Thao tác</td>
                            </tr>
                        </thead>
                        <tbody id="show-user">
                            <?php 
                                $i=($page_num - 1)*$limit+1;
                                foreach($userList as $user){
                                    if($user['address_line']!=null||$user['ward']!=null||$user['district']!=null||$user['city']!=null){
                                    $fullAddress = implode(', ', [
                                        $user['address_line'],
                                        $user['ward'],
                                        $user['district'],
                                        $user['city']
                                    ]);
                                }else 
                                $fullAddress =null;                   
                                    echo '
                                        <tr>
                                            <td>'.$i.'</td>
                                            <td>'.$user['username'].'</td>
                                            <td>'.$user['full_name'].'</td>
                                            <td>'.$user['phone'].'</td>
                                            <td>'.$fullAddress.'</td>
                                            <td>'.$user['email'].'</td>
                                            <td><span class="' . ($user['status'] == 1 ? 'status-active' : 'status-locked') . '">' . ($user['status'] == 1 ? 'Hoạt động' : 'Khóa') . '</span></td>
                                            <td class="control control-table">';
                                            if($authManager->hasPermission($_SESSION['id'], 6))
                                                echo '<a href="index.php?page=editUser&id='.$user['accID'].'" class="btn-edit" id="edit-account"><i class="fa-light fa-pen-to-square"></i></a>';
                                            if($authManager->hasPermission($_SESSION['id'], 7))
                                                echo '<a href="./backend/xulyUser.php?act=toggleStatus&id='.$user['accID'].'" class="btn-delete" id="edit-account" onclick="return confirmToggleStatus('.$user['status'].');">
                                                        <i class="'.($user['status']==1 ? 'fa-solid fa-lock-open' : 'fa-solid fa-lock').'"></i>
                                                        </a>';
                                            echo '
                                            </td>
                                        </tr>
                                    ';
                                    $i++;
                                }

                            
                            ?>           
                        </tbody>
                    </table>
                </div>
            </div> 
         
            <?php 
                echo $pagination -> renderUser();
            ?>

<script>
   function confirmToggleStatus(status) {
        return confirm("Bạn có chắc chắn muốn " + (status == 1 ? "khóa" : "mở khóa") + " khách hàng này không?");
    }
</script>