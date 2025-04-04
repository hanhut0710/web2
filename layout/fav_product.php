<?php
$currentFile = basename($_SERVER['PHP_SELF']); // Kết quả: "account_password.php"
?>
<section class="user-page">
    <div class="container">
        <div class="profile-layout">
            <div class="profile-sidebar">
    <div class="profile-sidebar__user">
        <a class="profile-sidebar--thumb" href="/profile">
            <div class="shopee-avatar">
                <div class="shopee-avatar__placeholder">
                    <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon icon-headshot">
                        <g>
                            <circle cx="7.5" cy="4.5" fill="none" r="3.8" stroke-miterlimit="10"></circle>
                            <path d="m1.5 14.2c0-3.3 2.7-6 6-6s6 2.7 6 6" fill="none" stroke-linecap="round" stroke-miterlimit="10"></path>
                        </g>
                    </svg>
                </div>
                    <img class="shopee-avatar__img" src="img\icon\user.png">
            </div>
        </a>
        <div class="profile-sidebar--info">
            <div class="profile-sidebar--info-name"></div>
            <div>
                <a class="profile-sidebar--info-btn" href="/profile">
                    <svg width="12" height="12" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" style="margin-right: 4px;">
                        <path d="M8.54 0L6.987 1.56l3.46 3.48L12 3.48M0 8.52l.073 3.428L3.46 12l6.21-6.18-3.46-3.48" fill="#9B9B9B" fill-rule="evenodd"></path>
                    </svg>
                    Sửa hồ sơ
                </a>
            </div>
        </div>
    </div>
    <div class="profile-sidebar--menu">
        <div class="stardust-dropdown stardust-dropdown--open">
            <div class="stardust-dropdown__item-header">
                <a class="profile-sidebar--menu-item" href="./account.php">
                    <div class="profile-sidebar--menu-item--icon">
                        <img src="img\icon\user.png" alt="">
                    </div>
                    <div class="profile-sidebar--menu-item--title">
                        <span class="profile-sidebar--menu-item--text">Tài khoản của tôi</span>
                    </div>
                </a>
            </div>
            <div class="stardust-dropdown__item-body stardust-dropdown__item-body--open">
                <div class="profile-sidebar--submenu">
                <a class="profile-sidebar--submenu-item <?= ($currentFile == 'account.php') ? 'profile-sidebar--submenu-item--active' : '' ?>" href="./account.php">
                    <!-- <a class="profile-sidebar--submenu-item profile-sidebar--submenu-item--active" id="profile" href="./account.php"> -->
                        <span class="profile-sidebar--submenu-item__text">Hồ sơ</span>
                    </a>
                    <a class="profile-sidebar--submenu-item <?= ($currentFile == 'account_password.php') ? 'profile-sidebar--submenu-item--active' : '' ?>" href="./account_password.php">
                        <span class="profile-sidebar--submenu-item__text">Đổi mật khẩu</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="stardust-dropdown">
            <div class="stardust-dropdown__item-header">
                <a class="profile-sidebar--menu-item  <?= ($currentFile == 'account_history.php') ? 'profile-sidebar--submenu-item--active' : '' ?>"  href="./account_history.php" id="purchase">
                    <div class="profile-sidebar--menu-item--icon">
                        <img src="img\icon\cart.png" alt="">
                    </div>
                    <div class="profile-sidebar--menu-item--title">
                        <span class="profile-sidebar--menu-item--text">Đơn Mua</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="stardust-dropdown">
            <div class="stardust-dropdown__item-header">
                <a class="profile-sidebar--menu-item  <?= ($currentFile == 'account_fav.php') ? 'profile-sidebar--submenu-item--active' : '' ?>"  href="./account_fav.php" id="purchase">
                    <div class="profile-sidebar--menu-item--icon">
                        <img src="img\icon\icons8-favourite-50.png" alt="">
                    </div>
                    <div class="profile-sidebar--menu-item--title">
                        <span class="profile-sidebar--menu-item--text">Sản phẩm yêu thích</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="stardust-dropdown">
            <div class="stardust-dropdown__item-header">
            <a class="profile-sidebar--menu-item" href="./handle/logout.php">
            <div class="profile-sidebar--menu-item--icon">
                        <img src="img\icon\icons8-logout-50.png" alt="">
                    </div>
                    <div class="profile-sidebar--menu-item--title">
                        <span class="profile-sidebar--menu-item--text">Đăng xuất</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="profile-main" style="border:none;">

                <div class="category-product-list">
                <div class="row products">
                     <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="">
                                    <img class="image" src="./img/shoes/adidassuperstar_white.png">
                                    <ul class="product__hover">
                                        <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                        <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a>
                                        </li>
                                        <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>Adidas Superstar</h6>
                                    <a href="#" class="add-cart">+ Add To Cart</a>
                                    <div class="rating">
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <h5>2590000đ</h5>
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
                     <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="">
                                    <img class="image" src="./img/shoes/adidassamba_white.png">
                                    <ul class="product__hover">
                                        <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                        <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a>
                                        </li>
                                        <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>Adidas Samba</h6>
                                    <a href="#" class="add-cart">+ Add To Cart</a>
                                    <div class="rating">
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <h5>2690000đ</h5>
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
                     <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="">
                                    <img class="image" src="./img/shoes/vansoldskool_black.png">
                                    <ul class="product__hover">
                                        <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                        <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a>
                                        </li>
                                        <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>Vans old skool</h6>
                                    <a href="#" class="add-cart">+ Add To Cart</a>
                                    <div class="rating">
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <h5>2199000đ</h5>
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
                     <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="">
                                    <img class="image" src="./img/shoes/coversechuck_black.png">
                                    <ul class="product__hover">
                                        <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                        <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a>
                                        </li>
                                        <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>Coverse Chuck 70</h6>
                                    <a href="#" class="add-cart">+ Add To Cart</a>
                                    <div class="rating">
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <h5>2190000đ</h5>
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
                     <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="">
                                    <img class="image" src="./img/shoes/pumacaven_white.png">
                                    <ul class="product__hover">
                                        <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                        <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a>
                                        </li>
                                        <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>Puma Caven</h6>
                                    <a href="#" class="add-cart">+ Add To Cart</a>
                                    <div class="rating">
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <h5>1890000đ</h5>
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
                     <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="">
                                    <img class="image" src="./img/shoes/pumaspeedcat_black.png">
                                    <ul class="product__hover">
                                        <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                        <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a>
                                        </li>
                                        <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>Puma SpeedCat</h6>
                                    <a href="#" class="add-cart">+ Add To Cart</a>
                                    <div class="rating">
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <h5>2490000đ</h5>
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
                        </div></div>
                </div>
                <div class="row">
                        <div class="col-lg-12">
                            <div style="display: flex;justify-content: center;" class="product__pagination">
                                <a style="display: none;margin: 0 10px;" id="prePage" href="#">0</a>
                                <a class="active" style="margin: 0 10px;" href="#" id="currentPage">1</a>
                                <a style="display: block; margin: 0px 10px;" href="#" id="nextPage">2</a>
                            </div>
                        </div>
                    </div>
            </div>
    </div>
</div>