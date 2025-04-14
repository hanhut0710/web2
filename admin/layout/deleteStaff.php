<?php
    require_once "./backend/staff.php";
    require_once "./backend/acc.php";

    $staff = new Staff();
    $acc = new Account();
    $message = "";
    $status = "error";
    if(isset($_GET['id']) && $_GET['id']){
        $staff_id = $_GET['id'];
        $acc_id = $staff->getAccIdByStaffId($staff_id);
        $staff_role = $staff->getStaffById($staff_id)['role'];
        if($_SESSION['role'] == $staff_role && $staff_id == $_SESSION['id']){
            $message = "Bạn không thể xóa chính mình!";
            exit;
        }
        if($_SESSION['role'] <= $staff_role){
            $message = "Bạn không thể xóa nhân viên có quyền cao hơn hoặc bằng bạn!";
            exit;
        }

        $staff->deleteStaff($staff_id);
        $acc->deleteAcc($acc_id);
        $message = "Xóa nhân viên thành công!";
        $status = "success";
    }
    ?>
<script>
    let message = "<?php echo $message; ?>";
    let status = "<?php echo $status; ?>";
        if (message === 'Xóa nhân viên thành công!') {
            setTimeout(function () {
                window.location.href = "index.php?page=staff";
            }, 3000);
        }
        if (message) {
            showNotification(message, status);
        }
</script>