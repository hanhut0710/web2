let currentPage = 1;
let pageSize = 6;
let isSearching = false;
let currentCategory = 'all';
let currentBrand = 'all';
let searchKeyword = '';
let selectedBrand = '';
let selectedPrice = '';



const userIcon = document.querySelector(".nav-link.user");
const loginModal = document.querySelector(".login_modal");
const loginForm = document.querySelector(".container__login");
const btnHistory = document.getElementById('historyBtn');
btnHistory.addEventListener("click" , function(event){
    fetch('./handle/Check_Login.php')
    .then(res => res.json())
    .then(data => {
        if(data.isLogin){
            window.location.href = "./account_history.php";
        }
        else {
            event.preventDefault();
            showToast("Bạn chưa đăng nhập!","fail");
        }
    });
});
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
            showToast("Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu!","fail");            
        } else {
            submitForm("login"); // Gọi hàm đăng nhập nếu đủ thông tin
        }
    }
});
function changeLogin(event) {
    // Ngăn sự kiện click lan ra ngoài
    if (event) event.stopPropagation();
    let form = document.querySelector('.form_login');
    let formContainer = document.createElement('div');  // Tạo một container mới
    
    if (form.classList.contains('login')) {
        formContainer.innerHTML = `
            <h3>Đăng Ký</h3>
            <form id="registerForm">
             <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                <div class="input_box">
                    <label for="fullname">Họ và tên</label><br>
                    <input type="text" id="fullname" name="fullname" placeholder="Họ và tên" value="HaNhut">
                </div>
                <div class="input_box">
                    <label for="phone">Số điện thoại</label><br>
                    <input type="text" id="phone" name="phone" placeholder="Số điện thoại" value="0123456789">
                </div>
                <div class="input_box">
                    <label for="username">Tên đăng nhập</label><br>
                    <input type="text" id="username" name="username" placeholder="Tên đăng nhập" >
                </div>
                <div class="input_box">
                    <label for="passwd">Mật khẩu</label><br>
                    <input type="password" id="passwd" name="passwd" placeholder="Mật khẩu" value="123456">
                </div>
                <div class="input_box">
                    <label for="repasswd">Nhập lại mật khẩu</label><br>
                    <input type="password" id="repasswd" name="repasswd" placeholder="Nhập lại mật khẩu" value="123456">
                </div>
                <div class="input_box checkbox">
                    <p>Bạn đã có tài khoản? <a href="#" onclick="changeLogin(event)"> Đăng nhập</a></p>
                </div>
                <button type="button" class="btn_login" onclick="submitForm('register')">Đăng ký</button>
            </form>
        `;
        form.innerHTML = '';  // Xóa nội dung cũ
        form.appendChild(formContainer);  // Thêm form mới vào container
        form.classList.remove('login');
        form.classList.add('register');
    } else {
        formContainer.innerHTML = `
            <h3>Đăng nhập</h3>
            <form id="loginForm">
                 <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                <div class="input_box">
                    <label for="username">Tên đăng nhập</label><br>
                    <input type="text" id="username" name="username" placeholder="Tên đăng nhập" value="hanhut">
                </div>
                <div class="input_box">
                    <label for="passwd">Mật khẩu</label><br>
                    <input type="password" id="passwd" name="passwd" placeholder="Mật khẩu" value="anhnhutdeptrai">
                </div>
                <div class="input_box checkbox">
                    <p>Bạn chưa có tài khoản?<a href="#" onclick="changeLogin(event)"> Đăng kí</a></p>
                </div>
                <button type="button" class="btn_login" onclick="submitForm('login')">Đăng nhập</button>
            </form>
        `;
        form.innerHTML = '';  // Xóa nội dung cũ
        form.appendChild(formContainer);  // Thêm form mới vào container

        form.classList.remove('register');
        form.classList.add('login');
    }
}

