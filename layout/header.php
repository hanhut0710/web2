<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    if(isset($_SESSION["user"])){
    include('./handle/cart_getItemCount.php'); // đổi đường dẫn cho đúng
    $cartCount = getCartItemCount();
    }
?>
<div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Offcanvas Menu Begin -->
    <!-- Offcanvas Menu End -->
    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="./index.php"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div style="margin-top: 20px" class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li><a href="./index.php">Trang chủ</a></li>
                            <li><a href="./shop.php">Sản phẩm</a></li>
                            <li><a href="#" id="historyBtn">Lịch sử</a></li>
                            <li><a href="./cart.php">Giỏ hàng</a></li>
                        </ul>
                    </nav>
                </div>
                <div style="margin-top: 10px" class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                    <a href="cart.php">
                    <img src="img/icon/cart.png" alt="">
                    <span> <?php 
                            if (isset($cartCount) && $cartCount > 0) {
                                echo $cartCount; // Hiển thị số lượng sản phẩm trong giỏ hàng nếu có
                            } else {
                                echo 0;
                            }
                        ?> </span>
                </a>                    <?php 
                    if (isset($_SESSION["user"])): ?>
                        <span style=" display: inline-block;
                                    max-width: 70px;
                                    white-space: nowrap;
                                    overflow: hidden;
                                    text-overflow: ellipsis;
                                    vertical-align: middle;"
                                    class="username"><?= htmlspecialchars($_SESSION["user"]); ?></span>
                        <a class="nav-link dropdown-toggle user_isLogin" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img style="height: 20px; width: 20px; object-fit: cover;" src="img/icon/user.png" alt="">
                    </a>
                    <?php else: ?>
                         <a class="nav-link dropdown-toggle user" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img style="height: 20px; width: 20px; object-fit: cover;" src="img/icon/user.png" alt="">
                    </a>
                    <?php endif; ?>
                        <?php if (isset($_SESSION["user"])): ?>
                            <div id="userDropdown">
                                <a class="dropdown-item" href="account.php">Xem hồ sơ</a>
                                <a class="dropdown-item" href="./handle/logout.php">Logout</a>
                            </div>
                        <?php else: ?>
                            <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="#">Đăng nhập</a>
                            <a class="dropdown-item" href="#">Đăng ký</a>
                            </div>
                        <?php endif; ?>
                    <!-- <div class="price">$0.00</div> -->
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>

    <div class="login_modal">
        <div class="container__login">
            <div class="close_modal">
                <i onclick="closeModal()" class="fa-solid fa-arrow-right"></i>
            </div>
            <div class="form_login login">
                <h3>Đăng nhập</h3>
                <form id="loginForm">
                <input type="hidden" name="csrf_token" value="">
                <div class="input_box">
                        <label for="username">Tên đăng nhập</label><br>
                        <input type="text" id="username" name="username" placeholder="Tên đăng nhập" value="nguyenan"> 
                    </div>
                    <div class="input_box">
                        <label for="passwd">Mật khẩu</label><br>
                        <input type="password" id="passwd" name="passwd" placeholder="Mật khẩu" value="pass123"> 
                    </div>
                    <div class="input_box checkbox">
                        <p>Bạn chưa có tài khoản?<a href="#" onclick="changeLogin()"> Đăng kí</a></p>
                    </div>
                    <button type="button" class="btn_login" onclick="submitForm('login')">Đăng nhập</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Header Section End -->

    <!-- Popup chi tiết sản phẩm -->
    <div class="product-details" id="productDetails" >
    <div class="product-detail-content">
        <!-- Nút đóng popup -->
        <div class="product-detail-close" onclick="closeProductDetails()">
            <i class="fa-solid fa-xmark"></i>
        </div>

        <!-- Ảnh sản phẩm -->
        <div class="product__details__pic">
            <img id="popup-image" src="img/product-details.jpg" alt="Product Image">
        </div>

        <!-- Thông tin sản phẩm -->
        <div class="product__details__text">
            <h4 id="popup-name">Tên sản phẩm</h4>
            <p><strong>Giá: </strong> <span id="popup-price"></span></p>
            <p><strong>Thương hiệu: </strong> <span id="popup-brand"></span></p>

            <p><strong>Tồn hàng: </strong><span id="popup-quantity" class="quantities"></span></p>
            
            <p><strong></strong></p>   
            <div id="popup-color" class="color-options"></div>
            
            <p><strong>Kích thước: </strong></p>
            <div id="popup-sizes" class="size-options"></div>
            
            <!-- Nút Thêm vào giỏ hàng & Mua ngay -->
            <button class="btn-addcart">Thêm vào giỏ hàng <i class="fa-solid fa-cart-plus"></i></button>
            <button class="btn-buynow">Mua ngay <i class="fa-solid fa-sack-dollar"></i></button>
        </div>
    </div>
</div>

<script src="js/script.js"></script>    
<script src="js/addCart.js"></script>    