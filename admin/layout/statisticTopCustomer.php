<?php 
    require_once "backend/statisticCustomer.php";
    require_once "backend/pagination.php";

    $startDate = isset($_GET['start-date']) ? $_GET['start-date'] : '';
    $endDate = isset($_GET['end-date']) ? $_GET['end-date'] : date('Y-m-d');
    $time = isset($_GET['time']) ? $_GET['time'] : '';
    $view = isset($_GET['view']) ? $_GET['view'] : 'chart';
    switch($time) {
        case 0:
            $startDate = date('Y-m-d');
            $endDate = date('Y-m-d');
            break;
        case 1:
            $startDate = date('Y-m-d', strtotime('monday this week'));
            $endDate = date('Y-m-d', strtotime('sunday this week'));
            break;
        case 2:
            $startDate = date('Y-m-01');
            $endDate = date('Y-m-t');
            break;
        case 3:
            $startDate = date('Y-01-01');
            $endDate = date('Y-12-31');
            break;
        case 4:
            $startDate = '2025-01-01';
            $endDate = date('Y-m-d');
            break;
        default:
            $startDate = isset($_GET['start-date']) ? $_GET['start-date'] : '';
            $endDate = isset($_GET['end-date']) ? $_GET['end-date'] : date('Y-m-d');
            break;
    }   
    
    $statistic = new StatisticCustomer();

    $limit = 5;
    $totalOrder = $statistic->getTotalCustomerByTime($startDate, $endDate);
    $sort = (isset($_GET['sort']) && $_GET['sort'] === 'asc') ? 'ASC' : 'DESC';
    $top5Customer = $statistic->getTop5Customers($startDate, $endDate, $limit, $sort);

    $dataJson = json_encode($top5Customer);
   

