<div class="container">
        <aside class="sidebar open">
            <div class="top-sidebar">
                <a href="#" class="channel-logo"><img src="../images/logo.png" alt="Lucy Coffe Logo"></a>
                <div class="hidden-sidebar your-channel"><img src="../images/lucy.png"
                        style="height: 30px;" alt="">
                </div>
            </div>
            <div class="middle-sidebar">
                <ul class="sidebar-list">
                    <li class="sidebar-list-item tab-content active">
                        <a href="admin.html" class="sidebar-link">
                            <div class="sidebar-icon"><i class="fa fa-home" aria-hidden="true"></i></div>
                            <div class="hidden-sidebar">Trang tổng quan</div>
                        </a>
                    </li>
                    <li class="sidebar-list-item tab-content">
                        <a href="adminProduct1.html" class="sidebar-link">
                            <div class="sidebar-icon"><i class="fa-light fa-pot-food"></i></div>
                            <div class="hidden-sidebar">Sản phẩm</div>
                        </a>
                    </li>
                    <li class="sidebar-list-item tab-content">
                        <a href="customer.html" class="sidebar-link">
                            <div class="sidebar-icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                            <div class="hidden-sidebar">Khách hàng</div>
                        </a>
                    </li>
                    <li class="sidebar-list-item tab-content">
                        <a href="order.html" class="sidebar-link">
                            <div class="sidebar-icon"><i class="fa fa-shopping-basket" aria-hidden="true"></i></div>
                            <div class="hidden-sidebar">Đơn hàng</div>
                        </a>
                    </li>
                    <li class="sidebar-list-item tab-content">
                        <a href="statistic.html" class="sidebar-link">
                            <div class="sidebar-icon"><i class="fa fa-bar-chart" aria-hidden="true"></i></div>
                            <div class="hidden-sidebar">Thống kê sản phẩm</div>
                        </a>
                    </li>
                    <li class="sidebar-list-item tab-content">
                        <a href="statisticCustomer.html" class="sidebar-link">
                            <div class="sidebar-icon"><i class="fa-solid fa-square-poll-vertical"></i></div>
                            <div class="hidden-sidebar">Thống kê khách hàng</div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="bottom-sidebar">
                <ul class="sidebar-list">
                    <li class="sidebar-list-item user-logout">
                        <a href="../index.html" class="sidebar-link">
                            <div class="sidebar-icon"><i class="fa-solid fa-house"></i></div>
                            <div class="hidden-sidebar">Trang chủ</div>
                        </a>
                    </li>
                    <li class="sidebar-list-item user-logout">
                        <a href="admin.html" class="sidebar-link">
                            <div class="sidebar-icon"><i class="fa-light fa-circle-user"></i></div>
                            <div class="hidden-sidebar" id="name-acc">Admin</div>
                        </a>
                    </li>
                    <li class="sidebar-list-item user-logout">
                        <a href="login.html" class="sidebar-link" id="logout-acc">
                            <div class="sidebar-icon"><i class="fa-light fa-arrow-right-from-bracket"></i></div>
                            <div class="hidden-sidebar">Đăng xuất</div>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <main class="content">
            <div class="section active">
                <h1 class="page-title">Trang quản lý cửa hàng Lucy Coffee</h1>
                <div class="cards">
                    <div class="card-single">
                        <div class="box">
                            <h2 id="amount-user">4</h2>
                            <div class="on-box">
                                <img src="../assets/img/admin/s1.png" alt="" style=" width: 200px;">
                                <h3>Khách hàng</h3>
                                <p>Khách hàng mục tiêu là một nhóm đối tượng khách hàng trong phân khúc thị trường mục
                                    tiêu mà doanh nghiệp bạn đang hướng tới.</p>
                            </div>

                        </div>
                    </div>
                    <div class="card-single">
                        <div class="box">
                            <div class="on-box">
                                <img src="assets/img/admin/s2.png" alt="" style=" width: 200px;">
                                <h2 id="amount-product">15</h2>
                                <h3>Sản phẩm</h3>
                                <p>Sản phẩm là bất cứ cái gì có thể đưa vào thị trường để tạo sự chú ý, mua sắm, sử dụng
                                    hay tiêu dùng nhằm thỏa mãn một nhu cầu hay ước muốn. Nó có thể là những vật thể,
                                    dịch vụ, con người, địa điểm, tổ chức hoặc một ý tưởng. </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-single">
                        <div class="box">
                            <h2 id="doanh-thu">500.000 ₫</h2>
                            <div class="on-box">
                                <img src="assets/img/admin/s3.png" alt="" style=" width: 200px;">
                                <h3>Doanh thu</h3>
                                <p>Doanh thu của doanh nghiệp là toàn bộ số tiền sẽ thu được do tiêu thụ sản phẩm, cung
                                    cấp dịch vụ với sản lượng.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product  -->
            <div class="section product-all">
                <div class="admin-control">
                    <div class="admin-control-left">
                        <select name="the-loai" id="the-loai" onchange="showProduct()">
                            <option>Tất cả</option>
                            <option>Cà phê</option>
                            <option>Trà trái cây</option>
                            <option>Trà sữa</option>
                            <option>Đá xay</option>
                            <option>Bánh ngọt</option>
                            <option>Đã xóa</option>
                        </select>
                    </div>
                    <div class="admin-control-center">
                        <form action="" class="form-search">
                            <span class="search-btn"><i class="fa-light fa-magnifying-glass"></i></span>
                            <input id="form-search-product" type="text" class="form-search-input" placeholder="Tìm kiếm tên món..." oninput="showProduct()">
                        </form>
                    </div>
                    <div class="admin-control-right">
                        <button class="btn-control-large" id="btn-cancel-product" onclick="cancelSearchProduct()"><i class="fa-light fa-rotate-right"></i> Làm mới</button>
                        <button class="btn-control-large" id="btn-add-product"><i class="fa-light fa-plus"></i> Thêm món mới</button>                  
                    </div>
                </div>
                <div id="show-product"></div>
                <div class="page-nav">
                    <ul class="page-nav-list">
                    </ul>
                </div>
            </div>
            <!-- Account  -->
            <div class="section">
                <div class="admin-control">
                    <div class="admin-control-left">
                        <select name="tinh-trang-user" id="tinh-trang-user" onchange="showUser()">
                            <option value="2">Tất cả</option>
                            <option value="1">Hoạt động</option>
                            <option value="0">Bị khóa</option>
                        </select>
                    </div>
                    <div class="admin-control-center">
                        <form action="" class="form-search">
                            <span class="search-btn"><i class="fa-light fa-magnifying-glass"></i></span>
                            <input id="form-search-user" type="text" class="form-search-input" placeholder="Tìm kiếm khách hàng..." oninput="showUser()">
                        </form>
                    </div>
                    <div class="admin-control-right">
                        <form action="" class="fillter-date">
                            <div>
                                <label for="time-start">Từ</label>
                                <input type="date" class="form-control-date" id="time-start-user" onchange="showUser()">
                            </div>
                            <div>
                                <label for="time-end">Đến</label>
                                <input type="date" class="form-control-date" id="time-end-user" onchange="showUser()">
                            </div>
                        </form>      
                        <button class="btn-reset-order" onclick="cancelSearchUser()"><i class="fa-light fa-arrow-rotate-right"></i></button>     
                        <button id="btn-add-user" class="btn-control-large" onclick="openCreateAccount()"><i class="fa-light fa-plus"></i> <span>Thêm khách hàng</span></button>          
                    </div>
                </div>
                <div class="table">
                    <table width="100%">
                        <thead>
                            <tr>
                                <td>STT</td>
                                <td>Họ và tên</td>
                                <td>Liên hệ</td>
                                <td>Ngày tham gia</td>
                                <td>Tình trạng</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody id="show-user">
                        </tbody>
                    </table>
                </div>
                <!-- </div> -->
            </div>
            <!-- Order  -->
            <div class="section">
                <div class="admin-control">
                    <div class="admin-control-left">
                        <select name="tinh-trang" id="tinh-trang" onchange="findOrder()">
                            <option value="4">Tất cả</option>
                            <option value="1">Đã xử lý</option>
                            <option value="0">Chưa xử lý</option>
                            <option value="2">Đã giao hàng</option>
                            <option value="3">Đã hủy đơn</option>
                            <option value="5">Địa chỉ giao hàng theo quận </option>
                        </select>
                    </div>
                    <div class="admin-control-center">
                        <form action="" class="form-search">
                            <span class="search-btn"><i class="fa-light fa-magnifying-glass"></i></span>
                            <input id="form-search-order" type="text" class="form-search-input" placeholder="Tìm kiếm mã đơn, khách hàng..." oninput="findOrder()">
                        </form>
                    </div>
                    <div class="admin-control-right">
                        <form action="" class="fillter-date">
                            <div>
                                <label for="time-start">Từ</label>
                                <input type="date" class="form-control-date" id="time-start" onchange="findOrder()">
                            </div>
                            <div>
                                <label for="time-end">Đến</label>
                                <input type="date" class="form-control-date" id="time-end" onchange="findOrder()">
                            </div>
                        </form>      
                        <button class="btn-reset-order" onclick="cancelSearchOrder()"><i class="fa-light fa-arrow-rotate-right"></i></button>               
                    </div>
                </div>
                <div class="table">
                    <table width="100%">
                        <thead>
                            <tr>
                                <td>Mã đơn</td>
                                <td>Khách hàng</td>
                                <td>Ngày đặt</td>
                                <td>Tổng tiền</td>
                                <td>Trạng thái</td>
                                <td>Thao tác</td>
                            </tr>
                        </thead>
                        <tbody id="showOrder">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="section">
                <div class="admin-control">
                    <div class="admin-control-left">
                        <select name="the-loai-tk" id="the-loai-tk" onchange="thongKe()">
                            <option>Tất cả</option>
                            <option>Cà phê</option>
                            <option>Trà trái cây</option>
                            <option>Trà sữa</option>
                            <option>Đá xay</option>
                            <option>Bánh ngọt</option>
                            <option>Đã xóa</option>
                        </select>
                    </div>
                    <div class="admin-control-center">
                        <form action="" class="form-search">
                            <span class="search-btn"><i class="fa-light fa-magnifying-glass"></i></span>
                            <input id="form-search-tk" type="text" class="form-search-input" placeholder="Tìm kiếm tên món..." oninput="thongKe()">
                        </form>
                    </div>
                    <div class="admin-control-right">
                        <form action="" class="fillter-date">
                            <div>
                                <label for="time-start">Từ</label>
                                <input type="date" class="form-control-date" id="time-start-tk" onchange="thongKe()">
                            </div>
                            <div>
                                <label for="time-end">Đến</label>
                                <input type="date" class="form-control-date" id="time-end-tk" onchange="thongKe()">
                            </div>
                        </form> 
                        <button class="btn-reset-order" onclick="thongKe(1)"><i class="fa-regular fa-arrow-up-short-wide"></i></i></button>
                        <button class="btn-reset-order" onclick="thongKe(2)"><i class="fa-regular fa-arrow-down-wide-short"></i></button>
                        <button class="btn-reset-order" onclick="thongKe(0)"><i class="fa-light fa-arrow-rotate-right"></i></button>                    
                    </div>
                </div>
                <div class="order-statistical" id="order-statistical">
                    <div class="order-statistical-item">
                        <div class="order-statistical-item-content">
                            <p class="order-statistical-item-content-desc">Sản phẩm được bán ra</p>
                            <h4 class="order-statistical-item-content-h" id="quantity-product"></h4>
                        </div>
                        <div class="order-statistical-item-icon">
                            <i class="fa-light fa-salad"></i>
                        </div>
                    </div>
                    <div class="order-statistical-item">
                        <div class="order-statistical-item-content">
                            <p class="order-statistical-item-content-desc">Số lượng bán ra</p>
                            <h4 class="order-statistical-item-content-h" id="quantity-order"></h4>
                        </div>
                        <div class="order-statistical-item-icon">
                            <i class="fa-light fa-file-lines"></i>
                        </div>
                    </div>
                    <div class="order-statistical-item">
                        <div class="order-statistical-item-content">
                            <p class="order-statistical-item-content-desc">Doanh thu</p>
                            <h4 class="order-statistical-item-content-h" id="quantity-sale"></h4>
                        </div>
                        <div class="order-statistical-item-icon">
                            <i class="fa-light fa-dollar-sign"></i>
                        </div>
                    </div>
                </div>
                <div class="table">
                    <table width="100%">
                        <thead>
                            <tr>
                                <td>STT</td>
                                <td>Tên món</td>
                                <td>Số lượng bán</td>
                                <td>Doanh thu</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody id="showTk">
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>