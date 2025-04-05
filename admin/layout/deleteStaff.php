<?php
    require_once "./backend/staff.php";
    require_once "./backend/acc.php";

    $staff = new Staff();
    $acc = new Account();

    if(isset($_GET['id']) && $_GET['id']){
        $staff_id = $_GET['id'];
        $acc_id = $staff->getAccIdByStaffId($staff_id);
        $staff_role = $staff->getStaffById($staff_id)['role'];
        if($_SESSION['role'] == $staff_role && $staff_id == $_SESSION['id']){
            echo '
            <script>
                alert("Bạn không thể xóa chính mình!");
                window.location.href = "index.php?page=staff";
            </script>
        ';
            exit;
        }
        if($_SESSION['role'] <= $staff_role){
            echo '
            <script>
                alert("Bạn chỉ có thể xóa các chức vụ thấp hơn!");
                window.location.href = "index.php?page=staff";
            </script>';
            exit;
        }

        $staff->deleteStaff($staff_id);
        $acc->deleteAcc($acc_id);
        echo '
        <script>
            alert("Xóa nhân viên thành công!");
            window.location.href = "index.php?page=staff";
        </script>
    ';
    }