<?php
    require_once "./backend/staff.php";
    require_once "./backend/acc.php";

    $staff = new Staff();
    $acc = new Account();
    $message = "";
    $status = "error";
    if(isset($_GET['id']) && $_GET['id']){
        $staff_id = $_GET['id'];
        $staff_status = $_GET['status'];
        $acc_id = $staff->getAccIdByStaffId($staff_id);
        $staff_role = $staff->getStaffById($staff_id)['role'];
        if($_SESSION['role'] == $staff_role && $staff_id == $_SESSION['id']){
            $message = "Bạn không thể khóa chính mình!";
        }
        else if($_SESSION['role'] <= $staff_role){
            $message = "Bạn không thể khóa nhân viên có quyền cao hơn hoặc bằng bạn!";
        }
        else{
           if($staff_status == 1){
                $acc->lockAcc($acc_id);
                $message = "Khóa nhân viên thành công!";
                $status = "success";
            }else{
                $acc->unlockAcc($acc_id);
                $message = "Mở khóa nhân viên thành công!";
                $status = "success";
            }
        }
    }
    ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let message = "<?php echo $message; ?>";
        let status = "<?php echo $status; ?>";
        if (message) {
            setTimeout(function () {
                window.location.href = "index.php?page=staff";
            }, 3000);
        }
        if (message) {
            showNotification(message, status);
        }
    });

</script>