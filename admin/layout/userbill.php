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
    <link rel="stylesheet" href="../../css/admin.css">
    <title>Quản lý cửa hàng</title>

    <style>
        /* Các phần tử chung */
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        /* Thông tin chi tiết khách hàng */
        .customer-info {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .customer-info h2 {
            margin-bottom: 10px;
        }

        .customer-info p {
            margin: 3px 0;
            line-height: 1.3;
        }

        /* Thông tin đơn hàng */
        .order-details {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 8px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-align: center;
        }

        td {
            text-align: left;
        }


        .view-details-btn {
            font-size: 14px;
            background-color: #Ffffff;
        }
        /* Tổng cộng */
        .total {
            text-align: right;
            margin-top: 20px;
            margin-right: 20px;
        }

        /* Responsive cho màn hình nhỏ hơn 768px */
        @media (max-width: 768px) {
            /* Thông tin khách hàng */
            .customer-info img.product-image {
                width: 70%;
            }

            table {
                font-size: 14px;
            }

            th,
            td {
                padding: 6px;
            }

            td {
                word-wrap: break-word;
            }

            .order-details table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }

            .total {
                margin-right: 10px;
                font-size: 14px;
            }
        }

        /* Responsive cho màn hình nhỏ hơn 480px */
        @media (max-width: 480px) {
            .customer-info img.product-image {
                width: 80%;
            }

            .customer-info p {
                font-size: 14px;
            }

            table {
                font-size: 12px;
            }

            th,
            td {
                padding: 4px;
            }

            .total {
                font-size: 12px;
                margin-right: 5px;
            }
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
                    <li class="sidebar-list-item tab-content">
                        <a href="statistic.html" class="sidebar-link">
                            <div class="sidebar-icon"><i class="fa fa-bar-chart" aria-hidden="true"></i></div>
                            <div class="hidden-sidebar">Thống kê sản phẩm</div>
                        </a>
                    </li>
                    <li class="sidebar-list-item tab-content active">
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
        
                <!-- Main Content -->
                <main class="content">
                    <!-- Table 1: Thông tin chi tiết khách hàng -->
                    <div class="customer-info">
                        <h2>Thông Tin Chi Tiết Khách Hàng</h2>
                        <p><strong>Tên khách hàng:</strong> Nguyễn Văn A</p>
                        <p><strong>Số điện thoại:</strong> 0934123456</p>
                        <p><strong>Email:</strong> hoangtuech@gmail.com</p>
                        <p><strong>Địa chỉ:</strong> 273 An Dương Vương, Phường 3, Quận 5, TP.HCM</p>
                    </div>
        
                    <!-- Table 2: Thông tin đơn hàng -->
                    <section class="order-details">
                        <h2>Danh Sách Đơn Hàng Đã Đặt</h2>
                        <table border="1" cellspacing="0" cellpadding="8">
                            <thead>
                                <tr>
                                    <th>Mã Đơn Hàng</th>
                                    <th>Ngày Đặt</th>
                                    <th>Tên Sản Phẩm</th>
                                    <th>Số Lượng</th>
                                    <th>Đơn Giá</th>
                                    <th>Thành Tiền</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>DH001</td>
                                    <td>01/12/2024</td>
                                    <td>Bạc Xỉu</td>
                                    <td>30</td>
                                    <td>39.000&nbsp;₫</td>
                                    <td>1.000.000&nbsp;₫</td>
                                    <td><button class="view-details-btn" onclick="window.location.href='orderDetails.html'"><i class="fa-regular fa-eye"></i> Chi tiết</button></td>
                                </tr>
                                <tr>
                                    <td>DH002</td>
                                    <td>02/12/2024</td>
                                    <td>Frosty Chocolate</td>
                                    <td>15</td>
                                    <td>65.000&nbsp;₫</td>
                                    <td>1.200.000&nbsp;₫</td>
                                    <td><button class="view-details-btn" onclick="window.location.href='orderDetails.html'"><i class="fa-regular fa-eye"></i> Chi tiết</button></td>
                                </tr>
                                <tr>
                                    <td>DH003</td>
                                    <td>03/12/2024</td>
                                    <td>Frosty Matcha</td>
                                    <td>10</td>
                                    <td>59.000&nbsp;₫</td>
                                    <td>590.000&nbsp;₫</td>
                                    <td><button class="view-details-btn" onclick="window.location.href='orderDetails.html'"><i class="fa-regular fa-eye"></i> Chi tiết</button></td>
                                </tr>
                                <!-- Thêm các đơn hàng khác tại đây -->
                            </tbody>
                        </table>
                    </section>
        
                    <!-- Tổng cộng -->
                    <div class="total">
                        <p><strong>Tổng cộng: </strong>3.000.000&nbsp;₫</p>
                    </div>
        
                </main>
            </div>
            <div id="toast"></div>
        
    <script>
        function reloadPage() {
            location.reload();
            }
    </script>
</body>
        
</html>
        