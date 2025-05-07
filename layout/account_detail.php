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
                <a class="profile-sidebar--info-btn" href="#" id="edit-button">
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
<div class="profile-main" id="profile-acc">
                <div class="profile-main__acount" role="main">
                    <div class="profile-main__account-inner">
                        <form action="" method="post" enctype="multipart/form-data" id="form_login">
                            <div class="profile-main__account-header">
                                <h1 class="profile-main__account-header__title">Hồ sơ của tôi</h1>
                                <div class="profile-main__account-header__des">
                                    Quản lý thông tin hồ sơ
                                    để bảo mật tài khoản
                                </div>
                            </div>
                            <div class="profile-main__account-body">
                                
                                    <div class="profile-main__account-body__info">
                                        <div class="profile-account__custom-form__group">
                                            <div class="profile-account__custom-form__items">
                                                <div class="profile-account__custom-form__label">
                                                    <label>Tên đăng nhập</label>
                                                </div>
                                                <div class="profile-account__custom-form__form">
                                                    <div class="input-with-validator-wrapper">
                                                        <div class="input-with-validator">
                                                        <input id="UserName" name="UserName" readonly="readonly" type="text" 
                                                        value="<?= isset($_SESSION['user']) ? htmlspecialchars($_SESSION['user']) : '' ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="profile-account__custom-form__group">
                                            <div class="profile-account__custom-form__items">
                                                <div class="profile-account__custom-form__label">
                                                    <label>Tên</label>
                                                </div>
                                                <div class="profile-account__custom-form__form">
                                                    <div class="input-with-validator-wrapper">
                                                        <div class="input-with-validator">
                                                            <input id="FullName" name="FullName" placeholder="Họ và tên" type="text" fdprocessedid="mgj7zg"
                                                            value="<?= isset($_SESSION['user_name']) ? htmlspecialchars($_SESSION['user_name']) : '' ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="profile-account__custom-form__group">
                                            <div class="profile-account__custom-form__items">
                                                <div class="profile-account__custom-form__label">
                                                    <label>Số điện thoại *</label>
                                                </div>
                                                <div class="profile-account__custom-form__form">
                                                    <div class="input-with-validator-wrapper">
                                                        <div class="input-with-validator">
                                                            <input id="Phone" name="Phone" placeholder="Số điện thoại" required="true" type="tel" fdprocessedid="pcxjip"
                                                            value="<?= isset($_SESSION['user_phone']) ? htmlspecialchars($_SESSION['user_phone']) : '' ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <h4 style="margin-bottom: 10px;">Thông tin nhận hàng</h4>
                                <div class="box-select"> 
                                      <div class="box-input box-input--hasvalue">
                                          <input type="search" id="box-select-city" placeholder="Hồ Chí Minh" autocomplete="off" class="box-input__main" value="Hồ Chí Minh" readonly="" disabled>
                                          <label for="box-select-city" class="email-label">Tỉnh / Thành phố</label> 
                                          <div class="box-input__line"></div> 
                                  </div>
                                  <div class="box-input"> 
                                        <input type="search" id="box-select-district" placeholder="" autocomplete="off" class="box-input__main" disabled>
                                        <label for="box-select-district" class="email-label">Quận / huyện</label>
                                        <div class="box-input__line"></div> 
                                        <div class="box-input__arrow"> 
                                              <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon">
                                                  <path d="M8.00004 10.6668C7.84427 10.6671 7.69331 10.6128 7.57337 10.5135L3.57337 7.18012C3.28986 6.94448 3.25106 6.52362 3.4867 6.24012C3.72234 5.95661 4.1432 5.91781 4.4267 6.15345L8.00004 9.14012L11.5734 6.26012C11.7111 6.14827 11.8877 6.09594 12.0642 6.11471C12.2406 6.13348 12.4023 6.2218 12.5134 6.36012C12.6368 6.49869 12.6969 6.68244 12.6792 6.86716C12.6614 7.05188 12.5675 7.22086 12.42 7.33345L8.42004 10.5535C8.29665 10.6371 8.14877 10.677 8.00004 10.6668Z" fill="#717171">
                                                  </path>
                                              </svg>
                                        </div>
                                        <div id="districtDropdown" class="dropdown"><div class="dropdown__item"><span>Huyện Bình Chánh</span></div><div class="dropdown__item"><span>Huyện Cần Giờ</span></div><div class="dropdown__item"><span>Huyện Hóc Môn</span></div><div class="dropdown__item"><span>Huyện Nhà Bè</span></div><div class="dropdown__item"><span>Huyện Củ Chi</span></div><div class="dropdown__item"><span>Quận 1</span></div><div class="dropdown__item"><span>Quận 2</span></div><div class="dropdown__item"><span>Quận 3</span></div><div class="dropdown__item"><span>Quận 4</span></div><div class="dropdown__item"><span>Quận 5</span></div><div class="dropdown__item"><span>Quận 6</span></div><div class="dropdown__item"><span>Quận 7</span></div><div class="dropdown__item"><span>Quận 8</span></div><div class="dropdown__item"><span>Quận 9</span></div><div class="dropdown__item"><span>Quận 10</span></div><div class="dropdown__item"><span>Quận 11</span></div><div class="dropdown__item"><span>Quận 12</span></div><div class="dropdown__item"><span>Quận Bình Tân</span></div><div class="dropdown__item"><span>Quận Bình Thạnh</span></div><div class="dropdown__item"><span>Quận Tân Phú</span></div><div class="dropdown__item"><span>Quận Gò Vấp</span></div><div class="dropdown__item"><span>Quận Phú Nhuận</span></div><div class="dropdown__item"><span>Quận Tân Bình</span></div></div>
                                  </div>
                                </div>
                                <div class="box-select">
                                  <div class="box-input">
                                    <input id="box-select-ward" type="search" placeholder="" autocomplete="off" class="box-input__main" disabled>
                                    <label for="box-select-ward" class="email-label">Chọn phường / xã</label>
                                    <div class="box-input__line"></div>
                                    <div class="box-input__arrow"> 
                                      <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon">
                                          <path d="M8.00004 10.6668C7.84427 10.6671 7.69331 10.6128 7.57337 10.5135L3.57337 7.18012C3.28986 6.94448 3.25106 6.52362 3.4867 6.24012C3.72234 5.95661 4.1432 5.91781 4.4267 6.15345L8.00004 9.14012L11.5734 6.26012C11.7111 6.14827 11.8877 6.09594 12.0642 6.11471C12.2406 6.13348 12.4023 6.2218 12.5134 6.36012C12.6368 6.49869 12.6969 6.68244 12.6792 6.86716C12.6614 7.05188 12.5675 7.22086 12.42 7.33345L8.42004 10.5535C8.29665 10.6371 8.14877 10.677 8.00004 10.6668Z" fill="#717171">
                                          </path>
                                      </svg>
                                    </div>
                                      <div id="wardDropdown" class="dropdown"> 
                                        <!--  -->
                                        <!--  -->
                                        <!--  -->
                                      </div>
                                  </div>
                                  <div class="box-input">
                                    <input id="box-select-address" type="text" placeholder="Địa chỉ" maxlength="1000" autocomplete="off" class="box-input__main" fdprocessedid="p3ho0i" disabled>
                                    <label for="box-select-address" class="email-label">Địa chỉ</label>
                                    <div class="box-input__line"></div>
                                  </div>
                                </div>
                                
                                <div class="profile-account__custom-form__footer">
                                    <input type="hidden" id="Id" name="Id" value="295115">
                                    <div id="save-button" class="custom-button">
                                        Lưu
                                    </div>
                                    <!-- <div id="add_address" class="add_address">
                                        Thêm Địa Chỉ
                                    </div> -->
                                    <div id="add" class="add">
                                        Thêm 
                                    </div>
                                </div>

                                    </div>
                                    <div class="profile-main__account-body__right">
                                        <div class="profile-main__account-body__right-avatar">
                                            <div class="profile-main__account-body__right-avatar__thumb">
                                                <div class="profile-main__account-body__right-avatar__img" style="background-color: #f5f5f5;">
                                                        <img class="shopee-avatar__img" src="./img/logo.png" id="avatar">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                
                            </div></form>
                        
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<script>

</script>