<?php 
    require_once "backend/order.php";

    $user_id = isset($_GET['id']) ? $_GET['id'] : '';
    $startDate = isset($_GET['start-date']) ? $_GET['start-date'] : '2023-01-01';
    $endDate = isset($_GET['end-date']) ? $_GET['end-date'] : date('Y-m-d');

    $order = new Order();
    $orderList = $order->getOrderByTime($startDate, $endDate, $user_id);
    

?>
<div class="section active">
<?php foreach($orderList as $orderItem): ?>
        <div class="form-all-content">
                <div class="modal-detail-order">
                        <?php $orderDetail = $order->getOrderDetail($orderItem['id']); ?>
                    <div class="modal-detail-left">
                        <div class="order-item-group">
                            <?php foreach($orderDetail as $item): ?>
                                <div class="order-product">
                                    <div class="order-product-left">
                                        <img src="../<?php echo $item['img_src']; ?>" alt="">
                                        <div class="order-product-info">
                                            <h4><?php echo $item['name']; ?></h4>
                                            <p class="order-product-quantity">SL: <?php echo $item['quanlity']; ?><p>
                                            <p class="order-product-quantity">Size: <?php echo $item['size']; ?></p>
                                        </div>
                                    </div>
                                    <div class="order-product-right">
                                        <div class="order-product-price">
                                            <span class="order-product-current-price"><?php echo number_format($item['price'], 0, ',', '.'); ?> ₫</span>
                                        </div>                         
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="modal-detail-right">
                        <ul class="detail-order-group">
                            <li class="detail-order-item">
                                <span class="detail-order-item-left"><i class="fa fa-shopping-basket"></i> Mã đơn hàng</span>
                                <span class="detail-order-item-right"><?php echo $orderItem['id']?></span>
                            </li>
                            <li class="detail-order-item">
                                <span class="detail-order-item-left"><i class="fa-light fa-calendar-days"></i> Ngày đặt hàng</span>
                                <span class="detail-order-item-right"><?php echo $orderItem['created_at']?></span>
                            </li>
                            <li class="detail-order-item">
                                <span class="detail-order-item-left"><i class="fa-solid fa-wallet"></i> Phương thức thanh toán</span>
                                <span class="detail-order-item-right"><?php echo ($orderItem['pay_method'] == 'cash') ? 'Tiền mặt' : 'Chuyển khoản'; ?></span>
                            </li>
                            <li class="detail-order-item">
                                <span class="detail-order-item-left"><i class="fa-thin fa-person"></i> Người nhận</span>
                                <span class="detail-order-item-right"><?php echo $orderItem['name']?></span>
                            </li>
                            <li class="detail-order-item">
                                <span class="detail-order-item-left"><i class="fa-light fa-phone"></i> Số điện thoại</span>
                                <span class="detail-order-item-right"><?php echo $orderItem['phone']?></span>
                            </li>
                            <li class="detail-order-item tb">
                                <span class="detail-order-item-t"><i class="fa-light fa-location-dot"></i> Địa chỉ nhận</span>
                                <p class="detail-order-item-b"><?php echo $orderItem['address']?></p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="modal-detail-bottom">
                    <div class="modal-detail-bottom-left">
                        <div class="price-total">
                            <span class="thanhtien">Thành tiền</span>
                            <span class="price"><?php echo $orderItem['total_price']?></span>
                        </div>
                    </div>
                </div>                
            </div>
        <?php endforeach; ?>
</div>