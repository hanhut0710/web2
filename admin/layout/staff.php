<?php 
    require_once "./backend/staff.php";
    require_once "./backend/pagination.php";
    $staff = new Staff();
    $page_num= isset($_GET['page_num']) ? max(1, intval($_GET['page_num'])) : 1;
    $role = isset($_GET['role']) ? $_GET['role'] : 3;
    $search_id = isset($_GET['search_id']) ? $_GET['search_id'] : '';

    $limit = 5;
    $totalStaff = $staff -> getTotalStaffByRole($role);
    if(!empty($search_id))
    {
        $totalStaff = $staff -> getTotalStaffById($search_id);
    }
    $paganition = new Pagination($totalStaff, $page_num, $limit);
    $offset = $paganition -> getOffset($page_num, $limit);
    
    if (!empty($search_id)) {
        $staffList = $staff->searchStaffById($search_id, $limit, $offset);
        $totalStaff = $staff->getTotalStaffById($search_id);
    } else {
        $staffList = $staff->getStaffList($role, $limit, $offset);
        $totalStaff = $staff->getTotalStaffByRole($role);
    }
?>  
<div class="section active">
    <div class="admin-control">
                        <div class="admin-control-left">
                            <select name="tim-kiem-nhan-vien" id="tim-kiem-nhan-vien" onchange="filterByRole()">
                                <option value="3" <?php echo ($role == 3) ? 'selected' : ''; ?>>Tất cả</option>
                                <option value="2" <?php echo ($role == 2) ? 'selected' : ''; ?>>Manager</option>
                                <option value="1" <?php echo ($role == 1) ? 'selected' : ''; ?>>Admin</option>
                                <option value="0" <?php echo ($role == 0) ? 'selected' : ''; ?>>Staff</option>
                            </select>
                        </div>
                        <div class="admin-control-center">
                            <form action="index.php" method="GET" class="form-search">
                                <input type="hidden" name="page" value="staff">
                                <span class="search-btn"><i class="fa-light fa-magnifying-glass"></i></span>
                                <input id="form-search-order" type="text" name="search_id" class="form-search-input" placeholder="Tìm kiếm mã nhân viên..." value="<?php echo isset($_GET['search_id']) ? $_GET['search_id'] : ''; ?>">
                            </form>
                        </div>
                        <a href="index.php?page=createStaff" id="btn-add-staff" class="btn-control-large" onclick="openCreateStaff()"><i class="fa-light fa-plus"></i>Thêm nhân viên</a>
                    </div>
                    <div class="table">
                        <table width="100%">
                            <thead>
                                <tr>
                                    <td>Mã nhân viên</td>
                                    <td>Tên nhân viên</td>
                                    <td>Số điện thoại</td>
                                    <td>email</td>
                                    <td>Chức vụ</td>
                                    <td>Thao tác</td>
                                </tr>
                            </thead>
                            <tbody id="showStaff">
                                <?php 
                                    foreach($staffList as $staff){
                                        $staff['role'] = ($staff['role'] === '2') ? "Manager" : (($staff['role'] === '1') ? "Admin" : "Staff");
                                        echo '
                                            <tr>
                                                <td>'.$staff['id'].'</td>
                                                <td>'.$staff['full_name'].'</td>
                                                <td>'.$staff['phone'].'</td>
                                                <td>'.$staff['email'].'</td>
                                                <td>'.$staff['role'].'</td>
                                                <td class="control control-table">
                                                    <a href="index.php?page=updateStaff&id='.$staff['id'].'" class="btn-edit" ><i class="fa-light fa-pen-to-square"></i></a>
                                                    <a href="index.php?page=deleteStaff&id='.$staff['id'].'" class="btn-delete" onclick="return confirm(\'Bạn có chắc chắn muốn xóa nhân viên này không?\')"><i class="fa-regular fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        ';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
</div>
<?php 
    if($totalStaff > 0)
    {
        if(!empty($search_id))
        {
            echo $paganition -> renderStaffPageById($search_id);
        }
        else
        {
            echo $paganition -> renderStaffPageByRole($role);
        }
    }?>
<script>
    function filterByRole() {
        const role = document.getElementById('tim-kiem-nhan-vien').value;
        window.location.href = `index.php?page=staff&role=${role}`;
    }

</script>

