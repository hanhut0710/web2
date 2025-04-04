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
    if (userIcon){
    userIcon.addEventListener("click", function (e) {
        e.preventDefault();
        loginModal.style.display = "flex"; // Hiển thị trước khi thêm class để transition hoạt động
        setTimeout(openModal, 10);
    });
}
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
    loginForm.addEventListener("keypress", function (event) {
        if (event.key === "Enter") {
            event.preventDefault(); // Ngăn form gửi đi mặc định

            const username = document.getElementById("username").value.trim();
            const password = document.getElementById("passwd").value.trim();

            if (username === "" || password === "") {
                alert("Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu!");
            } else {
                submitForm("login"); // Gọi hàm đăng nhập nếu đủ thông tin
            }
        }
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
function submitForm(type) {
    let form;
    if (type === "login") {
        form = document.getElementById("loginForm");
    } else if (type === "register") {
        form = document.getElementById("registerForm");
    }
    if (!form) {
        alert("Lỗi: Không tìm thấy form.");
        return;
    }
    // Kiểm tra thông tin trước khi gửi
    const username = form.querySelector("#username")?.value.trim();
    const password = form.querySelector("#passwd")?.value.trim();
    if (!username || !password) {
        alert("Vui lòng nhập đầy đủ thông tin!");
        return;
    }
    let formData;
    if (type === 'login') {
        formData = new FormData(document.getElementById('loginForm'));
    } else if (type === "register") {
        formData = new FormData(document.getElementById('registerForm'));
    }
    fetch("handle/login.php", {
        method: 'POST',
        body: formData,
        headers: {
            'Accept': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Lỗi server: ' + response.statusText);
        }
        return response.json();
    })
    .then(data => {
        if (data.status === 'error') {
            alert(data.message);
        } else {
            alert(data.message);
            window.location.href = "index.php";
        }
    })
    .catch(error => {
        console.error("Lỗi kết nối:", error);
        alert("Có lỗi xảy ra khi kết nối với máy chủ. Vui lòng thử lại!");
    });
    
    // fetch('./handle/login.php', {
    //     method: 'POST',
    //     body: formData,
    //     headers: {
    //         'Accept': 'application/json'
    //     }
    // })
    // .then(response => response.json())
    // .then(data => {
    //     if (data.status === 'error') {
    //         alert(data.message);
    //     } else {
    //         alert(data.message);
    //         window.location.href = "index.php";
    //     }
    // })
    // .catch(error => console.error("Lỗi kết nối:", error));
}
    const user_isLogin = document.querySelector(".user_isLogin");
    const userDropdown = document.getElementById("userDropdown");
    
    user_isLogin.addEventListener("click", function (event) {
        event.preventDefault(); // Ngăn chặn chuyển trang nếu có
        userDropdown.style.display = (userDropdown.style.display === "block") ? "none" : "block";
    });
    document.addEventListener("click", function (event) {
        if (!user_isLogin.contains(event.target) && !userDropdown.contains(event.target)) {
            userDropdown.style.display = "none";
        }
    });

    
// Hiển thị popup sản phẩm
function openProductDetails(productId) {
    console.log("Product ID:", productId); // Kiểm tra giá trị

    // Gửi yêu cầu AJAX để lấy chi tiết sản phẩm từ database
    fetch(`./handle/get_product_details.php?product_id=${productId}`)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.error("Lỗi:", data.error);
            } else {
                console.log("Dữ liệu sản phẩm:", data); // Kiểm tra dữ liệu
                // Điền thông tin vào popup
                document.getElementById("popup-image").src = data.product.img_src;
                document.getElementById("popup-name").innerText = data.product.name;
                document.getElementById("popup-price").innerText = data.product.price;
                document.getElementById("popup-brand").innerText = data.product.brand;
                document.getElementById("popup-color").innerText = data.product.color;
            
                const sizeContainer = document.getElementById("popup-sizes");
                sizeContainer.innerHTML = ""; // Xóa danh sách cũ // Chuyển chuỗi size thành mảng
                data.size.forEach(size => {
                    console.log(size)
                    const sizeElement = document.createElement("span");
                    sizeElement.classList.add("size-option");
                    sizeElement.innerText = size.size;
                    sizeContainer.appendChild(sizeElement);

                    sizeElement.addEventListener("click", function () {
                        // Xóa active cũ
                        document.querySelectorAll('.size-option').forEach(e => e.classList.remove("active"));
                        sizeElement.classList.add("active");
                        console.log("Size đã chọn:", size.size);
                    });
                });

                // Xử lý màu sắc
                const colorContainer = document.getElementById("popup-color");
                const productImage = document.getElementById("popup-image"); // Ảnh sản phẩm

                colorContainer.innerHTML = "";

                data.color.forEach(color => {
                    console.log(color);

                const colorElement = document.createElement("span");
                colorElement.classList.add("color-option");
                colorElement.style.backgroundColor = color.color; // Gán màu nền

                colorContainer.appendChild(colorElement);

                colorElement.addEventListener("click", function () {
                    // Xóa class active của các màu trước đó
                    document.querySelectorAll('.color-option').forEach(e => e.classList.remove("active"));
                    colorElement.classList.add("active");
                    console.log("Màu đã chọn:", color.color);

                    // Thay đổi hình ảnh tương ứng với màu được chọn
                    console.log("Màu đã chọn:", color.color);
                    console.log("URL hình ảnh:", color.img_src);
                     productImage.src = color.img_src; // Cập nhật ảnh theo màu
                    });
                });

            }
        })
        

    // Hiển thị popup
    document.getElementById("productDetails").classList.add("show");
}

// Ẩn popup khi nhấn nút đóng
function closeProductDetails() {
    document.getElementById("productDetails").classList.remove("show");
}


// document.addEventListener('DOMContentLoaded', () => {
//     let options = document.querySelectorAll('.size-option');

//     options.forEach(option => {
//         option.addEventListener('click', function () {
//             console.log("cc");
//             options.forEach(e => e.classList.remove("active"));
//             option.classList.add("active");
//         });
//     });
// });