function submitForm(type) {
let form;
let csrfToken = document.querySelector('input[name="csrf_token"]').value; // Lấy CSRF token từ form
if (type === "login") {
    form = document.getElementById("loginForm");
} else if (type === 'register') {
    form = document.getElementById("registerForm");
}
// Kiểm tra thông tin trước khi gửi
const username = form.querySelector("#username")?.value.trim();
const password = form.querySelector("#passwd")?.value.trim();
if (!username || !password) {
    showToast("Vui lòng nhập đầy đủ thông tin!","fail");
    return;
}
let formData;
if (type === 'login') {
    formData = new FormData(document.getElementById('loginForm'));
} else if (type === "register") {
    const fullname = form.querySelector("#fullname")?.value.trim();
    const phone = form.querySelector("#phone")?.value.trim();
    const repassword = form.querySelector("#repasswd")?.value.trim();
    if (!fullname || !phone || !username || !password || !repassword) {
        showToast("Vui lòng nhập đầy đủ thông tin!","fail");
        return;
    }
    if (password !== repassword) {
        showToast("Mật khẩu nhập lại không khớp!","fail");
        return;
    }
    formData = new FormData(document.getElementById('registerForm'));
}
formData.append('csrf_token', csrfToken);
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
        showToast(data.message,"fail");
    } else {
        showToast(data.message,"success");
        setTimeout((e)=>{
            location.reload();
        }, 2000);
    }
})
.catch(error => {
    console.error("Lỗi kết nối:", error);
    showToast("Có lỗi xảy ra khi kết nối với máy chủ. Vui lòng thử lại!","fail");
});

}
const user_isLogin = document.querySelector(".user_isLogin");
const userDropdown = document.getElementById("userDropdown");
if (user_isLogin){
user_isLogin.addEventListener("click", function (event) {
    event.preventDefault(); // Ngăn chặn chuyển trang nếu có
    userDropdown.style.display = (userDropdown.style.display === "block") ? "none" : "block";
});
}

