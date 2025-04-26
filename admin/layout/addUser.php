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
                    <label for="city-add">Thành phố</label>
                    <select id="city-add" name="city">
                        <option value="Hồ Chí Minh" selected>Hồ Chí Minh</option>
                    </select>
                </div>
                <div class="user-form-group">
                <label for="district-add">Quận/Huyện</label>
                    <select id="district-add" name="district" onchange="updateWardOptions()">
                        <option value="">Chọn Quận/Huyện</option>
                        <?php
                            $districts = [
                                "Huyện Bình Chánh",
                                "Huyện Cần Giờ",
                                "Huyện Hóc Môn",
                                "Huyện Nhà Bè",
                                "Huyện Củ Chi",
                                "Quận 1",
                                "Quận 2",
                                "Quận 3",
                                "Quận 4",
                                "Quận 5",
                                "Quận 6",
                                "Quận 7",
                                "Quận 8",
                                "Quận 9",
                                "Quận 10",
                                "Quận 11",
                                "Quận 12",
                                "Quận Bình Tân",
                                "Quận Bình Thạnh",
                                "Quận Tân Phú",
                                "Quận Gò Vấp",
                                "Quận Phú Nhuận",
                                "Quận Tân Bình",
                            ];
                            foreach ($districts as $district) {
                                echo "<option value=\"$district\">$district</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="user-form-group">
                    <label for="ward-add">Phường/Xã</label>
                    <select id="ward-add" name="ward" disabled>
                        <option value="">Chọn Phường/Xã</option>
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
     const wardData = {
        "Quận 1": [
            "Phường Bến Nghé",
            "Phường Bến Thành",
            "Phường Cô Giang",
            "Phường Cầu Kho",
            "Phường Đa Kao",
            "Phường Nguyễn Cư Trinh",
            "Phường Nguyễn Thái Bình",
            "Phường Phạm Ngũ Lão",
            "Phường Tân Định",
            "Phường Thủ Thiêm"
        ],
        "Quận 2": [
            "Phường An Khánh",
            "Phường An Lợi Đông",
            "Phường An Phú",
            "Phường Bình An",
            "Phường Bình Khánh",
            "Phường Cát Lái",
            "Phường Thạnh Mỹ Lợi",
            "Phường Thủ Thiêm",
            "Phường Tân Phú",
            "Phường Xuân Thạnh"
        ],
        "Quận 3": [
            "Phường 1",
            "Phường 2",
            "Phường 3",
            "Phường 4",
            "Phường 5",
            "Phường 6",
            "Phường 7",
            "Phường 8",
            "Phường 9",
            "Phường Võ Thị Sáu"
        ],
        "Quận 4": [
            "Phường 1",
            "Phường 2",
            "Phường 3",
            "Phường 4",
            "Phường 5",
            "Phường 6",
            "Phường 7",
            "Phường 8",
            "Phường 9",
            "Phường 10",
            "Phường 11"
        ],
        "Quận 5": [
            "Phường 1",
            "Phường 2",
            "Phường 3",
            "Phường 4",
            "Phường 5",
            "Phường 6",
            "Phường 7",
            "Phường 8",
            "Phường 9",
            "Phường 10",
            "Phường 11"
        ],
        "Quận 6": [
            "Phường 1",
            "Phường 2",
            "Phường 3",
            "Phường 4",
            "Phường 5",
            "Phường 6",
            "Phường 7",
            "Phường 8",
            "Phường 9",
            "Phường 10"
        ],
        "Quận 7": [
            "Phường Tân Kiểng",
            "Phường Tân Hưng",
            "Phường Tân Phong",
            "Phường Tân Thuận Đông",
            "Phường Tân Thuận Tây",
            "Phường Phú Mỹ",
            "Phường Bình Thuận",
            "Phường Hưng Thạnh",
            "Phường Phú Thuận",
            "Phường Xuân Thủy"
        ],
        "Quận 8": [
            "Phường 1",
            "Phường 2",
            "Phường 3",
            "Phường 4",
            "Phường 5",
            "Phường 6",
            "Phường 7",
            "Phường 8",
            "Phường 9",
            "Phường 10",
            "Phường 11",
            "Phường 12",
            "Phường 13",
            "Phường 14",
            "Phường 15"
        ],
        "Quận 9": [
            "Phường Hiệp Phú",
            "Phường Long Bình",
            "Phường Long Thạnh Mỹ",
            "Phường Phú Hữu",
            "Phường Tân Phú",
            "Phường Trường Thạnh",
            "Phường Tam Bình",
            "Phường Linh Đông",
            "Phường Linh Xuân",
            "Phường An Phú",
            "Phường Bình An"
        ],
        "Quận 10": [
            "Phường 1",
            "Phường 2",
            "Phường 3",
            "Phường 4",
            "Phường 5",
            "Phường 6",
            "Phường 7",
            "Phường 8",
            "Phường 9",
            "Phường 10"
        ],
        "Quận 11": [
            "Phường 1",
            "Phường 2",
            "Phường 3",
            "Phường 4",
            "Phường 5",
            "Phường 6",
            "Phường 7",
            "Phường 8",
            "Phường 9",
            "Phường 10"
        ],
        "Quận 12": [
            "Phường An Phú Đông",
            "Phường Đông Hưng Thuận",
            "Phường Hiệp Thành",
            "Phường Tân Chánh Hiệp",
            "Phường Tân Hưng Thuận",
            "Phường Tân Thới Nhất",
            "Phường Tân Thới Hiệp",
            "Phường Thạnh Lộc",
            "Phường Thạnh Xuân",
            "Phường Trung Mỹ Tây"
        ],
        "Huyện Bình Chánh": [
            "Xã Bình Hưng",
            "Xã Bình Lợi",
            "Xã Bình Tân",
            "Xã Hưng Long",
            "Xã Lê Minh Xuân",
            "Xã Phạm Văn Hai",
            "Xã Tân Kiên",
            "Xã Tân Quý Tây",
            "Xã Vĩnh Lộc A",
            "Xã Vĩnh Lộc B",
            "Thị trấn Tân Túc"
        ],
        "Quận Bình Tân": [
            "Phường Bình Hưng Hòa",
            "Phường Bình Hưng Hòa A",
            "Phường Bình Hưng Hòa B",
            "Phường Bình Trị Đông",
            "Phường Bình Trị Đông A",
            "Phường Bình Trị Đông B",
            "Phường An Lạc",
            "Phường An Lạc A",
            "Phường An Lạc B",
            "Phường Tân Tạo",
            "Phường Tân Tạo A",
            "Phường Tân Tạo B"
        ],
        "Huyện Cần Giờ": [
            "Thị trấn Cần Thạnh",
            "Xã Bình Khánh",
            "Xã An Thới Đông",
            "Xã Cần Thạnh",
            "Xã Long Hòa",
            "Xã Tam Thôn Hiệp",
            "Xã Phú Mỹ"
        ],
        "Huyện Củ Chi": [
            "Trung Lập Hạ",
            "Thị trấn Củ Chi",
            "Xã Phước Hiệp",
            "Xã Phước Vĩnh An",
            "Xã Tân An Hội",
            "Xã Tân Phú Trung",
            "Xã Nhuận Đức",
            "Xã Bình Mỹ",
            "Xã Hòa Phú",
            "Xã An Nhơn Tây",
            "Xã Trung An",
            "Xã Tân Thạnh Tây",
            "Xã Tân Thông Hội",
            "Xã Lê Minh Xuân"
        ],
        "Huyện Hóc Môn": [
            "Thị trấn Hóc Môn",
            "Xã Bà Điểm",
            "Xã Đông Thạnh",
            "Xã Nhị Bình",
            "Xã Tân Hiệp",
            "Xã Tân Thới Nhì",
            "Xã Tân Xuân",
            "Xã Xuân Thới Sơn",
            "Xã Xuân Thới Thượng"
        ],
        "Huyện Nhà Bè": [
            "Thị trấn Nhà Bè",
            "Xã Hiệp Phước",
            "Xã Long Thới",
            "Xã Phước Kiển",
            "Xã Nhơn Đức",
            "Xã Tân Quý Tây",
            "Xã An Phú",
            "Xã Phước An"
        ],
        "Quận Gò Vấp": [
            "Phường 1",
            "Phường 2",
            "Phường 3",
            "Phường 4",
            "Phường 5",
            "Phường 6",
            "Phường 7",
            "Phường 8",
            "Phường 9",
            "Phường 10",
            "Phường 11",
            "Phường 12"
        ],
        "Quận Tân Phú": [
            "Phường Tân Quý",
            "Phường Tân Thới Nhất",
            "Phường Phú Thọ Hòa",
            "Phường Sơn Kỳ",
            "Phường Tân Sơn Nhì",
            "Phường Hiệp Tân",
            "Phường Hòa Thạnh",
            "Phường Tây Thạnh",
            "Phường Phú Trung",
            "Phường Nguyễn Sơn"
        ],
        "Quận Phú Nhuận": [
            "Phường 1",
            "Phường 2",
            "Phường 3",
            "Phường 4",
            "Phường 5",
            "Phường 7",
            "Phường 9",
            "Phường 10",
            "Phường 11",
            "Phường 12"
        ],
        "Quận Tân Bình": [
            "Phường 1",
            "Phường 2",
            "Phường 3",
            "Phường 4",
            "Phường 5",
            "Phường 6",
            "Phường 7",
            "Phường 8",
            "Phường 9",
            "Phường 10",
            "Phường 11",
            "Phường 12"
        ],
        "Quận Bình Thạnh": [
            "Phường 1",
            "Phường 2",
            "Phường 3",
            "Phường 4",
            "Phường 5",
            "Phường 6",
            "Phường 7",
            "Phường 8",
            "Phường 9",
            "Phường 10",
            "Phường 11",
            "Phường 12",
            "Phường 13",
            "Phường 14",
            "Phường 15"
        ]
    };

    function updateWardOptions(){
        const districtSelect = document.getElementById('district-add');
        const wardSelect = document.getElementById('ward-add');
        const selectedDistrict = districtSelect.value;

        wardSelect.innerHTML = '<option value="">Chọn Phường/Xã</option>';

        if(!selectedDistrict){
        wardSelect.disabled = true;
        return;
        }

        wardSelect.disabled = false;
        const wards = wardData[selectedDistrict];
        wards.forEach(ward => {
            const option = document.createElement('option');
            option.value = ward;
            option.textContent = ward;
            wardSelect.appendChild(option);
        });
    }

    document.addEventListener('DOMContentLoaded', updateWardOptions);





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
        if (!address_line) {
            alert('Vui lòng nhập địa chỉ.');
            return false;
        }
        if (!district) {
            alert('Vui lòng chọn Quận/Huyện.');
            return false;
        }
        if (!ward) {
            alert('Vui lòng chọn Phường/Xã.');
            return false;
        }
        if (!city) {
            alert('Vui lòng chọn Thành phố.');
            return false;
        }

    return true;
    }

</script>