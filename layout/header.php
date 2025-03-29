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
                            <li><a href="">Lịch sử</a></li>
                            <li><a href="">Đơn hàng</a></li>
                        </ul>
                    </nav>
                </div>
                <div style="margin-top: 10px" class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
                        <a class="nav-link dropdown-toggle user" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img style="height: 20px; width: 20px; object-fit: cover;" src="img/icon/user.png" alt="">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="#">Đăng nhập</a>
                            <a class="dropdown-item" href="#">Đăng ký</a>
                        </div>
                        <a href="./cart.php"><img src="img/icon/cart.png" alt=""> <span>0</span></a>
                        <div class="price">$0.00</div>
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
            </form>
        </div>
        </div>
    </div>
    <!-- Header Section End -->


    