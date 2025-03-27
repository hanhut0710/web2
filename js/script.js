
document.addEventListener('DOMContentLoaded', (event) => {
    loadProducts();
});
let currentPage = 1;
let pageSize = 8;
let prev = document.getElementById('prePage');
let next = document.getElementById('nextPage');
let current = document.getElementById('currentPage');
function loadProducts() {
    fetch(`./handle/get_product.php?page=${currentPage}&pageSize=${pageSize}`)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            const productContainer = document.querySelector(".row.products");
            productContainer.innerHTML = "";
            let productItem = '';
            data.data.forEach(product => {
                console.log(product.img_src);
                productItem += `
                    <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="">
                                    <img class="image" src="${product.img_src}">
                                    <ul class="product__hover">
                                        <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                        <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a>
                                        </li>
                                        <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>${product.name}</h6>
                                    <a href="#" class="add-cart">+ Add To Cart</a>
                                    <div class="rating">
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <h5>${product.price}đ</h5>
                                    <div class="product__color__select">
                                        <label for="pc-4">
                                            <input type="radio" id="pc-4">
                                        </label>
                                        <label class="active black" for="pc-5">
                                            <input type="radio" id="pc-5">
                                        </label>
                                        <label class="grey" for="pc-6">
                                            <input type="radio" id="pc-6">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                `;
            })
            productContainer.innerHTML += productItem;
            phanTrang(data);
        })
}

function phanTrang(data){
    let maxPage = Math.floor(data.totalProduct / pageSize) + 1;
    console.log(maxPage);
    
    current.innerHTML = currentPage;
    prev.innerHTML = currentPage - 1;
    next.innerHTML = currentPage + 1;

    if (currentPage < maxPage) {
        next.style.display = "block";
    } else {
        next.style.display = "none";
    }

    if (currentPage > 1) {
        prev.style.display = "block";
    } else {
        prev.style.display = "none";
    }

}

next.addEventListener('click', e => {
    currentPage++;
    loadProducts();
})

prev.addEventListener('click', e => {
    currentPage--;
    loadProducts();
})


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