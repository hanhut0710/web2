document.querySelector(".user").addEventListener('click', function(e){
    document.querySelector('.login_modal').classList.toggle('active');
});

function closeModal(){
    document.querySelector(".login_modal").classList.toggle('active');
}

function changeLogin(){
    let form = document.querySelector('.form_login');
    if(form.classList.contains('login')){
        form.innerHTML = `<h3>Đăng Kí</h3>
                <div class="input_box">
                    <label for="fullname">Họ và tên</label><br>
                    <input type="text" id="fullname" placeholder="Họ và tên">
                </div>
                <div class="input_box">
                    <label for="phone">Số điện thoại</label><br>
                    <input type="text" id="phone" placeholder="Số điện thoại">
                </div>
                <div class="input_box">
                    <label for="username">Tên đăng nhập</label><br>
                    <input type="text" id="username" placeholder="tên đăng nhập">
                </div>
                <div class="input_box">
                    <label for="passwd">Mật khẩu</label><br>
                    <input type="password" id="passwd" placeholder="Mật khẩu">
                </div>
                <div class="input_box">
                    <label for="repasswd">Nhập lại mật khẩu</label><br>
                    <input type="password" id="repasswd" placeholder="Nhập lại mật khẩu">
                </div>
                <div class="input_box checkbox">
                    <p>Bạn đã có tài khoản?<a href="#" onclick="changeLogin()"> Đăng nhập</a></p>
                </div>
                <button class="btn_login">Đăng kí</button>`;
        form.classList.remove('login');
        form.classList.add('register');
    }
    else if(form.classList.contains('register')){
        form.innerHTML = ` <h3>Đăng nhập</h3>
                <div class="input_box">
                    <label for="username">Tên đăng nhập</label><br>
                    <input type="text" id="username" placeholder="Tên đăng nhập">
                </div>
                <div class="input_box">
                    <label for="passwd">Mật khẩu</label><br>
                    <input type="password" id="passwd" placeholder="Mật khẩu">
                </div>
                <div class="input_box checkbox">
                    <p>Bạn chưa có tài khoản?<a href="#" onclick="changeLogin()"> Đăng kí</a></p>
                </div>
                <button class="btn_login">Đăng nhập</button>`
        form.classList.remove('register');
        form.classList.add('login');
    }
}