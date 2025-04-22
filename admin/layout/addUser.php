<div class="user-container add-user">
    <h2 class="user-page-title">
        <span class="title-icon"><i class="fas fa-user-plus"></i></span> Thêm khách hàng
    </h2>
    <form id="add-user-form" method="POST" action="./backend/xulyUser.php" onsubmit="return validateAddUser()">
        <div class="user-form-grid">
            <!-- Cột trái -->
            <div class="user-form-column">
                <div class="user-form-group">
                    <label for="fullname-add">Họ tên</label>
                    <input type="text" id="fullname-add" name="fullname" placeholder="Nhập họ tên" value="">
                </div>
                <div class="user-form-group">
                    <label for="email-add">Email</label>
                    <input type="email" id="email-add" name="email" placeholder="Nhập email" value="">
                </div>
                <div class="user-form-group">
                    <label for="phone-add">Liên hệ</label>
                    <input type="text" id="phone-add" name="phone" placeholder="Nhập số điện thoại" value="">
                </div>
                <div class="user-form-group">
                    <label for="username-add">Tên đăng nhập</label>
                    <input type="text" id="username-add" name="username" placeholder="Nhập tên đăng nhập" value="">
                </div>
                <div class="user-form-group">
                    <label for="password-add">Mật khẩu</label>
                    <input type="password" id="password-add" name="password" placeholder="Nhập mật khẩu" value="">
                </div>
            </div>
            <!-- Cột phải -->
            <div class="user-form-column">
                <div class="user-form-group">
                    <label for="address-add">Địa chỉ</label>
                    <input type="text" id="address_line-add" name="address_line" placeholder="Nhập địa chỉ" value="">
                </div>
                <div class="user-form-group">
                    <label for="ward-add">Phường/Xã</label>
                    <input type="text" id="ward-add" name="ward" placeholder="Nhập phường/xã" value="">
                </div>
                <div class="user-form-group">
                    <label for="district-add">Quận/Huyện</label>
                    <input type="text" id="district-add" name="district" placeholder="Nhập quận/huyện" value="" >
                </div>
                <div class="user-form-group">
                    <label for="city-add">Thành phố</label>
                    <input type="text" id="city-add" name="city" placeholder="Nhập thành phố" value="">
                </div>
                <!-- <span class="required">*</span> -->
                <div class="user-form-group">
                    <label for="status-add">Tình trạng</label>
                    <select id="status-add" name="status">
                        <option value="1">Hoạt động</option>
                        <option value="0">Khóa</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="user-btn-group">
            <a href="index.php?page=user" class="user-btn-cancel">Hủy</a>
            <button type="submit" name="btnAdd" value="them">Thêm khách hàng</button>
        </div>
    </form>
</div>

<script>
    function validateAddUser(event){
        let fullname = document.getElementById('fullname-add').value.trim();
        let email = document.getElementById('email-add').value.trim();
        let phone = document.getElementById('phone-add').value.trim();
        let username = document.getElementById('username-add').value.trim();
        let password = document.getElementById('password-add').value.trim();
        let address_line = document.getElementById('address_line-add').value.trim();
        let ward = document.getElementById('ward-add').value.trim();
        let district = document.getElementById('district-add').value.trim();
        let city = document.getElementById('city-add').value.trim();
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
        //pass
        if (!password) {
            alert('Vui lòng nhập mật khẩu.');
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