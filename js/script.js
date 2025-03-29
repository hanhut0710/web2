

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
                <form id="registerForm">
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
                        <input type="text" id="username" name="username" placeholder="tên đăng nhập">
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
                        <p>Bạn đã có tài khoản?<a href="#" onclick="changeLogin()"> Đăng nhập</a></p>
                    </div>
                    <button type="button" class="btn_login" onclick="submitForm('register')">Đăng kí</button>
                </form>`;
        form.classList.remove('login');
        form.classList.add('register');
    }
    else if(form.classList.contains('register')){
        form.innerHTML = ` <h3>Đăng nhập</h3>
                <form id="loginForm">
                    <div class="input_box">
                        <label for="username">Tên đăng nhập</label><br>
                        <input type="text" id="username" name="username" placeholder="Tên đăng nhập">
                    </div>
                    <div class="input_box">
                        <label for="passwd">Mật khẩu</label><br>
                        <input type="password" id="passwd" name="passwd" placeholder="Mật khẩu">
                    </div>
                    <div class="input_box checkbox">
                        <p>Bạn chưa có tài khoản?<a href="#" onclick="changeLogin()"> Đăng kí</a></p>
                    </div>
                    <button type="button" class="btn_login" onclick="submitForm('login')">Đăng nhập</button>
                </form>`
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

