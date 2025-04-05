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
                                                        value="<?= isset($_SESSION['UserName']) ? htmlspecialchars($_SESSION['UserName']) : '' ?>">
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
                                                            <input id="FullName" name="FullName" placeholder="Họ và tên" type="text" fdprocessedid="mgj7zg">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="profile-account__custom-form__group">
                                            <div class="profile-account__custom-form__items">
                                                <div class="profile-account__custom-form__label">
                                                    <label>Email</label>
                                                </div>
                                                <div class="profile-account__custom-form__form">
                                                    <div class="input-with-validator-wrapper">
                                                        <div class="input-with-validator">
                                                            <input id="Email" name="Email" placeholder="Email" type="email" fdprocessedid="5wdl6">
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
                                                            <input id="Phone" name="Phone" placeholder="Số điện thoại" required="true" type="tel" value="" fdprocessedid="pcxjip">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="profile-account__custom-form__group">
                                            <div class="profile-account__custom-form__items">
                                                <div class="profile-account__custom-form__label">
                                                    <label>Giới tính</label>
                                                </div>
                                                <div class="profile-account__custom-form__form">
                                                    <input id="Gender" name="Gender" type="hidden" value="">
                                                    <div class="stardust-radio-group-inline">
                                                        <div class="stardust-radio-group" role="radiogroup" data-trigger-value="#Gender">
                                                            <div class="stardust-radio" tabindex="0" role="radio" aria-checked="false" data-value="1">
                                                                <div class="stardust-radio-button ">
                                                                    <div class="stardust-radio-button__outer-circle">
                                                                        <div class="stardust-radio-button__inner-circle">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="stardust-radio__content">
                                                                    <div class="stardust-radio__label">
                                                                        Nam
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="stardust-radio" tabindex="0" role="radio" aria-checked="false" data-value="0">
                                                                <div class="stardust-radio-button ">
                                                                    <div class="stardust-radio-button__outer-circle">
                                                                        <div class="stardust-radio-button__inner-circle">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="stardust-radio__content">
                                                                    <div class="stardust-radio__label">
                                                                        Nữ
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="stardust-radio" tabindex="0" role="radio" aria-checked="false" data-value="2">
                                                                <div class="stardust-radio-button ">
                                                                    <div class="stardust-radio-button__outer-circle">
                                                                        <div class="stardust-radio-button__inner-circle">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="stardust-radio__content">
                                                                    <div class="stardust-radio__label">
                                                                        Khác
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="profile-account__custom-form__group">
                                            <div class="profile-account__custom-form__items">
                                                <div class="profile-account__custom-form__label">
                                                    <label>Ngày sinh</label>
                                                </div>
                                                <div class="profile-account__custom-form__form">
                                                    <div class="profile-account__custom-form__form-select-flex">
                                                        <div class="input-outer">
                                                            <select class="input-item local-store-adress" id="Day" name="Day" fdprocessedid="uo9i7"><option value=""></option>
<option selected="selected" value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
                                                            <i class="mwc-icon-angle-down"></i>
                                                        </div>
                                                        <div class="input-outer">
                                                            <select class="input-item local-store-adress" id="Month" name="Month" fdprocessedid="f1fx73"><option value=""></option>
<option selected="selected" value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>
                                                            <i class="mwc-icon-angle-down"></i>
                                                        </div>
                                                        <div class="input-outer">
                                                            <select class="input-item local-store-adress" id="Year" name="Year" fdprocessedid="zglh7f"><option value=""></option>
