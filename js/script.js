const userIcon = document.querySelector(".nav-link.user");
    const loginModal = document.querySelector(".login_modal");
    const loginForm = document.querySelector(".container__login");

    function openModal() {
        loginModal.classList.add("active");
        loginForm.classList.add("active");
    }
    function closeModal() {
        loginModal.classList.remove("active");
        loginForm.classList.remove("active");
    }
    userIcon.addEventListener("click", function (e) {
        e.preventDefault();
        loginModal.style.display = "flex"; // Hiển thị trước khi thêm class để transition hoạt động
        setTimeout(openModal, 10);
    });
    loginModal.addEventListener("click", function (e) {
        // Nếu click vào modal (bên ngoài form), thì đóng modal
        if (!loginForm.contains(e.target)) {
            loginModal.classList.remove("active");
            loginForm.classList.remove("active");
        }
    });
    
    // Ngăn chặn sự kiện click trong form
    loginForm.addEventListener("click", function (e) {
        e.stopPropagation(); // Ngăn click trong form lan ra ngoài
    });
function changeLogin(event) {
    // Ngăn sự kiện click lan ra ngoài
    if(event) event.stopPropagation();
    let form = document.querySelector('.form_login');
    let formContainer = document.querySelector('.form_login form'); // Chỉ thay đổi nội dung form

    if (form.classList.contains('login')) {
        formContainer.innerHTML = `
            <div class="input_box">
                <label for="fullname">Họ và tên</label><br>
                <input type="text" id="fullname" name="fullname" placeholder="Họ và tên">
            </div>
            <div class="input_box">
                <label for="phone">Số điện thoại</label><br>
                <input type="text" id="phone" name="phone" placeholder="Số điện thoại">
            </div>
            <div class="input_box">
                <label for="username">Tên đăng nhập</label><br>
                <input type="text" id="username" name="username" placeholder="Tên đăng nhập">
            </div>
            <div class="input_box">
                <label for="passwd">Mật khẩu</label><br>
                <input type="password" id="passwd" name="passwd" placeholder="Mật khẩu">
            </div>
            <div class="input_box">
                <label for="repasswd">Nhập lại mật khẩu</label><br>
                <input type="password" id="repasswd" name="repasswd" placeholder="Nhập lại mật khẩu">
            </div>
            <div class="input_box checkbox">
                <p>Bạn đã có tài khoản? <a href="#" onclick="changeLogin(event)"> Đăng nhập</a></p>
            </div>
            <button type="button" class="btn_login" onclick="submitForm('register')">Đăng ký</button>
        `;
        form.classList.remove('login');
        form.classList.add('register');
    } else {
        formContainer.innerHTML = `
            <div class="input_box">
                <label for="username">Tên đăng nhập</label><br>
                <input type="text" id="username" name="username" placeholder="Tên đăng nhập">
            </div>
            <div class="input_box">
                <label for="passwd">Mật khẩu</label><br>
                <input type="password" id="passwd" name="passwd" placeholder="Mật khẩu">
            </div>
            <div class="input_box checkbox">
                <p>Bạn chưa có tài khoản? <a href="#" onclick="changeLogin(event)"> Đăng ký</a></p>
            </div>
            <button type="button" class="btn_login" onclick="submitForm('login')">Đăng nhập</button>
        `;
        form.classList.remove('register');
        form.classList.add('login');
    }
}


function submitForm(type){
    let formData;
    if(type == 'login'){
        formData = new FormData(document.getElementById('loginForm'));
    }
    else if(type == "register"){
        formData = new FormData(document.getElementById('registerForm'));
    }

    fetch('./handle/login.php', {   
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
       if(data['status'] === 'error'){
            alert(data['message']);
       }
    })
}