    <?php ob_start(); ?>
    <div class="container">
            <aside class="sidebar open">
                <div class="top-sidebar">
                    <a href="#" class="channel-logo"><img src="../img/logo.png" alt="Lucy Coffe Logo"></a>
                    <div class="hidden-sidebar your-channel"><img src="../img/logo.png"
                            style="height: 30px;" alt="">
                    </div>
                </div>
                <div class="middle-sidebar">
                    <ul class="sidebar-list">
                        <li class="sidebar-list-item tab-content">
                            <a href="index.php?page=home" class="sidebar-link">
                                <div class="sidebar-icon"><i class="fa fa-home" aria-hidden="true"></i></div>
                                <div class="hidden-sidebar">Trang tổng quan</div>
                            </a>
                        </li>
                        <li class="sidebar-list-item tab-content">
                            <a href="index.php?page=product" class="sidebar-link">
                                <div class="sidebar-icon"><i class="fa-light fa-pot-food"></i></div>
                                <div class="hidden-sidebar">Sản phẩm</div>
                            </a>
                        </li>
                        <li class="sidebar-list-item tab-content">
                            <a href="index.php?page=productdetails" class="sidebar-link">
                                <div class="sidebar-icon"><i class="fa-solid fa-boot"></i></div>
                                <div class="hidden-sidebar">Chi tiết sản phẩm</div>
                            </a>
                        </li>
                        <li class="sidebar-list-item tab-content">
                            <a href="index.php?page=import" class="sidebar-link">
                                <div class="sidebar-icon"><i class="fa fa-ticket" aria-hidden="true"></i></div>
                                <div class="hidden-sidebar">Phiếu nhập hàng</div>
                            </a>
                        </li>
                        <li class="sidebar-list-item tab-content">
                            <a href="index.php?page=supplier" class="sidebar-link">
                                <div class="sidebar-icon"><i class="fa-solid fa-user-tie"></i></div>
                                <div class="hidden-sidebar">Nhà cung cấp</div>
                            </a>
                        </li>
                        <li class="sidebar-list-item tab-content">
                            <a href="index.php?page=user" class="sidebar-link">
                                <div class="sidebar-icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                                <div class="hidden-sidebar">Khách hàng</div>
                            </a>
                        </li>
                        <li class="sidebar-list-item tab-content">
                            <a href="index.php?page=order" class="sidebar-link">
                                <div class="sidebar-icon"><i class="fa fa-shopping-basket" aria-hidden="true"></i></div>
                                <div class="hidden-sidebar">Đơn hàng</div>
                            </a>
                        </li>
                        <li class="sidebar-list-item tab-content">
                            <a href="index.php?page=staff" class="sidebar-link">
                                <div class="sidebar-icon"><i class="fa fa-users" aria-hidden="true"></i></div>
                                <div class="hidden-sidebar">Nhân viên</div>
                            </a>
                        </li>
                        <li class="sidebar-list-item tab-content">
                            <a href="index.php?page=statisticProduct" class="sidebar-link">
                                <div class="sidebar-icon"><i class="fa fa-bar-chart" aria-hidden="true"></i></div>
                                <div class="hidden-sidebar">Thống kê sản phẩm</div>
                            </a>
                        </li>
                        <li class="sidebar-list-item tab-content">
                            <a href="index.php?page=statisticRevenue" class="sidebar-link">
                                <div class="sidebar-icon"><i class="fa-solid fa-square-poll-vertical"></i></div>
                                <div class="hidden-sidebar">Thống kê</div>
                            </a>
                        </li>
                        <li class="sidebar-list-item tab-content">
                            <a href="index.php?page=permission" class="sidebar-link">
                                <div class="sidebar-icon"><i class="fa-solid fa-list-check"></i></div>
                                <div class="hidden-sidebar">Quản lý quyền</div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="bottom-sidebar">
                    <ul class="sidebar-list">
                        <li class="sidebar-list-item user-logout">
                            <a href="index.php" class="sidebar-link">
                                <div class="sidebar-icon"><i class="fa-solid fa-house"></i></div>
                                <div class="hidden-sidebar">Trang chủ</div>
                            </a>
                        </li>
                        <li class="sidebar-list-item user-logout">
                            <a href="index.php" class="sidebar-link">
                                <div class="sidebar-icon"><i class="fa-light fa-circle-user"></i></div>
                                <div class="hidden-sidebar" id="name-acc"><?php echo $_SESSION['username']; ?></div>
                            </a>
                        </li>
                        <li class="sidebar-list-item user-logout">
                            <a href="backend/logout.php" class="sidebar-link" id="logout-acc">
                                <div class="sidebar-icon"><i class="fa-light fa-arrow-right-from-bracket"></i></div>
                                <div class="hidden-sidebar">Đăng xuất</div>
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>
            <main class="content">
            <?php
                if(isset($_GET['page']) && ($_GET['page']))
                {   
                    switch($_GET['page'])
                    {   
                        case "home":
                            include "home.php";
                            break;
                        /*** PHIẾU NHẬP HÀNG ***/ 
                        case "import":
                            include "import.php";
                            break;
                        case "importdetail":
                            include "importdetail.php";
                            break;
                        case "addImport":
                            include "addImport.php";
                            break;
                        /*** SẢN PHẨM ***/ 
                        case "product":
                            include "product.php";
                            break;
                        case "addProduct":
                            include "addProduct.php";
                            break;   
                        case "editProduct":
                            include "editProduct.php";
                            break;   
                        case "productdetails":
                            include "productdetails.php";
                            break;
                        case "addProductDetail":
                            include "addProductDetails.php";
                            break;
                        /*** NHÀ CUNG CẤP ***/ 
                        case "supplier":
                            include "supplier.php";
                            break;
                        case "addSupplier":
                            include "addSupplier.php";
                            break;
                        case "editSupplier":
                            include "editSupplier.php";
                            break;
                        /*** ĐƠN HÀNG ***/ 
                        case "order":
                            include "order.php";
                            break;
                        case "user":
                            include "user.php";
                            break;
                        case "addUser":
                            include "addUser.php";
                            break;
                        case "editUser":
                            include "editUser.php";
                            break;
                        /*** THỐNG KÊ ***/ 
                        case "statisticProduct":
                            include "statisticProduct.php";
                            break;
                        case "statisticRevenue":
                            include "statisticRevenue.php";
                            break;
                        case "statisticOrder":
                            include "statisticOrder.php";
                            break;
                        case "statisticCustomer":
                            include "statisticCustomer.php";
                            break;
                        case "statisticTopCustomer":
                            include "statisticTopCustomer.php";
                            break;
                        case "statisticCustomerDetail":
                            include "orderdetails.php";
                            break;
                       
                        case "permission":
                            include "permission.php";
                            break;
                        /*** NHÂN VIÊN ***/
                        case "staff":
                            include "staff.php";
                            break;
                        case "createStaff":
                            include "addStaff.php";
                            break;
                        case "updateStaff":
                            include "updateStaff.php";
                            break;
                        case "deleteStaff":
                            include "deleteStaff.php";
                            break;
                       
                        default:
                            include "home.php";
                            break;
                    }
                }
                else
                    include "home.php";
            ?>
            </main>
        </div>
    <?php ob_end_flush(); ?>