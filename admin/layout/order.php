<?php 
    require_once "./backend/order.php";
    require_once "./backend/pagination.php";

    $page_num = isset($_GET['page_num']) ? max(1,intval($_GET['page_num'])) : 1;
    $limit = 3;

    $order = new Order();
    $totalOrder = $order -> getTotalOrder();
    $pagination = new Pagination($totalOrder,$page_num,$limit);
    $offset = $pagination -> getOffset();

    $orderList = $order -> getAllOrder($limit,$offset);
?>


<div class="section active">
                <div class="admin-control">
                    <div class="admin-control-left">
                        <select name="tinh-trang" id="tinh-trang" onchange="">
                            <option>Tất cả</option>
                            <option>Chờ xác nhận</option>
                            <option>Chờ lấy hàng</option>
                            <option>Đang giao</option>
                            <option>Đã giao</option>
                            <option>Đã hủy</option>
                        </select>
                        <select name="tinh-trang" id="tinh-trang" onchange="">
                            <option disabled selected>Chọn quận</option>
                            <option>Huyện Bình Chánh</option>
                            <option>Huyện Cần Giờ</option>
                            <option>Huyện Hóc Môn</option>
                            <option>Huyện Nhà Bè</option>
                            <option>Huyện Củ Chi</option>
                            <option>Quận 1</option>
                            <option>Quận 2</option>
                            <option>Quận 3</option>
                            <option>Quận 4</option>
                            <option>Quận 5</option>
                            <option>Quận 6</option>
                            <option>Quận 7</option>
                            <option>Quận 8</option>
                            <option>Quận 9</option>
                            <option>Quận 10</option>
                            <option>Quận 11</option>
                            <option>Quận 12</option>
                            <option>Quận Bình Tân</option>
                            <option>Quận Bình Thạnh</option>
                            <option>Quận Tân Phú</option>
                            <option>Quận Gò Vấp</option>
                            <option>Quận Phú Nhuận</option>
                            <option>Quận Tân Bình</option>
                        </select>

                    </div>
                    <div class="admin-control-center">
                        <form action="" class="form-search">
                            <span class="search-btn"><a href="order.html"><i class="fa-light fa-magnifying-glass"></a></i></span>
                            <input id="form-search-order" type="text" class="form-search-input"
                                placeholder="Tìm kiếm mã đơn, khách hàng...">
                        </form>
                    </div>
                    <div class="admin-control-right">
                        <form action="" class="fillter-date">
                            <div>
                                <label for="time-start">Từ</label>
                                <input type="date" class="form-control-date" id="time-start">
                            </div>
                            <div>
                                <label for="time-end">Đến</label>
                                <input type="date" class="form-control-date" id="time-end">
                            </div>
                        </form>
                        <button class="btn-reset-order" onclick="location.href='index.php?page=order'"><i
                                class="fa-light fa-arrow-rotate-right"></i></button>
                    </div>
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
                                    echo '
                                    <tr>
                                        <td>'.$order['id'].'</td>
                                        <td>'.$order['username'].'</td>
                                        <td>'.$order['phone'].'</td>
                                        <td>'.$order['address'].'</td>
                                        <td>'.$order['created_at'].'</td>
                                        <td>'.number_format($order['total_price'], 0, ',', '.').' ₫</td>
                                        <td>
                                            <span class="status status-'.$order['order_status_status'].'">'.$order['status'].'</span>
                                        </td>
                                        <td class="update-status">
                                        ';
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
                                        echo '</td>
                                        <td class="control">
                                            <a href="index.php?page=orderdetails&id='.$order['id'].'" class="btn-detail"><i class="fa-regular fa-eye"></i> Chi tiết</a>
                                        </td>
                            </tr>
                                    ';
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
