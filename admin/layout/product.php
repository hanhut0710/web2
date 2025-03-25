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
                    <li class="sidebar-list-item tab-content active">
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
        <!-- Admin control -->
        <main class="content">
        <div class="section product-all active">
            <div class="admin-control">
                <div class="admin-control-left">
                    <select name="the-loai" id="the-loai">
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
                        <span class="search-btn"><a href="adminProduct1.html"><i class="fa-light fa-magnifying-glass"></i></a></span>
                        <input id="form-search-product" type="text" class="form-search-input" placeholder="Tìm kiếm tên món...">
                    </form>
                </div>
                <div class="admin-control-right">
                    <button class="btn-control-large" id="btn-cancel-product" onclick="location.href='adminProduct1.html'"><i class="fa-light fa-rotate-right"></i> Làm mới</button>
                    <button class="btn-control-large" id="btn-add-product" onclick="location.href='addProduct.html'"><i class="fa-light fa-plus"></i> Thêm món mới</button>
                </div>
            </div>
            <!-- End of admin control -->

            <!-- List product -->
            <div id="show-product">
                 <!-- Bac xiu -->
                 <div class="list">
                    <div class="list-left">
                        <img src="../images/bacxiu.png" alt="">
                        <div class="list-info">
                            <h4>Bạc Xỉu</h4>
                            <p class="list-note">Bạc sỉu chính là "Ly sữa trắng kèm một chút cà phê". Thức uống này rất phù hợp những ai vừa muốn trải nghiệm chút vị đắng của cà phê vừa muốn thưởng thức vị ngọt béo ngậy từ sữa.</p>
                            <span class="list-category">Cà phê</span>
                        </div>
                    </div>
                    <div class="list-right">
                        <div class="list-price">
                            <span class="list-current-price">39.000 ₫</span>
                        </div>
                        <div class="list-control">
                            <div class="list-tool">
                                <button class="btn-edit" onclick="location.href='editProduct.html'"><i class="fa-light fa-pen-to-square"></i></button>
                                <button class="btn-delete" onclick="deleteProduct(this)"><i class="fa-regular fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Cf den da -->
                <div class="list">
                    <div class="list-left">
                        <img src="../images/caphedenda.png" alt="">
                        <div class="list-info">
                            <h4>Cà phê đen đá</h4>
                            <p class="list-note">Như trong mv của Amee , Đen đá nhưng có đường đậm chất hương vị Việt Nam , đậm đà hơn cà phê Laura của Nhật Kim Anh. Uống xong rất tỉnh táo và hùng hục sức khỏe.</p>
                            <span class="list-category">Cà phê</span>
                        </div>
                    </div>
                    <div class="list-right">
                        <div class="list-price">
                            <span class="list-current-price">35.000 ₫</span>
                        </div>
                        <div class="list-control">
                            <div class="list-tool">
                                <button class="btn-edit" onclick="location.href='editProduct.html'"><i class="fa-light fa-pen-to-square"></i></button>
                                <button class="btn-delete" onclick="deleteProduct(this)"><i class="fa-regular fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Cf sua da -->
                <div class="list">
                    <div class="list-left">
                        <img src="../images/caphesuada.png" alt="">
                        <div class="list-info">
                            <h4>Cà phê sữa đá</h4>
                            <p class="list-note">Cà phê sữa đá phổ biển và đậm chất Việt , là thức uống gần như hằng ngày của mỗi người giúp tỉnh táo và còn hỗ trợ cho đường ruột.</p>
                            <span class="list-category">Cà phê</span>
                        </div>
                    </div>
                    <div class="list-right">
                        <div class="list-price">
                            <span class="list-current-price">39.000 ₫</span>
                        </div>
                        <div class="list-control">
                            <div class="list-tool">
                                <button class="btn-edit" onclick="location.href='editProduct.html'"><i class="fa-light fa-pen-to-square"></i></button>
                                <button class="btn-delete" onclick="deleteProduct(this)"><i class="fa-regular fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tra dao cam sa -->
                <div class="list">
                    <div class="list-left">
                        <img src="../images/tradaocamsa.png" alt="">
                        <div class="list-info">
                            <h4>Trà đào cam sả</h4>
                            <p class="list-note">Trà đào cam sả có vị đậm ngọt thanh của đào, vị chua chua dịu nhẹ của cam và hương thơm của sả.</p>
                            <span class="list-category">Trà trái cây</span>
                        </div>
                    </div>
                    <div class="list-right">
                        <div class="list-price">
                            <span class="list-current-price">39.000 ₫</span>
                        </div>
                        <div class="list-control">
                            <div class="list-tool">
                                <button class="btn-edit" onclick="location.href='editProduct.html'"><i class="fa-light fa-pen-to-square"></i></button>
                                <button class="btn-delete" onclick="deleteProduct(this)"><i class="fa-regular fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
               <!-- Tra kombucha -->
               <div class="list">
                <div class="list-left">
                    <img src="../images/trakombucha.png" alt="">
                    <div class="list-info">
                        <h4>Trà kombucha</h4>
                        <p class="list-note">Một món trà mới tại thị trường Việt Nam , trà được lên men từ men Kombucha rất healthy , hỗ trợ giảm cân , tăng cường đề kháng.</p>
                        <span class="list-category">Trà trái cây</span>
                    </div>
                </div>
                <div class="list-right">
                    <div class="list-price">
                        <span class="list-current-price">39.000 ₫</span>
                    </div>
                    <div class="list-control">
                        <div class="list-tool">
                            <button class="btn-edit" onclick="location.href='editProduct.html'"><i class="fa-light fa-pen-to-square"></i></button>
                            <button class="btn-delete" onclick="deleteProduct(this)"><i class="fa-regular fa-trash"></i></button>
                        </div>
                    </div>
                </div>
                </div> 
                <!-- Tra dao kombucha -->
               <div class="list">
                <div class="list-left">
                    <img src="../images/tradaokombucha.png" alt="">
                    <div class="list-info">
                        <h4>Trà đào kombucha</h4>
                        <p class="list-note">Một món trà mới tại thị trường Việt Nam , trà được lên men từ men Kombucha và đào tươi rất healthy , hỗ trợ giảm cân , tăng cường đề kháng.</p>
                        <span class="list-category">Trà trái cây</span>
                    </div>
                </div>
                <div class="list-right">
                    <div class="list-price">
                        <span class="list-current-price">49.000 ₫</span>
                    </div>
                    <div class="list-control">
                        <div class="list-tool">
                            <button class="btn-edit" onclick="location.href='editProduct.html'"><i class="fa-light fa-pen-to-square"></i></button>
                            <button class="btn-delete" onclick="deleteProduct(this)"><i class="fa-regular fa-trash"></i></button>
                        </div>
                    </div>
                </div>
            </div>
             <!-- Hong tra sua tran chau -->
             <div class="list">
                <div class="list-left">
                    <img src="../images/hongtrasuatranchau.png" alt="">
                    <div class="list-info">
                        <h4>Hồng trà sữa trân châu</h4>
                        <p class="list-note">Là món rất quen thuộc và phổ biến với giới trẻ. Nhưng hương vị của nó không hề đơn giản khi được sử dụng lá hồng trà nhập khẩu hảo hạng mang tới hương vị không thể quên.</p>
                        <span class="list-category">Trà sữa</span>
                    </div>
                </div>
                <div class="list-right">
                    <div class="list-price">
                        <span class="list-current-price">49.000 ₫</span>
                    </div>
                    <div class="list-control">
                        <div class="list-tool">
                            <button class="btn-edit" onclick="location.href='editProduct.html'"><i class="fa-light fa-pen-to-square"></i></button>
                            <button class="btn-delete" onclick="deleteProduct(this)"><i class="fa-regular fa-trash"></i></button>
                        </div>
                    </div>
                </div>
            </div>
             </div> 
        </div>

            <!-- page nav  -->
            <div class="page-nav">
                <ul class="page-nav-list">
                    <li class="page-nav-item active">
                        <a href="#">1</a>
                    </li>
                    <li class="page-nav-item">
                        <a href="adminProduct2.html">2</a>
                    </li>
                </ul>
            </div>
        </div>
    </main>
    </div>


    <!-- JavaScripts -->
     <script>
        function deleteProduct(button) {

    let confirmDelete = confirm("Bạn có chắc chắn muốn xóa sản phẩm này không?");
    
    if (confirmDelete) {
            location.href='adminProduct1.html';
        }
    }

     </script>
</body>

</html>