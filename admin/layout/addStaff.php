<?php
require_once "./backend/staff.php";
require_once "./backend/acc.php";
$staff = new Staff();
$message = "";
$status = "error";

$staff_name = "";
$staff_phone = "";
$staff_username = "";
$staff_email = "";
$staff_passwd = "";

$acc = new Account();
$staff = new Staff();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-submit'])) {
    $staff_name = isset($_POST['staff_name']) ? trim($_POST['staff_name']) : '';
    $staff_phone = isset($_POST['staff_phone']) ? trim($_POST['staff_phone']) : '';
    $staff_role = isset($_POST['staff_role']) ? intval($_POST['staff_role']) : 0;
    $staff_username = isset($_POST['staff_username']) ? trim($_POST['staff_username']) : '';
    $staff_passwd = isset($_POST['staff_password']) ? trim($_POST['staff_password']) : '';
    $staff_email = isset($_POST['staff_email']) ? trim($_POST['staff_email']) : '';

   

    if ($staff->checkDulicatePhone($staff_phone)) {
        $message = "Số điện thoại đã có người sử dụng.";
    
    } elseif (!filter_var($staff_email, FILTER_VALIDATE_EMAIL)) {
        $message = "Email không hợp lệ. Vui lòng nhập đúng định dạng.";
    } elseif ($staff->checkDulicateEmail($staff_email)) {
        $message = "Email đã có người sử dụng.";
    } elseif ($staff->checkDulicateUsername($staff_username)) {
        $message = "Tên đăng nhập đã tồn tại";
    } else {
        $message = "Thêm nhân viên thành công!";
        $status = "success";
        $acc -> addAccount($staff_username, $staff_passwd);
        $acc_id = $acc->getAccId($staff_username, $staff_passwd);
        $staff->addStaff($staff_name, $staff_phone, $staff_email, $staff_role, $acc_id);
    }
}
?>
<div class="container-addStaff">
    <h2 class="page-title">Thêm nhân viên</h2>
    <form id="add-staff-form" method="POST" action="" onsubmit="return validateAddStaffForm()">
        <div class="form-group">
            <label for="staff-name">Tên nhân viên</label>
            <input type="text" id="staff-name" name="staff_name" placeholder="Nhập tên nhân viên" value="<?php echo ($message !== "Thêm nhân viên thành công!") ? $staff_name : ""?>">
        </div>
        <div class="form-group">
            <label for="staff-phone">Số điện thoại</label>
            <input type="text" id="staff-phone" name="staff_phone" placeholder="Nhập số điện thoại" value="<?php echo ($message !== "Thêm nhân viên thành công!") ? $staff_phone : ""?>">
        </div>
        <div class="form-group">
            <label for="staff-phone">Email</label>
            <input type="text" id="staff-email" name="staff_email" placeholder="Email" value="<?php echo ($message !== "Thêm nhân viên thành công!") ? $staff_email : ""?>">
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

    function validateAddStaffForm() {
        const name = document.getElementById('staff-name').value.trim();
        const phone = document.getElementById('staff-phone').value.trim();
        const email = document.getElementById('staff-email').value.trim();
        const password = document.getElementById('staff-password').value.trim();
        const username = document.getElementById('staff-username').value.trim();

        const phoneRegex = /^(84|0)(3|5|7|8|9)[0-9]{8}$/;
        const nameRegex = /^[A-ZÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ][a-zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ]*(?: [A-ZÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ][a-zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ]*)*$/;

        if(!name || !phone || !email || !password || !username) {
            showNotification("Vui lòng nhập đầy đủ thông tin.", "error");
            return false;
        }
        if (!name) {
            showNotification("Vui lòng nhập tên nhân viên.", "error");
            return false;
        }
        if (!nameRegex.test(name)) {
            showNotification("Tên nhân viên không hợp lệ.", "error");
            return false;
        }
        if (!phone) {
            showNotification("Vui lòng nhập số điện thoại.", "error");
            return false;
        }
        if (!phoneRegex.test(phone)) {
            showNotification("Số điện thoại không hợp lệ.", "error");
            return false;
        }
        if (!email) {
            showNotification("Vui lòng nhập email.", "error");
            return false;
        }
        if (!email.includes('@')) {
            showNotification("Email không hợp lệ.", "error");
            return false;
        }
        if(!username) {
            showNotification("Vui lòng nhập tên tài khoản.", "error");
            return false;
        }
        if(!password) {
            showNotification("Vui lòng nhập mật khẩu.", "error");
            return false;
        }

        return true; 
    }
    
    document.addEventListener('DOMContentLoaded', function () {
        let message = "<?php echo $message; ?>";
        let status = "<?php echo $status; ?>";
        if (message === 'Thêm nhân viên thành công!') {
            setTimeout(function () {
                window.location.href = "index.php?page=staff";
            }, 3000);
        }
        if (message) {
            showNotification(message, status);
        }
    });

</script>



