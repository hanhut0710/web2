<?php 
    require_once "./backend/order.php";
    $order = new Order();

    if(isset($_GET['id'])){
        $orderID = $_GET['id'];
        $detailLeft = $order -> getOrderDetailLeftByID($orderID);
        $detailRight = $order -> getOrderDetailRightByID($orderID);
        // echo '<pre>';
        // print_r($detailRight);
        // echo '</pre>';
        }

?>
    
    <main class="content">
        <div class="form-all-content-order">
                <div class="modal-detail-order">
                    <div class="modal-detail-left">
                       <?php foreach($detailLeft as $infor){
                       echo  '
                        <div class="order-item-group">
                            <div class="order-product">
                                <div class="order-product-left">
                                    <img src="../'.$infor['img_src'].'" alt="">
                                    <div class="order-product-info">
                                        <h4>'.$infor['name'].'</h4>
                                        <p class="order-product-quantity">SL : '.$infor['quantity'].'</p>
                                        <p class="order-product-quantity">Size : '.$infor['size'].'</p>
                                        <p class="order-product-quantity">Color : '.$infor['color'].'</p>
                                    </div>
                                </div>
                                <div class="order-product-right">
                                    <div class="order-product-price">
                                        <span class="order-product-current-price">'.number_format($infor['price'], 0, ',', '.').' ₫</span>
                                    </div>                         
                                </div>
                            </div>
                        </div>
                        ';
                        } 
                        ?>
                    </div>
                    <?php
                    echo '
                    <div class="modal-detail-right">
                        <ul class="detail-order-group">
                            <li class="detail-order-item">
                                <span class="detail-order-item-left"><i class="fa fa-shopping-basket"></i> Mã đơn hàng</span>
                                <span class="detail-order-item-right">'.$detailRight['id'].'</span>
                            </li>
                            <li class="detail-order-item">
                                <span class="detail-order-item-left"><i class="fa-light fa-calendar-days"></i> Ngày đặt hàng</span>
                                <span class="detail-order-item-right">'.$detailRight['created_at'].'</span>
                            </li>
                            <li class="detail-order-item">
                                <span class="detail-order-item-left"><i class="fa-solid fa-wallet"></i> Phương thức thanh toán</span>
                                <span class="detail-order-item-right">'.(($detailRight['pay_method'] == 'cash') ? 'Tiền mặt' : 'Chuyển khoản').'</span>
                            </li>
                            <li class="detail-order-item">
                                <span class="detail-order-item-left"><i class="fa-thin fa-person"></i> Người nhận</span>
                                <span class="detail-order-item-right">'.$detailRight['name'].'</span>
                            </li>
                            <li class="detail-order-item">
                                <span class="detail-order-item-left"><i class="fa-solid fa-user"></i> Tài khoản đặt hàng</span>
                                <span class="detail-order-item-right">'.$detailRight['username'].'</span>
                            </li>
                             <li class="detail-order-item">
                                <span class="detail-order-item-left"><i class="fa-solid fa-envelope"></i>Email</span>
                                <span class="detail-order-item-right">'.$detailRight['email'].'</span>
                            </li>
                            <li class="detail-order-item">
                                <span class="detail-order-item-left"><i class="fa-light fa-phone"></i> Số điện thoại</span>
                                <span class="detail-order-item-right">'.$detailRight['phone'].'</span>
                            </li>
                            <li class="detail-order-item tb">
                                <span class="detail-order-item-t"><i class="fa-light fa-location-dot"></i> Địa chỉ nhận</span>
                                <p class="detail-order-item-b">'.$detailRight['address'].'</p>
                            </li>
                        </ul>
                    </div>
                    
                </div>

                <div class="modal-detail-bottom">
                    <div class="modal-detail-bottom-left">
                        <div class="price-total">
                            <span class="thanhtien">Thành tiền</span>
                            <span class="price">'.number_format($detailRight['total_price'], 0, ',', '.').'₫</span>
                        </div>
                    </div>
                    
                    <div class="modal-detail-bottom-right">      
                    <div class="status-group">                 
                        <span class="status status-'.$detailRight['statusEng'].'">
                        '.$detailRight['status'].'
                        </span>
                    </div>
                    ';
                    if($detailRight['statusEng'] != 'delivered' && $detailRight['statusEng'] != 'cancelled'){
                        
                        if($detailRight['statusEng'] == 'pending')
                            echo '<a href="./backend/xulyOrder.php?id='.$detailRight['id'].'&status=packing&from=details" onclick="return confirmPacking()" class="modal-detail-btn btn-packing">
                        <i class="fa-solid fa-check"></i> Xác nhận</a>';
                        if($detailRight['statusEng'] == 'packing')
                            echo '<a href="./backend/xulyOrder.php?id='.$detailRight['id'].'&status=shipping&from=details" onclick="return confirmShipping()" class="modal-detail-btn btn-shipping">
                        <i class="fa-solid fa-truck"></i> Giao hàng</a>';
                        if($detailRight['statusEng'] == 'shipping')
                            echo '<a href="./backend/xulyOrder.php?id='.$detailRight['id'].'&status=delivered&from=details" onclick="return confirmDelivered()" class="modal-detail-btn btn-delivered">
                        <i class="fa-solid fa-check-circle"></i> Hoàn tất</a>';
                            echo '<a href="./backend/xulyOrder.php?id='.$detailRight['id'].'&status=cancelled&from=details" onclick="return confirmCancel()" class="modal-detail-btn btn-cancel-order">
                        <i class="fa-solid fa-times"></i> Hủy đơn</a>';
                }
                    
                    ?>
                    </div>
                </div>                                  
            </div>
        </main>
        </div>


    <!-- JavaScripts -->
    <!-- <script>
        function status(){
            alert('Thay đổi trạng thái thành công!');
            location.href='order.html';
        }
    </script> -->
</body>

</html>

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