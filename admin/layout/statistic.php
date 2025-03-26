<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='../images/logo.png' rel='icon' type='image/x-icon' />
    <link rel="stylesheet" href="../css/admin-responsive.css">
    <link rel="stylesheet" href="../css/toast-message.css">
    <link href="../fonts/font-awesome-pro-v6-6.2.0/css/all.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../css/admin.css">
    <title>Quản lý cửa hàng</title>

    <style>
        #customer-statistical {             /* Sử dụng Flexbox */
        justify-content: center;    /* Căn giữa theo chiều ngang */
        align-items: center;
        text-align: center;        /* Căn giữa theo chiều dọc */ 
        }
    </style>
</head>

<body>
    <header class="header">
        <button class="menu-icon-btn">
            <div class="menu-icon">
                <i class="fa-regular fa-bars"></i>
            </div>
        </button>
    </header>
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
                    <li class="sidebar-list-item tab-content">
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
                    <li class="sidebar-list-item tab-content active">
                        <a href="#" class="sidebar-link">
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
            <!-- Order  -->
                <!-- <div class="table">
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
            </div> -->
            <div class="section active">
                <div class="admin-control">
                    <div class="admin-control-left">
                        <select name="the-loai-tk" id="the-loai-tk" onchange="">
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
                            <span class="search-btn"><i class="fa-light fa-magnifying-glass" onclick="reloadPage()"></i></span>
                            <input id="form-search-tk" type="text" class="form-search-input" placeholder="Tìm kiếm tên món..." oninput="">
                        </form>
                    </div>
                    <div class="admin-control-right">
                        <form action="" class="fillter-date">
                            <div>
                                <label for="time-start">Từ</label>
                                <input type="date" class="form-control-date" id="time-start-tk" onchange="">
                            </div>
                            <div>
                                <label for="time-end">Đến</label>
                                <input type="date" class="form-control-date" id="time-end-tk" onchange="">
                            </div>
                        </form> 
                        <button class="btn-reset-order" onclick="reloadPage()"><i class="fa-regular fa-arrow-up-short-wide"></i></i></button>
                        <button class="btn-reset-order" onclick="reloadPage()"><i class="fa-regular fa-arrow-down-wide-short"></i></button>
                        <button class="btn-reset-order" onclick="reloadPage()"><i class="fa-light fa-arrow-rotate-right"></i></button>                    
                    </div>
                </div>
                <div class="order-statistical" id="order-statistical">
                    <div class="order-statistical-item">
                        <div class="order-statistical-item-content">
                            <p class="order-statistical-item-content-desc">Sản phẩm được bán ra</p>
                            <h4 class="order-statistical-item-content-h" id="quantity-product">20</h4>
                        </div>
                        <div class="order-statistical-item-icon">
                            <i class="fa-light fa-salad"></i>
                        </div>
                    </div>
                    <div class="order-statistical-item">
                        <div class="order-statistical-item-content">
                            <p class="order-statistical-item-content-desc">Số lượng bán ra</p>
                            <h4 class="order-statistical-item-content-h" id="quantity-order">20</h4>
                        </div>
                        <div class="order-statistical-item-icon">
                            <i class="fa-light fa-file-lines"></i>
                        </div>
                    </div>
                    <div class="order-statistical-item">
                        <div class="order-statistical-item-content">
                            <p class="order-statistical-item-content-desc">Doanh thu</p>
                            <h4 class="order-statistical-item-content-h" id="quantity-sale">500.000&nbsp;₫</h4>
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
                            <tbody id="showTk">
                                <tr>
                                <td>1</td>
                                <td><div class="prod-img-title"><img class="prd-img-tbl" src="../images/trasuaoolong.png" alt=""><p>Trà Sữa Oolong</p></div></td>
                                <td>5</td>
                                <td>245.000&nbsp;₫</td>
                                <td><button class="btn-detail product-order-detail" data-id="1" onclick="window.location.href='bill.html'"><i class="fa-regular fa-eye"></i> Chi tiết</button></td>
                                </tr>      
                                
                                <tr>
                                <td>2</td>
                                <td><div class="prod-img-title"><img class="prd-img-tbl" src="../images/frostymatcha.png" alt=""><p>Frosty Matcha</p></div></td>
                                <td>3</td>
                                <td>180.000 &nbsp;₫</td>
                                <td><button class="btn-detail product-order-detail" data-id="2" onclick="window.location.href='bill.html'"><i class="fa-regular fa-eye"></i> Chi tiết</button></td>
                                </tr>      
                                
                                <tr>
                                <td>3</td>
                                <td><div class="prod-img-title"><img class="prd-img-tbl" src="../images/bacxiu.png" alt=""><p>Bạc Xỉu</p></div></td>
                                <td>2</td>
                                <td>78.000&nbsp;₫</td>
                                <td><button class="btn-detail product-order-detail" data-id="3" onclick="window.location.href='bill.html'"><i class="fa-regular fa-eye"></i> Chi tiết</button></td>
                                </tr>      
                                
                                <tr>
                                <td>4</td>
                                <td><div class="prod-img-title"><img class="prd-img-tbl" src="../images/banhgau.png" alt=""><p>Bánh Gấu Chocolate</p></div></td>
                                <td>2</td>
                                <td>38.000&nbsp;₫</td>
                                <td><button class="btn-detail product-order-detail" data-id="4" onclick="window.location.href='bill.html'"><i class="fa-regular fa-eye"></i> Chi tiết</button></a></td>
                                </tr>      
                                
                                <tr>
                                <td>5</td>
                                <td><div class="prod-img-title"><img class="prd-img-tbl" src="../images/tradaocamsa.png" alt=""><p>Trà đào cam sả</p></div></td>
                                <td>1</td>
                                <td>39.000&nbsp;₫</td>
                                <td><button class="btn-detail product-order-detail" data-id="5" onclick="window.location.href='bill.html'"><i class="fa-regular fa-eye"></i> Chi tiết</button></td>
                                </tr>      
                                </tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="page-nav">
                <ul class="page-nav-list">
                    <li class="page-nav-item active">
                        <a href="statistic.html">1</a>
                    </li>
                    <li class="page-nav-item">
                        <a href="statistic2.html">2</a>
                    </li>
                    <li class="page-nav-item">
                        <a href="statistic3.html">3</a>
                    </li>
                </ul>
            </div>
            
            <!-- <br/>
            <br/>
            <div class="table">
                <table width="100%">
                    <thead>
                        <tr>
                            <td>STT</td>
                            <td>Tên khách hàng</td>
                            <td>Số lượng đơn</td>
                            <td>Doanh thu</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody id="showTk">
                        <tbody id="showTk">
                            <tr>
                            <td>1</td>
                            <td><p>Nguyễn Văn A</p></td>
                            <td>20</td>
                            <td>1.000.000&nbsp;₫</td>
                            <td><button class="btn-detail product-order-detail" data-id="1"><a href="order.html" style="color: inherit; text-decoration: none"><i class="fa-regular fa-eye"></i> Chi tiết</button></a></td>
                            </tr>      
                            
                            <tr>
                            <td>2</td>
                            <td><p>Nguyễn Văn Tèo</p></td>
                            <td>12</td>
                            <td>800.000&nbsp;₫</td>
                            <td><button class="btn-detail product-order-detail" data-id="1"><a href="order.html" style="color: inherit; text-decoration: none"><i class="fa-regular fa-eye"></i> Chi tiết</button></a></td>
                            </tr>   
                            </tbody>
                    </tbody>
                </table>
            </div>
        </div> -->
        
        </main>
    </div>
    </div>
    </div>
    </div>
    <div id="toast"></div>
    <!-- <script src="js/admin.js"></script>
    <script src="js/toast-message.js"></script> -->

    <script>
    function reloadPage() {
        location.reload();
    }
    </script>
</body>
</html>