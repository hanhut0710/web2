<?php
    require_once "./backend/staff.php";
    require_once "./backend/acc.php";

    $staff = new Staff();
    $acc = new Account();

    if(isset($_GET['id']) && $_GET['id']){
        $staff_id = $_GET['id'];
        $acc_id = $staff->getAccIdByStaffId($staff_id);

        $staff->deleteStaff($staff_id);
        $acc->deleteAcc($acc_id);
        echo '
        <script>
            alert("Xóa nhân viên thành công!");
            window.location.href = "index.php?page=staff";
        </script>
    ';
    }