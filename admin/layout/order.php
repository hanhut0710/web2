<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='../images/logo.png' rel='icon' type='image/x-icon' />
    <link rel="stylesheet" href="../css/admin-responsive.css">
    <link rel="stylesheet" href="../css/toast-message.css">
    <link href="../fonts/font-awesome-pro-v6-6.2.0/css/all.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../css/admin.css">
    <title>Quản lý cửa hàng</title>
</head>

<body>
    <div class="container">
        <!-- Side bar -->
        <aside class="sidebar open">
            <div class="top-sidebar">
                <a href="#" class="channel-logo"><img src="../images/logo.png" alt="Lucy Coffe Logo"></a>
                <div class="hidden-sidebar your-channel"><img src="../images/lucy.png" style="height: 30px;" alt="">
                </div>
            </div>
            <div class="middle-sidebar">
                <ul class="sidebar-list">
                    <li class="sidebar-list-item tab-content">
                        <a href="./admin.html" class="sidebar-link">
                            <div class="sidebar-icon"><i class="fa fa-home" aria-hidden="true"></i></div>
                            <div class="hidden-sidebar">Trang tổng quan</div>
                        </a>
                    </li>
                    <li class="sidebar-list-item tab-content">
                        <a href="./adminProduct1.html" class="sidebar-link">
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
                    <li class="sidebar-list-item tab-content active">
                        <a href="./order.html" class="sidebar-link">
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
        <!-- Admin control -->
        <main class="content">
            <div class="section active">
                <div class="admin-control">
                    <div class="admin-control-left">
                        <select name="tinh-trang" id="tinh-trang" onchange="">
                            <option value="4">Tất cả</option>
                            <option value="1">Đã xử lý</option>
                            <option value="0">Chưa xử lý</option>
                            <option value="2">Đã giao hàng</option>
                            <option value="3">Đã hủy đơn</option>
                        </select>
                        <select name="tinh-trang" id="tinh-trang" onchange="">
                            <option disabled selected>Chọn quận</option>
                            <option >Quận 1</option>
                            <option >Quận 2</option>
                            <option >Quận 3</option>
                            <option >Quận 4</option>
                            <option >Quận 5</option>
                            <option >Quận 6</option>
                            <option >Quận 7</option>
                            <option >Quận 8</option>
                            <option >Quận Tân Bình</option>
                            <option >Quận Bình Thạnh</option>
                            <option >Quận Phú Nhuận</option>
                        </select>
                    </div>
                    <div class="admin-control-center">
                        <form action="" class="form-search">
                            <span class="search-btn"><a href="order.html"><i class="fa-light fa-magnifying-glass"></a></i></span>
                            <input id="form-search-order" type="text" class="form-search-input"
                                placeholder="Tìm kiếm mã đơn, khách hàng...">
                        </form>
                    </div>
                    <div class="admin-control-right">
                        <form action="" class="fillter-date">
                            <div>
                                <label for="time-start">Từ</label>
                                <input type="date" class="form-control-date" id="time-start">
                            </div>
                            <div>
                                <label for="time-end">Đến</label>
                                <input type="date" class="form-control-date" id="time-end">
                            </div>
                        </form>
                        <button class="btn-reset-order" onclick="location.href='order.html'"><i
                                class="fa-light fa-arrow-rotate-right"></i></button>
                    </div>
                </div>
                <div class="table">
                    <table width="100%">
                        <thead>
                            <tr>
                                <td>Mã đơn</td>
                                <td>Khách hàng</td>
                                <td>Địa chỉ</td>
                                <td>Ngày đặt</td>
                                <td>Tổng tiền</td>
                                <td>Trạng thái</td>
                                <td>Thao tác</td>
                            </tr>
                        </thead>
                        <tbody id="showOrder">
                            <!-- 1 -->
                            <tr>
                                <td>DH1</td>
                                <td>Trần Văn B</td>
                                <td>273 An Dương Vương, phường 3, quận 5, TPHCM</td>
                                <td>07/12/2024</td>
                                <td>49.000 ₫</td>
                                <td>
                                    <span class="status-no-complete">Chưa xử lý</span>
                                </td>
                                <td class="control">
                                    <button class="btn-detail" id="" onclick="location.href='orderDetails.html'"><i
                                            class="fa-regular fa-eye"></i> Chi tiết</button>
                                </td>
                            </tr>
                            
                            <!-- 2 -->
                            <tr>
                                <td>DH2</td>
                                <td>Trần Văn B</td>
                                <td>273 An Dương Vương, phường 3, quận 5, TPHCM</td>
                                <td>07/12/2024</td>
                                <td>49.000 ₫</td>
                                <td>
                                    <span class="status-complete">Đã xử lý</span>
                                </td>
                                <td class="control">
                                    <button class="btn-detail" id="" onclick="location.href='orderDetails.html'"><i
                                            class="fa-regular fa-eye"></i> Chi tiết</button>
                                </td>
                            </tr>

                            <!-- 3 -->
                            <tr>
                                <td>DH3</td>
                                <td>Trần Văn B</td>
                                <td>273 An Dương Vương, phường 3, quận 5, TPHCM</td>
                                <td>07/12/2024</td>
                                <td>49.000 ₫</td>
                                <td>
                                    <span class="status-complete">Đã xử lý</span>
                                </td>
                                <td class="control">
                                    <button class="btn-detail" id="" onclick="location.href='orderDetails.html'"><i
                                            class="fa-regular fa-eye"></i> Chi tiết</button>
                                </td>
                            </tr>

                            <tr>
                                <!-- 4 -->
                                <td>DH4</td>
                                <td>Trần Văn B</td>
                                <td>273 An Dương Vương, phường 3, quận 5, TPHCM</td>
                                <td>07/12/2024</td>
                                <td>49.000 ₫</td>
                                <td>
                                    <span class="status-no-complete">Đã hủy đơn</span>
                                </td>
                                <td class="control">
                                    <button class="btn-detail" id="" onclick="location.href='orderDetails.html'"><i
                                            class="fa-regular fa-eye"></i> Chi tiết</button>
                                </td>
                            </tr>
                            
                            <!-- 5 -->
                            <tr>
                                <td>DH5</td>
                                <td>Trần Văn B</td>
                                <td>273 An Dương Vương, phường 3, quận 5, TPHCM</td>
                                <td>07/12/2024</td>
                                <td>49.000 ₫</td>
                                <td>
                                    <span class="status-no-complete">Đã hủy đơn</span>
                                </td>
                                <td class="control">
                                    <button class="btn-detail" id="" onclick="location.href='orderDetails.html'"><i
                                            class="fa-regular fa-eye"></i> Chi tiết</button>
                                </td>
                            </tr>

                            <!-- 6 -->
                            <tr>
                                <td>DH6</td>
                                <td>Trần Văn B</td>
                                <td>273 An Dương Vương, phường 3, quận 5, TPHCM</td>
                                <td>07/12/2024</td>
                                <td>49.000 ₫</td>
                                <td>
                                    <span class="status-complete">Đã giao hàng</span>
                                </td>
                                <td class="control">
                                    <button class="btn-detail" id="" onclick="location.href='orderDetails.html'"><i
                                            class="fa-regular fa-eye"></i> Chi tiết</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>



                <!-- page nav  -->
                <div class="page-nav">
                    <ul class="page-nav-list">
                        <li class="page-nav-item active">
                            <a href="#">1</a>
                        </li>
                        <li class="page-nav-item">
                            <a href="order2.html">2</a>
                        </li>
                    </ul>
                </div>
        </main>
    </div>





    <!-- JavaScripts -->

</body>

</html>