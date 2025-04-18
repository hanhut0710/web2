<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Thanh Toán</h4>
                    <div class="breadcrumb__links">
                        <a href="./index.php">Trang Chủ</a>
                        <a href="./shop.php">Cửa Hàng</a>
                        <span>Thanh Toán</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <form action="#">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <h6 class="checkout__title">Thông Tin Thanh Toán</h6>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Họ<span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Tên<span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Số Điện Thoại<span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                        </div>
                        <h4 style="margin-bottom: 10px;">Thông tin nhận hàng</h4>
                                <div class="box-select"> 
                                      <div class="box-input box-input--hasvalue">
                                          <input type="search" id="box-select-city" placeholder="Hồ Chí Minh" autocomplete="off" class="box-input__main" value="Hồ Chí Minh" readonly="">
                                          <label for="box-select-city" class="email-label">Tỉnh / Thành phố</label> 
                                          <div class="box-input__line"></div> 
                                  </div>
                                  <div class="box-input"> 
                                        <input type="search" id="box-select-district" placeholder="" autocomplete="off" class="box-input__main">
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
                                    <input id="box-select-ward" type="search" placeholder="" autocomplete="off" class="box-input__main">
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
                                    <input id="box-select-address" type="text" placeholder="Địa chỉ" maxlength="1000" autocomplete="off" class="box-input__main" fdprocessedid="p3ho0i">
                                    <label for="box-select-address" class="email-label">Địa chỉ</label>
                                    <div class="box-input__line"></div>
                                  </div>
                                </div>
                                <?php if(isset($_SESSION['user_id'])) {
                                    echo <<<HTML
                                <div style=" margin-bottom: 10px;">
                                    <button type="button" class="site-btn" id="selectAddress" style="padding: 10px 20px; font-size: 14px;">Chọn địa chỉ</button>
                                </div>
                                HTML;
                                }
                                ?>
                        <div class="checkout__input__checkbox">
                            <label for="diff-acc">
                                Ghi chú về đơn hàng, ví dụ như ghi chú đặc biệt cho việc giao hàng
                                <input type="checkbox" id="diff-acc">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        
                        <div class="checkout__input">
                            <p>Ghi chú đơn hàng<span>*<span><p>
                            <input type="text" placeholder="Ghi chú về đơn hàng, ví dụ như ghi chú đặc biệt cho việc giao hàng.">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4 class="order__title">Đơn Hàng Của Bạn</h4>
                            <div class="checkout__order__products">Sản Phẩm <span>Tổng Cộng</span></div>
                            <ul class="checkout__total__products">
                                <li>01. Vanilla salted caramel <span>$ 300.0</span></li>
                                <li>02. German chocolate <span>$ 170.0</span></li>
                                <li>03. Sweet autumn <span>$ 170.0</span></li>
                                <li>04. Gluten free mini dozen <span>$ 110.0</span></li>
                            </ul>
                            <ul class="checkout__total__all">
                                <li>Tổng Tạm Tính <span>$750.99</span></li>
                                <li>Tổng Cộng <span>$750.99</span></li>
                            </ul>
                            <div class="checkout__input__checkbox">
                                <label for="acc-or">
                                    Tạo tài khoản?
                                    <input type="checkbox" id="acc-or">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <div class="checkout__input__checkbox">
                                <label for="payment">
                                    Thanh Toán Khi Nhận Hàng
                                    <input type="checkbox" id="payment">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="paypal">
                                    Thanh Toán PayPal
                                    <input type="checkbox" id="paypal">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button type="submit" class="site-btn">ĐẶT HÀNG</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
