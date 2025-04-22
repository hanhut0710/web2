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
                <div class="admin-control">
                    <div class="admin-control-left">
                        <select name="tinh-trang-user" id="tinh-trang-user" onchange="">
                            <option value="2">Tất cả</option>
                            <option value="1">Hoạt động</option>
                            <option value="0">Bị khóa</option>
                        </select>
                    </div>
                    <div class="admin-control-center">
                        <form action="" class="form-search">
                            <span class="search-btn"><i class="fa-light fa-magnifying-glass" onclick="reloadPage()"></i></span>
                            <input id="form-search-user" type="text" class="form-search-input" placeholder="Tìm kiếm khách hàng..." oninput="">
                        </form>
                    </div>
                    <div class="admin-control-right">
                        <form action="" class="fillter-date">
                            <div>
                                <label for="time-start">Từ</label>
                                <input type="date" class="form-control-date" id="time-start-user" onchange="">
                            </div>
                            <div>
                                <label for="time-end">Đến</label>
                                <input type="date" class="form-control-date" id="time-end-user" onchange="">
                            </div>
                        </form>      
                        <button class="btn-reset-order"><i class="fa-light fa-arrow-rotate-right"></i></button>     
                        <a href="index.php?page=addUser"><button class="btn-control-large" id="btn-add-product" ><i class="fa-light fa-plus"></i> Thêm khách hàng</button></a>     
                    </div>
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
                                <td></td>
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
                                            <td class="control control-table">
                                            <a href="index.php?page=editUser&id='.$user['accID'].'" class="btn-edit" id="edit-account"><i class="fa-light fa-pen-to-square"></i></a>
                                            <a href="./backend/xulyUser.php?act=xoa&id='.$user['accID'].'" class="btn-delete" id="delete-account" onclick="return confirmDelete();"><i class="fa-regular fa-trash"></i></a>
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
    function confirmDelete() {
        return confirm("Bạn có chắc chắn xoá khách hàng này không?");
    }
</script>