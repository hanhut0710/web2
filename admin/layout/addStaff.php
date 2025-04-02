<?php
require_once "./backend/staff.php";
require_once "./backend/acc.php";
$staff = new Staff();
$message = "";

$staff_name = "";
$staff_phone = "";
$staff_username = "";

$acc = new Account();
$staff = new Staff();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-submit'])) {
    $staff_name = isset($_POST['staff_name']) ? trim($_POST['staff_name']) : '';
    $staff_phone = isset($_POST['staff_phone']) ? trim($_POST['staff_phone']) : '';
    $staff_role = isset($_POST['staff_role']) ? intval($_POST['staff_role']) : 0;
    $staff_username = isset($_POST['staff_username']) ? trim($_POST['staff_username']) : '';
    $staff_passwd = isset($_POST['staff_password']) ? trim($_POST['staff_password']) : '';

    $phone_regex = "/^(84|0)(3|5|7|8|9)[0-9]{8}$/";
    $name_regex = "/^[A-ZÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ][a-zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ]*(?: [A-ZÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ][a-zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ]*)*$/";

    if (empty($staff_name) || empty($staff_phone) || empty($staff_passwd) || empty($staff_username)) {
        $message = "Vui lòng nhập đầy đủ thông tin.";   
    } elseif (!preg_match($name_regex, $staff_name)) {
        $message = "Tên nhân viên không hợp lệ. Vui lòng nhập đúng định dạng.";
    } elseif (!preg_match($phone_regex, $staff_phone)) {
        $message = "Số điện thoại không hợp lệ. Vui lòng nhập số điện thoại Việt Nam hợp lệ.";
    } elseif ($acc->checkUsername($staff_username)) {
        $message = "Tên đăng nhập đã tồn tại";
    } else {
        $message = "Thêm nhân viên thành công!";

        $acc -> addAccount($staff_username, $staff_passwd);
        $acc_id = $acc->getAccId($staff_username, $staff_passwd);
        $staff->addStaff($staff_name, $staff_phone, $staff_role, $acc_id);
    }
}
?>
<div class="container-addStaff">
    <h2 class="page-title">Thêm nhân viên</h2>
    <form id="add-staff-form" method="POST" action="">
        <div class="form-group">
            <label for="staff-name">Tên nhân viên</label>
            <input type="text" id="staff-name" name="staff_name" placeholder="Nhập tên nhân viên" value="<?php echo ($message !== "Thêm nhân viên thành công!") ? $staff_name : ""?>">
        </div>
        <div class="form-group">
            <label for="staff-phone">Số điện thoại</label>
            <input type="text" id="staff-phone" name="staff_phone" placeholder="Nhập số điện thoại"value="<?php echo ($message !== "Thêm nhân viên thành công!") ? $staff_phone : ""?>">
        </div>
        <div class="form-group">
            <label for="staff-username">Tên tài khoản</label>
            <input type="text" id="staff-username" name="staff_username" placeholder="Nhập tên tài khoản" value="<?php echo ($message !== "Thêm nhân viên thành công!") ? $staff_username : ""?>">
        </div>
        <div class="form-group">
            <label for="staff-password">Mật khẩu</label>
            <div class="passwd_input">
                <input type="password" id="staff-password" name="staff_password" placeholder="Nhập mật khẩu" >
                <i class="fa-solid fa-eye-slash eye" id="toggle-password"></i>
            </div>
        </div>
        <div class="form-group">
            <label for="staff-role">Chức vụ</label>
            <select id="staff-role" name="staff_role">
                <option value="2" <?php echo (isset($staff_role) && $staff_role == 2) ? 'selected' : ''; ?>>Manager</option>
                <option value="1" <?php echo (isset($staff_role) && $staff_role == 1) ? 'selected' : ''; ?>>Admin</option>
                <option value="0" <?php echo (isset($staff_role) && $staff_role == 0) ? 'selected' : ''; ?>>Staff</option>
            </select>
        </div>
        <div class="btn-group">
            <button type="submit" name="btn-submit" class="btn-submit">Thêm nhân viên</button>
        </div>
       
    </form>
</div>
<script>
    const togglePassword = document.getElementById('toggle-password');
    const passwordInput = document.getElementById('staff-password');

    togglePassword.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });
</script>
<?php 
    if(!empty($message)){
        echo '
            <script> 
                alert("'.$message.'"); 
            </script>
        ';
    }
    if($message === 'Thêm nhân viên thành công!'){
        echo '
            <script> 
                window.location.href = "index.php?page=staff";
            </script>
        ';
    }
?>