<option selected="selected" value="2025">2025</option>
<option value="2024">2024</option>
<option value="2023">2023</option>
<option value="2022">2022</option>
<option value="2021">2021</option>
<option value="2020">2020</option>
<option value="2019">2019</option>
<option value="2018">2018</option>
<option value="2017">2017</option>
<option value="2016">2016</option>
<option value="2015">2015</option>
<option value="2014">2014</option>
<option value="2013">2013</option>
<option value="2012">2012</option>
<option value="2011">2011</option>
<option value="2010">2010</option>
<option value="2009">2009</option>
<option value="2008">2008</option>
<option value="2007">2007</option>
<option value="2006">2006</option>
<option value="2005">2005</option>
<option value="2004">2004</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
<option value="1979">1979</option>
<option value="1978">1978</option>
<option value="1977">1977</option>
<option value="1976">1976</option>
<option value="1975">1975</option>
<option value="1974">1974</option>
<option value="1973">1973</option>
<option value="1972">1972</option>
<option value="1971">1971</option>
<option value="1970">1970</option>
<option value="1969">1969</option>
<option value="1968">1968</option>
<option value="1967">1967</option>
<option value="1966">1966</option>
<option value="1965">1965</option>
<option value="1964">1964</option>
<option value="1963">1963</option>
<option value="1962">1962</option>
<option value="1961">1961</option>
<option value="1960">1960</option>
<option value="1959">1959</option>
<option value="1958">1958</option>
<option value="1957">1957</option>
<option value="1956">1956</option>
<option value="1955">1955</option>
<option value="1954">1954</option>
<option value="1953">1953</option>
<option value="1952">1952</option>
<option value="1951">1951</option>
<option value="1950">1950</option>
<option value="1949">1949</option>
<option value="1948">1948</option>
<option value="1947">1947</option>
<option value="1946">1946</option>
<option value="1945">1945</option>
<option value="1944">1944</option>
<option value="1943">1943</option>
<option value="1942">1942</option>
<option value="1941">1941</option>
<option value="1940">1940</option>
<option value="1939">1939</option>
<option value="1938">1938</option>
<option value="1937">1937</option>
<option value="1936">1936</option>
<option value="1935">1935</option>
<option value="1934">1934</option>
<option value="1933">1933</option>
<option value="1932">1932</option>
<option value="1931">1931</option>
<option value="1930">1930</option>
<option value="1929">1929</option>
<option value="1928">1928</option>
<option value="1927">1927</option>
<option value="1926">1926</option>
<option value="1925">1925</option>
<option value="1924">1924</option>
<option value="1923">1923</option>
<option value="1922">1922</option>
<option value="1921">1921</option>
<option value="1920">1920</option>
<option value="1919">1919</option>
<option value="1918">1918</option>
<option value="1917">1917</option>
<option value="1916">1916</option>
<option value="1915">1915</option>
<option value="1914">1914</option>
<option value="1913">1913</option>
<option value="1912">1912</option>
<option value="1911">1911</option>
<option value="1910">1910</option>
<option value="1909">1909</option>
<option value="1908">1908</option>
<option value="1907">1907</option>
<option value="1906">1906</option>
<option value="1905">1905</option>
<option value="1904">1904</option>
<option value="1903">1903</option>
<option value="1902">1902</option>
<option value="1901">1901</option>
<option value="1900">1900</option>
<option value="1899">1899</option>
<option value="1898">1898</option>
<option value="1897">1897</option>
<option value="1896">1896</option>
<option value="1895">1895</option>
<option value="1894">1894</option>
<option value="1893">1893</option>
<option value="1892">1892</option>
<option value="1891">1891</option>
<option value="1890">1890</option>
<option value="1889">1889</option>
<option value="1888">1888</option>
<option value="1887">1887</option>
<option value="1886">1886</option>
<option value="1885">1885</option>
<option value="1884">1884</option>
<option value="1883">1883</option>
<option value="1882">1882</option>
<option value="1881">1881</option>
<option value="1880">1880</option>
<option value="1879">1879</option>
<option value="1878">1878</option>
<option value="1877">1877</option>
<option value="1876">1876</option>
<option value="1875">1875</option>
</select>
                                                            <i class="mwc-icon-angle-down"></i>
                                                        </div>
                                                    </div>
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
                                    <input id="box-select-address" type="text" placeholder="" maxlength="1000" autocomplete="off" class="box-input__main" fdprocessedid="p3ho0i">
                                    <label for="box-select-address" class="email-label">Địa chỉ</label>
                                    <div class="box-input__line"></div>
                                  </div>
                                </div>
                                
                                        <div class="profile-account__custom-form__footer">
                                            <input data-val="true" data-val-required="The Id field is required." id="Id" name="Id" type="hidden" value="295115">
                                            <button type="submit" class="btn btn-solid-primary btn--m btn--inline" aria-disabled="false" fdprocessedid="seh2b" id= "save-button">
                                                Lưu
                                            </button>
                                        </div>

                                    </div>
                                    <div class="profile-main__account-body__right">
                                        <div class="profile-main__account-body__right-avatar">
                                            <div class="profile-main__account-body__right-avatar__thumb">
                                                <div class="profile-main__account-body__right-avatar__img" style="background-color: #f5f5f5;">
                                                        <img class="shopee-avatar__img" src="./img/logo.png" id="avatar">


                                                </div>
                                            </div>
                                            <input id="fileImport" name="file" type="file" accept=".jpg,.jpeg,.png">
                                            <button type="button" data-btn-file-trigger="#fileImport" class="btn btn-light btn--m btn--inline" fdprocessedid="xmn87y">
                                                Chọn ảnh
                                            </button>
                                            <div class="profile-account__upload-note">
                                                <div class="profile-account__upload-note__item">
                                                    Dụng lượng
                                                    file tối đa 1 MB
                                                </div>
                                                <div class="profile-account__upload-note__item">
                                                    Định
                                                    dạng:.JPEG, .PNG
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