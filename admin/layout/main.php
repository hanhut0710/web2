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
                    <li class="sidebar-list-item tab-content active" data-mode="home">
                        <a href="#" class="sidebar-link">
                            <div class="sidebar-icon"><i class="fa fa-home" aria-hidden="true"></i></div>
                            <div class="hidden-sidebar">Trang tổng quan</div>
                        </a>
                    </li>
                    <li class="sidebar-list-item tab-content" data-mode="product">
                        <a href="#" class="sidebar-link">
                            <div class="sidebar-icon"><i class="fa-light fa-pot-food"></i></div>
                            <div class="hidden-sidebar">Sản phẩm</div>
                        </a>
                    </li>
                    <li class="sidebar-list-item tab-content" data-mode="customer">
                        <a href="#" class="sidebar-link">
                            <div class="sidebar-icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                            <div class="hidden-sidebar">Khách hàng</div>
                        </a>
                    </li>
                    <li class="sidebar-list-item tab-content" data-mode="order">
                        <a href="#" class="sidebar-link">
                            <div class="sidebar-icon"><i class="fa fa-shopping-basket" aria-hidden="true"></i></div>
                            <div class="hidden-sidebar">Đơn hàng</div>
                        </a>
                    </li>
                    <li class="sidebar-list-item tab-content" data-mode="staff">
                        <a href="#" class="sidebar-link">
                            <div class="sidebar-icon"><i class="fa fa-users" aria-hidden="true"></i></div>
                            <div class="hidden-sidebar">Nhân viên</div>
                        </a>
                    </li>
                    <li class="sidebar-list-item tab-content" data-mode="product_stactics">
                        <a href="#" class="sidebar-link">
                            <div class="sidebar-icon"><i class="fa fa-bar-chart" aria-hidden="true"></i></div>
                            <div class="hidden-sidebar">Thống kê sản phẩm</div>
                        </a>
                    </li>
                    <li class="sidebar-list-item tab-content" data-mode="customer_statics">
                        <a href="#" class="sidebar-link">
                            <div class="sidebar-icon"><i class="fa-solid fa-square-poll-vertical"></i></div>
                            <div class="hidden-sidebar">Thống kê khách hàng</div>
                        </a>
                    </li>
                    <li class="sidebar-list-item tab-content" data-mode="right">
                        <a href="#" class="sidebar-link">
                            <div class="sidebar-icon"><i class="fa-solid fa-list-check"></i></div>
                            <div class="hidden-sidebar">Quản lý quyền</div>
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
                            <div class="hidden-sidebar" id="name-acc"><?php echo $_SESSION['username']; ?></div>
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
            <div class="section active"></div>
        </main>
    </div>