?>
<div class="section active">
    <div class="admin-control">
        <div class="admin-control-left">
            <select name="time" id="time" onchange="filterByTime()">
                <option value="4" <?php echo ($time == 4) ? 'selected' : '' ;?>>Tất cả</option>
                <option value="3" <?php echo ($time == 3) ? 'selected' : '' ;?>>Năm này</option>
                <option value="2" <?php echo ($time == 2) ? 'selected' : '' ;?>>Tháng này</option>
                <option value="1" <?php echo ($time == 1) ? 'selected' : '' ;?>>Tuần này</option>
                <option value="0" <?php echo ($time == 0) ? 'selected' : '' ;?>>Hôm nay</option>
            </select>
        </div>
        <div class="admin-control-right">
            <form action="" class="fillter-date" method="GET">
                <div>
                    <label for="time-start">Từ</label>
                    <input onchange="selectDate()" type="date" class="form-control-date" id="time-start-tk" name="start-date" value="<?php echo isset($_GET['start-date']) ? $_GET['start-date'] : ''; ?>" >
                </div>
                <div>
                    <label for="time-end">Đến</label>
                    <input onchange="selectDate()" type="date" class="form-control-date" id="time-end-tk" name="end-date" value="<?php echo isset($_GET['end-date']) ? $_GET['end-date'] : date('Y-m-d'); ?>" >
                </div>
                <div style="display: <?php echo ($view === 'table') ? 'flex' : 'none' ?>">
                    <a href="index.php?page=statisticTopCustomer&start-date=<?php echo isset($_GET['start-date']) ? $_GET['start-date'] : ''; ?>&end-date=<?php echo isset($_GET['end-date']) ? $_GET['end-date'] : date('Y-m-d'); ?>&sort=asc&view=table" class="btn-reset-order">
                        <i class="fa-regular fa-arrow-up-short-wide"></i>
                    </a>
                    <a href="index.php?page=statisticTopCustomer&start-date=<?php echo isset($_GET['start-date']) ? $_GET['start-date'] : ''; ?>&end-date=<?php echo isset($_GET['end-date']) ? $_GET['end-date'] : date('Y-m-d'); ?>&sort=desc&view=table" class="btn-reset-order">
                        <i class="fa-regular fa-arrow-down-wide-short"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
    <div class="dashboard-container">
        <div class="card-grid">
            <a href="index.php?page=statisticRevenue&time=<?php echo $time ?>&start-date=<?php echo $startDate ?>&end-date=<?php echo $endDate ?>" class="card blue">
                <div class="icon">📊</div>
                <div>
                    <div class="card-title">DOANH THU</div>
                    <div class="card-value"> <?php echo number_format($statistic->getTotalRevenueByTime($startDate, $endDate), 0, ',', '.').'đ'?> </div>
                </div>
            </a>
            <a href="index.php?page=statisticOrder&time=<?php echo $time ?>&start-date=<?php echo $startDate ?>&end-date=<?php echo $endDate ?>" class="card green">
                <div class="icon">🛒</div>
                <div>
                     <div class="card-title">ĐƠN HÀNG</div>
                    <div class="card-value"> <?php echo $statistic->getTotalOrderByTime($startDate, $endDate);?> </div>
                </div>
            </a>
            <a href="index.php?page=statisticCustomer&time=<?php echo $time ?>&start-date=<?php echo $startDate ?>&end-date=<?php echo $endDate ?>" class="card teal">
                <div class="icon">👤</div>
                <div>
                    <div class="card-title">KHÁCH HÀNG</div>
                    <div class="card-value"> <?php echo $statistic->getTotalCustomerByTime($startDate, $endDate) ?></div>
                </div>
            </a>
            <a href="index.php?page=statisticTopCustomer&time=<?php echo $time ?>&start-date=<?php echo $startDate ?>&end-date=<?php echo $endDate ?>" class="card orange">
                <div class="icon">⭐</div>
                <div class="card-value">TOP KHÁCH HÀNG</div>
            </a>
        </div>
        <div class="chart-card">
            <div class="ranking-header">
                <div class="ranking-title">
                    <h1>🏆 Bảng Xếp Hạng Khách Hàng Thân Thiết</h1>
                    <p>Danh sách những khách hàng có đóng góp lớn nhất trong khoảng thời gian bạn chọn.</p>
                </div>
            </div>
        <div class="chart-placeholder">
            <div class="table" style="display : <?php echo ($view === 'table') ? 'block' : 'none'?> ">
                <table width="100%">
                    <thead>
                        <tr>
                            <td>Mã khách hàng</td>
                            <td>Tên khách hàng</td>
                            <td>Tổng hóa đơn</td>
                            <td>Tổng tiền</td>
                            <td>Chi tiết</td>
                        </tr>
                    </thead>
                    <tbody id="showTk">
                        <?php 
                            foreach($top5Customer as $item){
                                echo ' 
                                    <tr>
                                        <td>'.$item['id'].'</td>
                                        <td>'.$item['full_name'].'</td>
                                        <td>'.$item['order_count'].'</td>
                                        <td>'.number_format($item['total_price'], 0, ',', '.').'₫</td>
                                        <td class="control control-table">
                                            <a href="index.php?page=statisticCustomerDetail&id='.$item['id'].'&start-date='.$startDate.'&end-date='.$endDate.'&view=orders" class="btn-edit" ><i class="fa-solid fa-eye"></i> Chi tiết</a></td>
                                    </tr>
                                ';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div id="myfirstchart" style="height: 250px; display : <?php echo ($view === 'chart') ? 'block' : 'none'?>"></div>
            </div>
    </div>              
    <div class="button-container">
        <button class="view-more" ><?php echo (isset($_GET['view']) && $_GET['view'] === 'table') ? 'Xem biểu đồ' : 'Xem bảng dữ liệu'?></button>
    </div>
</div> 
<script>
    const button = document.querySelector('.view-more');
    const table = document.querySelector('.table');
    let mode = <?php echo (isset($_GET['time'])) ? "'filter'" : "'select'" ?>;

    button.addEventListener('click', function () {
        let currentUrl = "index.php?page=statisticTopCustomer";
        const startDate = document.getElementById('time-start-tk').value;
        const endDate = document.getElementById('time-end-tk').value;
        const time = document.getElementById('time').value;
        console.log(mode);
        if (mode === "select") {
            if (table.style.display === 'none') {
                currentUrl += '&view=table&start-date=' + startDate + '&end-date=' + endDate;
                window.location.href = currentUrl;
            } else if (table.style.display === 'block') {
                currentUrl += '&view=chart&start-date=' + startDate + '&end-date=' + endDate;
                window.location.href = currentUrl;
            }
        } else {
            if (table.style.display === 'none') {
                currentUrl += '&view=table&time=' + time;
                window.location.href = currentUrl;
            } else if (table.style.display === 'block') {
                currentUrl += '&view=chart&time=' + time;
                window.location.href = currentUrl;
            }
        }
    });

    function selectDate() {
        const startDate = document.getElementById('time-start-tk').value;
        const endDate = document.getElementById('time-end-tk').value;
        let currentUrl = window.location.href;

        if (startDate === '' || endDate === '') {
            return;
        }

        if (currentUrl.includes('view=table')) {
            console.log('table');
            currentUrl = "index.php?page=statisticTopCustomer&view=table&start-date=" + startDate + "&end-date=" + endDate;
            window.location.href = currentUrl;
        } else {
            currentUrl = "index.php?page=statisticTopCustomer&view=chart&start-date=" + startDate + "&end-date=" + endDate;
            window.location.href = currentUrl;
        }
    }

    function filterByTime() {
        const time = document.getElementById('time').value;
        let currentUrl = window.location.href;
        if (currentUrl.includes('view=table')) {
            currentUrl = "index.php?page=statisticTopCustomer&view=table&time=" + time;
        } else {
            currentUrl = "index.php?page=statisticTopCustomer&view=chart&time=" + time;
        }
        window.location.href = currentUrl;
    }

    const data = <?php echo $dataJson; ?>;
    console.log(data);
    new Morris.Bar({
        element: 'myfirstchart',
        data: data,
        // Tên các trục
        xkey: ['full_name'],
        ykeys: ['total_price'],
        labels: 'Doanh thu',
        resize: true,
        barColors: function (row, series, type) {
            // Gán màu sắc khác nhau cho từng thanh bar
            const colors = ['#1e88e5', '#ff5722', '#43a047', '#fbc02d', '#8e24aa'];
            return colors[row.x % colors.length]; // Lặp lại màu nếu vượt quá số lượng màu
        }
    });
</script>