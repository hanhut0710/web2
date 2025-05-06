<?php 
    require_once "./backend/user.php";
    require_once "./backend/product.php";
    require_once "./backend/statisticCustomer.php";

    $user = new User();
    $product = new Product();
    $statistic = new StatisticCustomer();
    $totalUser= $user -> getTotalUser();
    $totalProduct = $product -> getTotalProduct();
    $totalRevenue = $statistic -> getTotalRevenueByTime('' ,  date('Y-m-d'));
?>
<div class="section active">
                <h1 class="page-title">Trang quản lý cửa hàng bán giày Dattebayo</h1>
                <div class="cards" >
                    <a href="index.php?page=user" class="card-single">
                        <div class="box">
                            <h2 id="amount-user"><?php echo $totalUser ?></h2>
                            <div class="on-box">
                                <img src="../assets/img/admin/s1.png" alt="" style=" width: 200px;">
                                <h3>Khách hàng</h3>
                                <p>Khách hàng mục tiêu là một nhóm đối tượng khách hàng trong phân khúc thị trường mục
                                    tiêu mà doanh nghiệp bạn đang hướng tới.</p>
                            </div>

                        </div>
                    </a>
                    <a href="index.php?page=product" class="card-single">
                        <div class="box">
                            <div class="on-box">
                                <img src="assets/img/admin/s2.png" alt="" style=" width: 200px;">
                                <h2 id="amount-product"><?php echo $totalProduct ?></h2>
                                <h3>Sản phẩm</h3>
                                <p>Sản phẩm là bất cứ cái gì có thể đưa vào thị trường để tạo sự chú ý, mua sắm, sử dụng
                                    hay tiêu dùng nhằm thỏa mãn một nhu cầu hay ước muốn. Nó có thể là những vật thể,
                                    dịch vụ, con người, địa điểm, tổ chức hoặc một ý tưởng. </p>
                            </div>
                        </div>
                    </a>
                    <a href="index.php?page=statisticRevenue" class="card-single">
                        <div class="box">
                            <h2 id="doanh-thu"><?php echo number_format($totalRevenue, 0, ',', '.') ?>đ</h2>
                            <div class="on-box">
                                <img src="assets/img/admin/s3.png" alt="" style=" width: 200px;">
                                <h3>Doanh thu</h3>
                                <p>Doanh thu của doanh nghiệp là toàn bộ số tiền sẽ thu được do tiêu thụ sản phẩm, cung
                                    cấp dịch vụ với sản lượng.</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>