// Hiển thị popup sản phẩm
function openProductDetails(productId) {
let selectedSize = null;
let selectedColor = null;
let selectedProductDetailId = null; // thêm biến này
console.log("Product ID:", productId); // Kiểm tra giá trị
fetch(`./handle/get_product_details.php?product_id=${productId}`)
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            console.error("Lỗi:", data.error);
        } else {
            document.getElementById("popup-image").src = data.product.img_src;
            document.getElementById("popup-name").innerText = data.product.name;
            document.getElementById("popup-price").innerText = data.product.price;
            document.getElementById("popup-brand").innerText = data.product.brand_name;
            document.getElementById("popup-color").innerText = data.product.color;
            document.getElementById("popup-quantity").innerText = data.product.stock;
            
            const sizeContainer = document.getElementById("popup-sizes");
            sizeContainer.innerHTML = ""; // Xóa danh sách cũ // Chuyển chuỗi size thành mảng
            data.size.forEach(size => {
                const sizeElement = document.createElement("span");
                sizeElement.classList.add("size-option");
                sizeElement.innerText = size.size;
                sizeContainer.appendChild(sizeElement);
                
                sizeElement.addEventListener("click", function () {
                    // Xóa active cũ
                    document.querySelectorAll('.size-option').forEach(e => e.classList.remove("active"));
                    sizeElement.classList.add("active");
                    selectedSize = size.size;
                    updateSelectedDetailId();

                    // console.log("Size đã chọn:", size.size);
                });
            });
            // Xử lý màu sắc
            const colorContainer = document.getElementById("popup-color");
            const productImage = document.getElementById("popup-image"); // Ảnh sản phẩm

            colorContainer.innerHTML = "";

            data.color.forEach(color => {
                const colorElement = document.createElement("span");
                colorElement.classList.add("color-option");
            
                const img = document.createElement("img");
                img.src = color.img_src;
                img.alt = color.color;
                img.classList.add("color-thumbnail"); // Thêm class để dễ CSS
                colorElement.appendChild(img);
            
                colorContainer.appendChild(colorElement);
            
                colorElement.addEventListener("click", function () {
                    document.querySelectorAll('.color-option').forEach(e => e.classList.remove("active"));
                    colorElement.classList.add("active");
                    selectedColor = color.color;
                    console.log(selectedColor);
                    productImage.src = color.img_src;
                    updateSelectedDetailId();
                    });

                    
            });
            let productDetails = [];
            function fetchProductDetails(productId) {
                fetch(`./handle/get_product_detail_id.php?product_id=${productId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.details) {
                            productDetails = data.details;
                            console.log("Chi tiết sản phẩm:", productDetails);
                        } else {
                            console.error(data.error || "Không thể lấy chi tiết sản phẩm");
                        }
                    })
                    .catch(err => console.error("Lỗi khi fetch:", err));
            }
            fetchProductDetails(productId);

            function updateSelectedDetailId() {
                console.log(selectedColor);
                if (selectedSize && selectedColor && productDetails) {
                    fetch(`./handle/get_product_details.php?product_id=${productId}&size=${selectedSize}&color=${selectedColor}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.selected_variant) {
                            document.getElementById("popup-quantity").innerText = data.selected_variant.stock;
                        } else {
                            document.getElementById("popup-quantity").innerText = "0";
                            
                        }
                    })
                    .catch(err => {
                        console.error("Lỗi khi lấy stock:", err);
                        document.getElementById("popup-quantity").innerText = "0";
                    });
                    
                    const match = productDetails.find(d => d.size === selectedSize && d.color === selectedColor);
                    if (match) {
                        selectedProductDetailId = match.product_detail_id;
                        console.log("Đã chọn chi tiết:", selectedProductDetailId);
                    } else {
                        console.log("Không tìm thấy chi tiết phù hợp.");
                    }
                }
            }
            // Gán lại sự kiện nút thêm vào giỏ mỗi khi mở popup
            const btnaddCart = document.querySelector(".btn-addcart");
            const newBtn = btnaddCart.cloneNode(true);
            btnaddCart.parentNode.replaceChild(newBtn, btnaddCart);
            newBtn.addEventListener("click", function () {
                fetch('./handle/Check_Login.php')
                .then(res => res.json())
                .then(data => {
                    if(data.isLogin){
                        if (!selectedProductDetailId || !productId) {
                            showToast("Vui lòng chọn size và màu sắc","fail");
                            return;
                        }
                    
                        console.log("Gửi dữ liệu:", {
                            product_id: productId,
                            product_detail_id: selectedProductDetailId,
                            quantity: 1
                        });
                        fetch(`./handle/add_to_Cart.php`, {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/x-www-form-urlencoded",
                            },
                            body: "product_id=" + encodeURIComponent(productId) +
                                  "&product_detail_id=" + encodeURIComponent(selectedProductDetailId) +
                                  "&quantity=1"
                        })
                        .then(res => res.text())
                        .then(text => {
                            console.log("Phản hồi thô từ server:", text);
                            try {
                                const data = JSON.parse(text);
                                console.log("Parsed JSON:", data);
                                if (data.success) {
                                    showToast("✅ Thêm sản phẩm vào giỏ hàng thành công!","success");
                                    location.reload();
                                } else {
                                    showToast("❌ Không thể thêm sản phẩm: " + (data.message || "Lỗi không xác định."),"fail");
                                }
                            } catch (e) {
                                console.error("Lỗi khi parse JSON:", e);
                                showToast("❌ Đã xảy ra lỗi khi xử lý phản hồi từ server.","fail");
                            }
                        })
                        .catch(err => {
                            console.error("Lỗi khi gọi API:", err);
                            showToast("❌ Lỗi kết nối đến server.","fail");
                        });
                    }
                    else {
                        showToast("Bạn cần đăng nhập trước khi thêm sản phẩm","fail");
                    }
                });
            });                
            

            const btnBuyNow = document.querySelector(".btn-buynow");
            const btnBuyNownew = btnBuyNow.cloneNode(true);
            btnBuyNow.parentNode.replaceChild(btnBuyNownew,btnBuyNow);
            btnBuyNownew.addEventListener("click" , function(){
                fetch('./handle/Check_Login.php')
                .then(res => res.json())
                .then(data => {
                    if(data.isLogin){
                        if (!selectedProductDetailId || !productId) {
                            showToast("Vui lòng chọn size và màu sắc!","fail");
                            return;
                        }
                        console.log("Gửi dữ liệu:", {
                            product_id: productId,
                            product_detail_id: selectedProductDetailId,
                            quantity: 1
                        });
                        const form = document.createElement("form");
                        form.method = "POST";
                        form.action = "./BuyNow.php";
        
                        const addField = (name, value) => {
                            const input = document.createElement("input");
                            input.type = "hidden";
                            input.name = name;
                            input.value = value;
                            form.appendChild(input);
                        };
        
                        addField("product_id", productId);
                        addField("product_detail_id", selectedProductDetailId);
                        addField("quantity", 1);
                        addField("action", "buy_now");
        
                        document.body.appendChild(form);
                        form.submit();  // Chuyển trang và gửi dữ liệu POST  
                    }
                    else {
                        showToast("Bạn cần đăng nhập trước khi mua","fail");
                    }
                })
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

function openFilter() {
    const form = document.querySelector('#advancedSearchForm');
    form.classList.toggle('active');
}

