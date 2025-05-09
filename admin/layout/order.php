<?php 
    require_once "./backend/order.php";
    require_once "./backend/pagination.php";

    $page_num = isset($_GET['page_num']) ? max(1,intval($_GET['page_num'])) : 1;
    $limit = 13;

    $status = isset($_GET['status']) ? $_GET['status'] : 'all';
    $district = isset($_GET['district']) ? $_GET['district'] : '';
    $start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
    $end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';

    $order = new Order();
    $totalOrder = $order -> getTotalOrder($status,$district,$start_date,$end_date);
    $pagination = new Pagination($totalOrder,$page_num,$limit);
    $offset = $pagination -> getOffset();

    $orderList = $order -> getAllOrder($limit,$offset,$status,$district,$start_date,$end_date);
    $pagination->setExtraParams([
        'status' => $status,
        'district' => $district,
        'start_date' => $start_date,
        'end_date' => $end_date
    ]);
?>


<div class="section active">
        <div class="admin-control">
            <form id="filter-form" method="GET" action="index.php" class="fillter-date">
                <input type="hidden" name="page" value="order">
                    <div class="admin-control-left">
                        <select name="status" id="status" onchange="this.form.submit()">
                            <option value="all" <?php echo $status == 'all' ? 'selected' : ''; ?>>Tất cả</option>
                            <option value="pending" <?php echo $status == 'pending' ? 'selected' : ''; ?>>Chờ xác nhận</option>
                            <option value="packing" <?php echo $status == 'packing' ? 'selected' : ''; ?>>Chờ lấy hàng</option>
                            <option value="shipping" <?php echo $status == 'shipping' ? 'selected' : ''; ?>>Đang giao</option>
                            <option value="delivered" <?php echo $status == 'delivered' ? 'selected' : ''; ?>>Đã giao</option>
                            <option value="cancelled" <?php echo $status == 'cancelled' ? 'selected' : ''; ?>>Đã hủy</option>
                        </select>
                        <select name="district" id="district" onchange="this.form.submit()">
                            <option value="">Chọn quận</option>
                            <option value="Huyện Bình Chánh" <?php echo $district == 'Huyện Bình Chánh' ? 'selected' : ''; ?>>Huyện Bình Chánh</option>
                            <option value="Huyện Cần Giờ" <?php echo $district == 'Huyện Cần Giờ' ? 'selected' : ''; ?>>Huyện Cần Giờ</option>
                            <option value="Huyện Hóc Môn" <?php echo $district == 'Huyện Hóc Môn' ? 'selected' : ''; ?>>Huyện Hóc Môn</option>
                            <option value="Huyện Nhà Bè" <?php echo $district == 'Huyện Nhà Bè' ? 'selected' : ''; ?>>Huyện Nhà Bè</option>
                            <option value="Huyện Củ Chi" <?php echo $district == 'Huyện Củ Chi' ? 'selected' : ''; ?>>Huyện Củ Chi</option>
                            <option value="Quận 1" <?php echo $district == 'Quận 1' ? 'selected' : ''; ?>>Quận 1</option>
                            <option value="Quận 2" <?php echo $district == 'Quận 2' ? 'selected' : ''; ?>>Quận 2</option>
                            <option value="Quận 3" <?php echo $district == 'Quận 3' ? 'selected' : ''; ?>>Quận 3</option>
                            <option value="Quận 4" <?php echo $district == 'Quận 4' ? 'selected' : ''; ?>>Quận 4</option>
                            <option value="Quận 5" <?php echo $district == 'Quận 5' ? 'selected' : ''; ?>>Quận 5</option>
                            <option value="Quận 6" <?php echo $district == 'Quận 6' ? 'selected' : ''; ?>>Quận 6</option>
                            <option value="Quận 7" <?php echo $district == 'Quận 7' ? 'selected' : ''; ?>>Quận 7</option>
                            <option value="Quận 8" <?php echo $district == 'Quận 8' ? 'selected' : ''; ?>>Quận 8</option>
                            <option value="Quận 9" <?php echo $district == 'Quận 9' ? 'selected' : ''; ?>>Quận 9</option>
                            <option value="Quận 10" <?php echo $district == 'Quận 10' ? 'selected' : ''; ?>>Quận 10</option>
                            <option value="Quận 11" <?php echo $district == 'Quận 11' ? 'selected' : ''; ?>>Quận 11</option>
                            <option value="Quận 12" <?php echo $district == 'Quận 12' ? 'selected' : ''; ?>>Quận 12</option>
                            <option value="Quận Bình Tân" <?php echo $district == 'Quận Bình Tân' ? 'selected' : ''; ?>>Quận Bình Tân</option>
                            <option value="Quận Bình Thạnh" <?php echo $district == 'Quận Bình Thạnh' ? 'selected' : ''; ?>>Quận Bình Thạnh</option>
                            <option value="Quận Tân Phú" <?php echo $district == 'Quận Tân Phú' ? 'selected' : ''; ?>>Quận Tân Phú</option>
                            <option value="Quận Gò Vấp" <?php echo $district == 'Quận Gò Vấp' ? 'selected' : ''; ?>>Quận Gò Vấp</option>
                            <option value="Quận Phú Nhuận" <?php echo $district == 'Quận Phú Nhuận' ? 'selected' : ''; ?>>Quận Phú Nhuận</option>
                            <option value="Quận Tân Bình" <?php echo $district == 'Quận Tân Bình' ? 'selected' : ''; ?>>Quận Tân Bình</option>
                        </select>
                    </div>
                    <div class="admin-order-control-center">             
                            <span class="search-btn"><i class="fa-light fa-magnifying-glass"></i></span>
                            <input id="form-search-order" type="text" class="form-search-input"
                                placeholder="Tìm kiếm mã đơn, khách hàng..." disabled title="Chức năng tìm kiếm đang phát triển">
                    </div>
                    <div class="admin-control-right">
                        <div class="fillter-date">
                            <label for="start_date">Từ</label>
                            <input type="date" name="start_date" id="start_date" class="form-control-date" value="<?php echo $start_date; ?>" onchange="this.form.submit()">
                        </div>
                        <div class="fillter-date">
                            <label for="end_date">Đến</label>
                            <input type="date" name="end_date" id="end_date" class="form-control-date" value="<?php echo $end_date; ?>" onchange="this.form.submit()">
                        </div>
                    </div>
                </form>
                <button class="btn-reset-order" onclick="location.href='index.php?page=order'"><i
                        class="fa-light fa-arrow-rotate-right"></i></button>
                    
                   
        </div>
                <div class="table">
                    <table width="100%">
                        <thead>
                            <tr>
                                <td>Mã đơn</td>
                                <td>Tài khoản</td>
                                <td>Phone</td>
                                <td>Địa chỉ</td>
                                <td>Ngày đặt</td>
                                <td>Tổng tiền</td>
                                <td>Trạng thái</td>
                                <td>Cập nhật trạng thái</td>
                                <td>Thao tác</td>
                            </tr>
                        </thead>
                        <tbody id="showOrder">
                            <?php 
                        //    echo '<pre>' . print_r($orderList[0], true) . '</pre>';
                                foreach($orderList as $order){
                                    $fullAddress = implode(', ', [
                                        $order['address_line'],
                                        $order['ward'],
                                        $order['district'],
                                        $order['city']
                                    ]);
                                    echo '
                                    <tr>
                                        <td>'.$order['id'].'</td>
                                        <td>'.$order['username'].'</td>
                                        <td>'.$order['phone'].'</td>
                                        <td>'.$fullAddress.'</td>
                                        <td>'.$order['created_at'].'</td>
                                        <td>'.number_format($order['total_price'], 0, ',', '.').' ₫</td>
                                        <td>
                                            <span class="status status-'.$order['order_status_status'].'">'.$order['status'].'</span>
                                        </td>
                                        <td class="update-status">
                                        ';
                                        if($authManager->hasPermission($_SESSION['id'], 15)){
                                            if($order['order_status_status'] != 'delivered' && $order['order_status_status'] != 'cancelled'){
                                           
                                                if($order['order_status_status'] == 'pending')
                                                    echo '<a href="./backend/xulyOrder.php?id='.$order['id'].'&status=packing" onclick="return confirmPacking()" class="modal-detail-btn btn-packing">
                                                <i class="fa-solid fa-check"></i> Xác nhận</a>';
                                                if($order['order_status_status'] == 'packing')
                                                    echo '<a href="./backend/xulyOrder.php?id='.$order['id'].'&status=shipping" onclick="return confirmShipping()" class="modal-detail-btn btn-shipping">
                                                <i class="fa-solid fa-truck"></i> Giao hàng</a>';
                                                if($order['order_status_status'] == 'shipping')
                                                    echo '<a href="./backend/xulyOrder.php?id='.$order['id'].'&status=delivered" onclick="return confirmDelivered()" class="modal-detail-btn btn-delivered">
                                                <i class="fa-solid fa-check-circle"></i> Hoàn tất</a>'; 
                                                echo '<a href="./backend/xulyOrder.php?id='.$order['id'].'&status=cancelled" onclick="return confirmCancel()" class="modal-detail-btn btn-cancel-order">
                                                <i class="fa-solid fa-times"></i> Hủy đơn</a>';
                                            }
                                        }
                                         echo '</td>';
                                        if($authManager->hasPermission($_SESSION['id'], 21))
                                        echo '</td>
                                        <td class="control">
                                            <a href="index.php?page=orderdetails&id='.$order['id'].'" class="btn-detail"><i class="fa-regular fa-eye"></i> Chi tiết</a>
                                        </td>';
                                
                                 echo '</tr>';
                                }
                            
                            
                            
                            ?>                   
                        </tbody>
                    </table>
                </div>

                <?php 
                echo $pagination -> renderOrder();
                ?>

<script>
function confirmCancel() {
    return confirm("Bạn có chắc muốn hủy đơn hàng này?");
}

function confirmPacking() {
    return confirm("Bạn có chắc muốn xác nhận đơn hàng này?");
}

function confirmShipping() {
    return confirm("Bạn có chắc muốn chuyển đơn hàng sang trạng thái giao hàng?");
}

function confirmDelivered() {
    return confirm("Bạn có chắc muốn đánh dấu đơn hàng là hoàn tất?");
}
</script>
