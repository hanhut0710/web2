    <?php ob_start(); ?>
    <div class="container">
            <aside class="sidebar open">
                <div class="top-sidebar">
                    <a href="#"  style="height: 150px; width: 100%" class="channel-logo"><img src="../img/logo.png" alt="Lucy Coffe Logo"></a>
                    <!-- <div class="hidden-sidebar your-channel"><img src="../img/logo.png"
                            style="height: 30px;" alt="">
                    </div> -->
                </div>
                <div class="middle-sidebar">
                    <ul class="sidebar-list">
                        <li class="sidebar-list-item tab-content">
                            <a href="index.php?page=home" class="sidebar-link">
                                <div class="sidebar-icon"><i class="fa fa-home" aria-hidden="true"></i></div>
                                <div class="hidden-sidebar">Trang tổng quan</div>
                            </a>
                        </li>
                        <?php 
                            if($authManager->hasPermission($_SESSION['id'], 12)){
                                echo '<li class="sidebar-list-item tab-content">
                                        <a href="index.php?page=product" class="sidebar-link">
                                            <div class="sidebar-icon"><i class="fa-light fa-pot-food"></i></div>
                                            <div class="hidden-sidebar">Sản phẩm</div>
                                        </a>
                                    </li>';
                            } ?>
                        <?php 
                            if($authManager->hasPermission($_SESSION['id'], 16)){
                                echo '<li class="sidebar-list-item tab-content">
                                        <a href="index.php?page=productdetails" class="sidebar-link">
                                            <div class="sidebar-icon"><i class="fa-solid fa-boot"></i></div>
                                            <div class="hidden-sidebar">Chi tiết sản phẩm</div>
                                        </a>
                                    </li>';
                            } ?>
                        <?php 
                            if($authManager->hasPermission($_SESSION['id'], 24)){
                                echo '<li class="sidebar-list-item tab-content">
                                        <a href="index.php?page=import" class="sidebar-link">
                                            <div class="sidebar-icon"><i class="fa fa-ticket" aria-hidden="true"></i></div>
                                            <div class="hidden-sidebar">Phiếu nhập hàng</div>
                                        </a>
                                    </li>';
                            } ?>
                        <?php 
                            if($authManager->hasPermission($_SESSION['id'], 22)){
                                echo '<li class="sidebar-list-item tab-content">
                                        <a href="index.php?page=supplier" class="sidebar-link">
                                            <div class="sidebar-icon"><i class="fa-solid fa-user-tie"></i></div>
                                            <div class="hidden-sidebar">Nhà cung cấp</div>
                                        </a>
                                    </li>';
                            } ?>
                        <?php
                            if($authManager->hasPermission($_SESSION['id'], 8)){
                                echo '<li class="sidebar-list-item tab-content">
                                        <a href="index.php?page=user" class="sidebar-link">
                                            <div class="sidebar-icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                                            <div class="hidden-sidebar">Khách hàng</div>
                                        </a>
                                    </li>';
                            } ?>
                        <?php
                            if($authManager->hasPermission($_SESSION['id'], 14)){
                                echo '<li class="sidebar-list-item tab-content">
                                <a href="index.php?page=order" class="sidebar-link">
                                    <div class="sidebar-icon"><i class="fa fa-shopping-basket" aria-hidden="true"></i></div>
                                    <div class="hidden-sidebar">Đơn hàng</div>
                                </a>
                            </li>';
                        } ?>
                        <?php 
                            if($authManager->hasPermission($_SESSION['id'], 4)){
                                echo '<li class="sidebar-list-item tab-content">
                                        <a href="index.php?page=staff" class="sidebar-link">
                                            <div class="sidebar-icon"><i class="fa fa-users" aria-hidden="true"></i></div>
                                            <div class="hidden-sidebar">Nhân viên</div>
                                        </a>
                                     </li>';
                            } ?>
                        <?php 
                            if($authManager->hasPermission($_SESSION['id'], 13)){
                                echo '<li class="sidebar-list-item tab-content">
                                        <a href="index.php?page=statisticRevenue" class="sidebar-link">
                                            <div class="sidebar-icon"><i class="fa-solid fa-square-poll-vertical"></i></div>
                                            <div class="hidden-sidebar">Thống kê</div>
                                        </a>
                                    </li>';
                            } ?>
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
                            if($authManager->hasPermission($_SESSION['id'], 24))
                                include "import.php";
                            else 
                                include "403.php";
                            break;
                        case "importdetail":
                            if($authManager->hasPermission($_SESSION['id'], 23))
                                include "importdetail.php";
                            else 
                                include "403.php";
                            break;
                        case "addImport":
                           if($authManager->hasPermission($_SESSION['id'], 17))
                                include "addImport.php";
                            else 
                                include "403.php";
                            break;
                        /*** SẢN PHẨM ***/ 
                        case "product":
                            if($authManager->hasPermission($_SESSION['id'], 12))
                                include "product.php";
                            else 
                                include "403.php";
                            break;
                        case "addProduct":
                           if($authManager->hasPermission($_SESSION['id'], 9))
                                include "addProduct.php";
                            else 
                                include "403.php";
                            break;   
                        case "editProduct":
                            if($authManager->hasPermission($_SESSION['id'], 10))
                                include "editProduct.php";
                            else 
                                include "403.php";
                            break;   
                        case "productdetails":
                            if($authManager->hasPermission($_SESSION['id'], 16))
                                include "productdetails.php";
                            else 
                                include "403.php";
                            break;
                        case "addProductDetail":
                            include "addProductDetails.php";
                            break;
                        /*** NHÀ CUNG CẤP ***/ 
                        case "supplier":
                            if($authManager->hasPermission($_SESSION['id'], 22))
                                include "supplier.php";
                            else 
                                include "403.php";
                            break;
                        case "addSupplier":
                            if($authManager->hasPermission($_SESSION['id'], 18))
                                include "addSupplier.php";
                            else 
                                include "403.php";
                            break;
                        case "editSupplier":
                            if($authManager->hasPermission($_SESSION['id'], 19))
                                include "editSupplier.php";
                            else 
                                include "403.php";
                            break;
                        /*** ĐƠN HÀNG ***/ 
                        case "order":
                            if($authManager->hasPermission($_SESSION['id'], 14))
                                include "order.php";
                            else 
                                include "403.php";
                            break;
                        case "user":
                            if($authManager->hasPermission($_SESSION['id'], 8))
                                include "user.php";
                            else 
                                include "403.php";
                            break;
                        case "addUser":
                            if($authManager->hasPermission($_SESSION['id'], 5))
                                include "addUser.php";
                            else 
                                include "403.php";
                            break;
                        case "editUser":
                            if($authManager->hasPermission($_SESSION['id'], 6))
                                include "editUser.php";
                            else 
                                include "403.php";
                            break;
                         case "orderdetails":
                            if($authManager->hasPermission($_SESSION['id'], 21))
                                include "orderdetails.php";
                            else 
                                include "403.php";
                            break; 
                        /*** THỐNG KÊ ***/ 
                        case "statisticProduct":
                            if($authManager->hasPermission($_SESSION['id'], 13))
                                include "statisticProduct.php";
                            else 
                                include "403.php";
                            break;
                        case "statisticRevenue":
                            if($authManager->hasPermission($_SESSION['id'], 13))
                                include "statisticRevenue.php";
                            else 
                                include "403.php";
                            break;
                        case "statisticOrder":
                            if($authManager->hasPermission($_SESSION['id'], 13))
                                include "statisticOrder.php";
                            else 
                                include "403.php";
                            break;
                        case "statisticCustomer":
                            if($authManager->hasPermission($_SESSION['id'], 13))
                                include "statisticCustomer.php";
                            else 
                                include "403.php";
                            break;
                        case "statisticTopCustomer":
                            if($authManager->hasPermission($_SESSION['id'], 13))
                                include "statisticTopCustomer.php";
                            else 
                                include "403.php";
                            break;
                        case "statisticCustomerDetail":
                            if($authManager->hasPermission($_SESSION['id'], 13))
                                include "orderdetailStatistic.php";
                            else 
                                include "403.php";
                            break;
                       
                        /*** NHÂN VIÊN ***/
                        case "staff":
                            if($authManager->hasPermission($_SESSION['id'], 4)){
                                include "staff.php";
                            }else{
                                include "403.php";
                            }
                            break;
                        case "createStaff":
                            if($authManager->hasPermission($_SESSION['id'], 1)){
                                include "addStaff.php";
                            }else{
                                include "403.php";
                            }
                            break;
                        case "updateStaff":
                            if($authManager->hasPermission($_SESSION['id'], 2)){
                                include "updateStaff.php";
                            }else{
                                include "403.php";
                            }
                            break;
                        case "deleteStaff":
                            if($authManager->hasPermission($_SESSION['id'], 3)){
                                include "deleteStaff.php";
                            }else{
                                include "403.php";
                            }
                            break;

                        //Phân quyền
                        case "permission":
                            if($_SESSION['role'] == 2){
                                include "permission.php";
                            }
                            else{
                                include "403.php";
                            }
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