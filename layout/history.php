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
<div class="profile-main profile-main--no-border">
                <div class="orders-page">
                    <div class="custom-tab-nav">
                        <a class="custom-tab-nav-item custom-tab-nav-item--active" href="#"  data-target="#order-tab-all">
                            <span class="_0rjE9m">Tất cả</span>
                        </a>
                        <a class="custom-tab-nav-item" href="#" data-target="#order-tab-pending-confirm" >
                            <span class="_0rjE9m">Chờ xác nhận</span>
                        </a>
                        <a class="custom-tab-nav-item" href="#" data-target="#order-tab-pending-pick" >
                            <span class="_0rjE9m">Chờ lấy hàng</span>
                        </a>
                        <a class="custom-tab-nav-item" href="#" data-target="#order-tab-process" >
                            <span class="_0rjE9m">Đang giao</span>
                        </a>
                        <a class="custom-tab-nav-item" href="#" data-target="#order-tab-done" >
                            <span class="_0rjE9m">Đã giao</span>
                        </a>
                        <a class="custom-tab-nav-item" href="#" data-target="#order-tab-cancel" >
                            <span class="_0rjE9m">Đã Hủy</span>
                        </a>
                    </div>
                    <div class="custom-tab-contents">
                        <div class="custom-tab-content-item custom-tab-content-item--active" id="order-tab-all">
                            <!--ko if:PurchaseItems().length > 0--><!--/ko-->
                            <!--ko if:PurchaseItems().length == 0-->
                            <div class="no-orders">
                                <div class="no-orders-thumb"></div>
                                <div class="no-orders-title">Chưa có đơn hàng</div>
                            </div>
                            <!--/ko-->
                        </div>
                        <div class="custom-tab-content-item" id="order-tab-pending-confirm">
                            <!--ko if:PurchaseItems().length > 0--><!--/ko-->
                            <!--ko if:PurchaseItems().length == 0-->
                            <div class="no-orders">
                                <div class="no-orders-thumb"></div>
                                <div class="no-orders-title">Chưa có đơn hàng</div>
                            </div>
                            <!--/ko-->
                        </div>
                        <div class="custom-tab-content-item" id="order-tab-pending-pick">
                            <!--ko if:PurchaseItems().length > 0--><!--/ko-->
                            <!--ko if:PurchaseItems().length == 0-->
                            <div class="no-orders">
                                <div class="no-orders-thumb"></div>
                                <div class="no-orders-title">Chưa có đơn hàng</div>
                            </div>
                            <!--/ko-->
                        </div>
                        <div class="custom-tab-content-item" id="order-tab-process">
                            <!--ko if:PurchaseItems().length > 0--><!--/ko-->
                            <!--ko if:PurchaseItems().length == 0-->
                            <div class="no-orders">
                                <div class="no-orders-thumb"></div>
                                <div class="no-orders-title">Chưa có đơn hàng</div>
                            </div>
                            <!--/ko-->
                        </div>
                        <div class="custom-tab-content-item" id="order-tab-done">
                            <!--ko if:PurchaseItems().length > 0--><!--/ko-->
                            <!--ko if:PurchaseItems().length == 0-->
                            <div class="no-orders">
                                <div class="no-orders-thumb"></div>
                                <div class="no-orders-title">Chưa có đơn hàng</div>
                            </div>
                            <!--/ko-->
                        </div>
                        <div class="custom-tab-content-item" id="order-tab-cancel">
                            <!--ko if:PurchaseItems().length > 0--><!--/ko-->
                            <!--ko if:PurchaseItems().length == 0-->
                            <div class="no-orders">
                                <div class="no-orders-thumb"></div>
                                <div class="no-orders-title">Chưa có đơn hàng</div>
                            </div>
                            <!--/ko-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>