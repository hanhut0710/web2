<?php 
    require_once "./backend/user.php";
     $user = new User();

    if(isset($_GET['id'])){
        $accID = $_GET['id'];
        $infor = $user -> getInforUserByAccId($accID);
    }
?>


<div class="user-container edit-user">
    <h2 class="user-page-title">
        <span class="title-icon"><i class="fas fa-user-edit"></i></span> Sửa thông tin khách hàng
    </h2>
    <form id="edit-user-form" method="POST" action="./backend/xulyUser.php" onsubmit="return validateEditUser()">
    <input type="hidden" name="acc_id" value="<?php echo $accID; ?>">
        <div class="user-form-grid">
            <!-- Cột trái -->
            <div class="user-form-column">
                <div class="user-form-group">
                    <label for="fullname-edit">Họ tên</label>
                    <input type="text" id="fullname-edit" name="fullname" placeholder="Nhập họ tên" value="<?php echo  $infor['full_name'] ?>">
                </div>
                <div class="user-form-group">
                    <label for="email-edit">Email</label>
                    <input type="email" id="email-edit" name="email" placeholder="Nhập email" value="<?php echo  $infor['email'] ?>">
                </div>
                <div class="user-form-group">
                    <label for="phone-edit">Liên hệ</label>
                    <input type="text" id="phone-edit" name="phone" placeholder="Nhập số điện thoại" value="<?php echo  $infor['phone'] ?>">
                </div>
                <div class="user-form-group">
                    <label for="username-edit">Tên đăng nhập </label>
                    <input type="text" id="username-edit" name="username" placeholder="Nhập tên đăng nhập" value="<?php echo  $infor['username'] ?>" >
                </div>
                <div class="user-form-group">
                    <label for="password-edit">Mật khẩu</label>
                    <input type="password" id="password-edit" name="password" placeholder="Nhập mật khẩu nếu muốn thay đổi" value="">
                </div>
            </div>
            <!-- Cột phải -->
            <div class="user-form-column">
                 <div class="user-form-group">
                    <label for="address-edit">Địa chỉ</label>
                    <input type="text" id="address_line-edit" name="address_line" placeholder="Nhập địa chỉ" value="<?php echo  $infor['address_line'] ?>">
                </div>
                <div class="user-form-group">
                    <label for="ward-edit">Phường/Xã</label>
                    <input type="text" id="ward-edit" name="ward" placeholder="Nhập phường/xã" value="<?php echo  $infor['ward'] ?>">
                </div>
                <div class="user-form-group">
                    <label for="district-edit">Quận/Huyện</label>
                    <input type="text" id="district-edit" name="district" placeholder="Nhập quận/huyện" value="<?php echo  $infor['district'] ?>">
                </div>
                <div class="user-form-group">
                    <label for="city-edit">Thành phố</label>
                    <input type="text" id="city-edit" name="city" placeholder="Nhập thành phố" value="<?php echo  $infor['city'] ?>">
                </div>
               
                <div class="user-form-group">
                    <label for="status-edit">Tình trạng</label>
                    <select id="status-edit" name="status">
                        <option value="1" <?php echo  $infor['status'] == 1 ? 'selected' : '' ?>>Hoạt động</option>
                        <option value="0" <?php echo  $infor['status'] == 0 ? 'selected' : '' ?>>Khóa</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="user-btn-group">
            <a href="index.php?page=user" class="user-btn-cancel">Hủy</a>
            <button type="submit" name="btnUpdate" value="capnhat">Cập nhật</button>
        </div>
    </form>
</div>

<script>
    function validateEditUser(event){
        let fullname = document.getElementById('fullname-edit').value.trim();
        let email = document.getElementById('email-edit').value.trim();
        let phone = document.getElementById('phone-edit').value.trim();
        let username = document.getElementById('username-edit').value.trim();
        let password = document.getElementById('password-edit').value.trim();
        let address_line = document.getElementById('address_line-edit').value.trim();
        let ward = document.getElementById('ward-edit').value.trim();
        let district = document.getElementById('district-edit').value.trim();
        let city = document.getElementById('city-edit').value.trim();
        //full name
        const namePattern = /^[a-zA-ZÀ-ỹ\s0-9]+$/;
        if(!fullname){
            alert('Vui lòng nhập họ tên.');
            return false;
        }
        if(!namePattern.test(fullname)){
            alert('Họ tên chỉ chứa chữ cái, số và khoảng trắng.');
            return false;
        }
        //email
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email && !emailPattern.test(email)) {
            alert('Vui lòng nhập email hợp lệ.');
            return false;
        }
        //sdt
        const phonePattern = /^(0)[0-9]{9}$/;
        if(phone && !phonePattern.test(phone)){
            alert('Vui lòng nhập số điện thoại hợp lệ (10 chữ số).');
            return false;
        }
        //username
        const usernamePattern = /^[a-zA-Z0-9_@#.-]+$/;
        if (!username) {
            alert('Vui lòng nhập tên đăng nhập.');
            return false;
        }
        if (!usernamePattern.test(username)) {    
            alert('Tên đăng nhập chỉ chứa chữ cái, số và các ký tự cho phép như :_@#.-');
            return false;
        }
        //address
        if (!address_line) {
            alert('Vui lòng nhập địa chỉ.');
            return false;
        }
        //ward
        if (!ward) {
            alert('Vui lòng nhập Phường/Xã.');
            return false;
        }
        //district
        if (!district) {
            alert('Vui lòng nhập Quận/Huyện.');
            return false;
        }
        //city
        if (!city) {
            alert('Vui lòng nhập Thành phố.');
            return false;
        }
    return true;
    }

</script>