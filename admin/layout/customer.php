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
        .status-checkbox {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    width: 20px;
    height: 20px;
    border: 2px solid #ccc;
    border-radius: 4px;
    position: relative;
    cursor: pointer;
    background-color: #fff;
    transition: all 0.3s ease;
}

/* Màu xanh khi checkbox được tích */
.status-checkbox:checked {
    border-color: #4CAF50; /* Màu xanh khi checkbox được chọn */
    background-color: #4CAF50;
}

/* Tạo hiệu ứng dấu tích khi checkbox được chọn */
.status-checkbox:checked::before {
    content: '';
    position: absolute;
    left: 5px;
    top: 1px;
    width: 8px;
    height: 12px;
    border: solid white;
    border-width: 0 3px 3px 0;
    transform: rotate(45deg);
}

/* Hiệu ứng hover khi di chuột qua checkbox */
.status-checkbox:hover {
    border-color: #4CAF50;
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
                    <li class="sidebar-list-item tab-content active">
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
            <!-- Product  -->
            <!-- Account  -->
            <div class="section active">
                <div class="admin-control">
                    <div class="admin-control-left">
                        <select name="tinh-trang-user" id="tinh-trang-user" onchange="">
                            <option value="2">Tất cả</option>
                            <option value="1">Hoạt động</option>
                            <option value="0">Bị khóa</option>
                        </select>
                    </div>
                    <div class="admin-control-center">
                        <form action="" class="form-search">
                            <span class="search-btn"><i class="fa-light fa-magnifying-glass" onclick="reloadPage()"></i></span>
                            <input id="form-search-user" type="text" class="form-search-input" placeholder="Tìm kiếm khách hàng..." oninput="">
                        </form>
                    </div>
                    <div class="admin-control-right">
                        <form action="" class="fillter-date">
                            <div>
                                <label for="time-start">Từ</label>
                                <input type="date" class="form-control-date" id="time-start-user" onchange="">
                            </div>
                            <div>
                                <label for="time-end">Đến</label>
                                <input type="date" class="form-control-date" id="time-end-user" onchange="">
                            </div>
                        </form>      
                        <button class="btn-reset-order" onclick="reloadPage()"><i class="fa-light fa-arrow-rotate-right"></i></button>     
                        <button id="btn-add-user" class="btn-control-large" onclick="addAccount()"><i class="fa-light fa-plus"></i> <span>Thêm khách hàng</span></button>          
                    </div>
                </div>
                <div class="table">
                    <table width="100%">
                        <thead>
                            <tr>
                                <td>STT</td>
                                <td>Họ và tên</td>
                                <td>Liên hệ</td>
                                <td>Địa chỉ</td>
                                <td>Email</td>
                                <td>Tình trạng</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody id="show-user">
                            <tr>
                                <td>1</td>
                                <td>Nguyễn Văn A</td>
                                <td>0934123456</td>
                                <td>273 An Dương Vương, Phường 3, Quận 5</td>
                                <td>sgu123@gmail.com</td>
                                <td><input type="checkbox" class="status-checkbox" id="status-checkbox-1" checked></td>
                                <td class="control control-table">
                                <button class="btn-edit" id="edit-account" onclick="editAccount()"><i class="fa-light fa-pen-to-square"></i></button>
                                <button class="btn-delete" id="delete-account" onclick="confirmDelete()"><i class="fa-regular fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Nguyễn Thị Bưởi</td>
                                <td>1234567890</td>
                                <td>273 An Dương Vương, Phường 3, Quận 5</td>
                                <td>sgu123@gmail.com</td>
                                <td><input type="checkbox" class="status-checkbox" id="status-checkbox-2"  checked></td>
                                <td class="control control-table">
                                <button class="btn-edit" id="edit-account" onclick="editAccount()"><i class="fa-light fa-pen-to-square"></i></button>
                                <button class="btn-delete" id="delete-account" onclick="confirmDelete()"><i class="fa-regular fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Nguyễn Văn Tèo</td>
                                <td>9874563210</td>
                                <td>273 An Dương Vương, Phường 3, Quận 5</td>
                                <td>sgu123@gmail.com</td>
                                <td><input type="checkbox" class="status-checkbox" id="status-checkbox-3"></td>
                                <td class="control control-table">
                                <button class="btn-edit" id="edit-account" onclick="editAccount()"><i class="fa-light fa-pen-to-square"></i></button>
                                <button class="btn-delete" id="delete-account" onclick="confirmDelete()"><i class="fa-regular fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Trần Văn B</td>
                                <td>1233214560</td>
                                <td>273 An Dương Vương, Phường 3, Quận 5</td>
                                <td>sgu123@gmail.com</td>
                                <td><input type="checkbox" class="status-checkbox" id="status-checkbox-4" checked></td>
                                <td class="control control-table">
                                <button class="btn-edit" id="edit-account" onclick="editAccount()"><i class="fa-light fa-pen-to-square"></i></button>
                                <button class="btn-delete" id="delete-account" onclick="confirmDelete()"><i class="fa-regular fa-trash"></i></button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div> 
            <div class="page-nav">
                <ul class="page-nav-list">
                    <li class="page-nav-item active">
                        <a href="customer.html">1</a>
                    </li>
                    <li class="page-nav-item">
                        <a href="customer2.html">2</a>
                    </li>
                    <li class="page-nav-item">
                        <a href="customer3.html">3</a>
                    </li>
                </ul>
            </div> 
        </main>
    <!-- <div class="modal signup">
        <div class="modal-container">
            <h3 class="modal-container-title add-account-e">THÊM KHÁCH HÀNG MỚI</h3>
            <h3 class="modal-container-title edit-account-e">CHỈNH SỬA THÔNG TIN</h3>
            <button class="modal-close"><i class="fa-regular fa-xmark"></i></button>
            <div class="form-content sign-up">
                <form action="" class="signup-form">
                    <div class="form-group">
                        <label for="fullname" class="form-label">Tên đầy đủ</label>
                        <input id="fullname" name="fullname" type="text" placeholder="VD: Nguyễn Văn A" class="form-control">
                        <span class="form-message-name form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input id="phone" name="phone" type="text" placeholder="Nhập số điện thoại" class="form-control">
                        <span class="form-message-phone form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input id="password" name="password" type="text" placeholder="Nhập mật khẩu" class="form-control">
                        <span class="form-message-password form-message"></span>
                    </div>   
                    <div class="form-group edit-account-e">
                        <label for="" class="form-label">Trạng thái</label>
                        <input type="checkbox" id="user-status" class="switch-input">
                        <label for="user-status" class="switch"></label>
                    </div>
                    <button class="form-submit add-account-e" id="signup-button">Đăng ký</button>
                    <button class="form-submit edit-account-e" id="btn-update-account"><i class="fa-regular fa-floppy-disk"></i> Lưu thông tin</button>
                </form>
            </div>
        </div>
    </div>  -->
    </div>
    <div id="toast"></div>
    <!-- <script src="js/admin.js"></script>
    <script src="js/toast-message.js"></script> -->
    <script>
    function reloadPage() {
        location.reload();
     }

    function confirmDelete() 
    {
        confirm("Bạn có chắc muốn xóa khách hàng này?");
        if(confirm)
            alert("Xóa khách hàng thành công !");
            location.reload();
    }

    function editAccount()
    {
        window.location.href ="editUser.html";
    }

    function addAccount()
    {
        window.location.href ="addUser.html";
    }

    function deleteAccount(userId) {
        var checkbox = document.getElementById('status-checkbox-' + userId); // Lấy checkbox theo ID
        if (!checkbox.checked) {
            var confirmAction = confirm("Bạn có chắc muốn khóa tài khoản này?");
        } 
        if (confirmAction) {
            // Tiến hành xóa hoặc khóa tài khoản
            alert("Khóa tài khoản thành công!");
            location.reload(); // Tải lại trang sau khi xóa
        }
    }
    </script>
</body>
</html>