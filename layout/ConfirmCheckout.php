<?php
// Nhận dữ liệu từ fetch POST
require_once './class/Cart.php'; // chỉnh đường dẫn nếu cần
require_once './handle/connect.php';
require_once './class/address.php';
$cart = new Cart();
$address_str = '';
$cartItems = $cart->getCartByUserId($_SESSION['user_id'],$con);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
   // Thông tin khách hàng
   if (!empty($_POST['address_id'])) {
    $addressObj = new Address();
    if ($addressObj->getAddressById($_POST['address_id'], $con)) {
        // Gộp thông tin địa chỉ thành 1 chuỗi
        $address_str = $addressObj->getAddressLine() . ', ' .
                       $addressObj->getWard() . ', ' .
                       $addressObj->getDistrict() . ', ' .
                       $addressObj->getCity();
    }
  }
   $order = [
    'ho' => $_POST['ho'] ?? '',
    'ten' => $_POST['ten'] ?? '',
    'phone' => $_POST['phone'] ?? '',
    'email' => $_POST['email'] ?? '',
    'address' => $address_str ?? '',
    'address_id' => $_POST['address_id'],
    'note' => $_POST['note'] ?? '',
    'payment_method' => $_POST['payment_method'] ?? 'cash',
];
// Thông tin thẻ (nếu có)
$cardInfo = [
    'cardholder' => $_POST['cardholder'] ?? '',
    'cardnumber' => $_POST['cardnumber'] ?? '',
    'expiryMonth' => $_POST['expiryMonth'] ?? '',
    'expiryYear' => $_POST['expiryYear'] ?? '',
    'cvv' => $_POST['cvv'] ?? '',
];

// Lưu thông tin vào session (hoặc có thể xử lý lưu CSDL ở đây)
$_SESSION['order'] = $order;
$_SESSION['card'] = $cardInfo;
$_SESSION['cart'] = $cartItems;
}
?>

<?php
$order = $_SESSION['order'] ?? null;
$card = $_SESSION['card'] ?? null;
?>
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Thanh Toán</h4>
                    <div class="breadcrumb__links">
                        <a href="./index.php">Trang Chủ</a>
                        <a href="./shop.php">Cửa Hàng</a>
                        <span>Thanh Toán</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
  <div class="form">
  <h2>Xác Nhận Đặt Hàng</h2>

  <?php if ($order): ?>
    <div class="info-flex">
      <div class="info-group">
        <label>Họ và Tên:</label>
        <p><?= htmlspecialchars($order['ho'] . ' ' . $order['ten']) ?></p>
      </div>

      <div class="info-group">
        <label>Email:</label>
        <p><?= htmlspecialchars($order['email']) ?></p>
      </div>

      <div class="info-group">
        <label>Số điện thoại:</label>
        <p><?= htmlspecialchars($order['phone']) ?></p>
      </div>

      <div class="info-group">
        <label>Địa chỉ nhận hàng:</label>
        <p><?= htmlspecialchars($order['address']) ?></p>
      </div>

      <div class="info-group">
        <label>Phương thức thanh toán:</label>
        <?php  if ($order['payment_method'] === "banking" ): ?>
          <p>Thanh toán bằng thẻ Ngân Hàng</p>
        <?php elseif($order['payment_method'] === "cash" ): ?>
          <p> Thanh toán khi nhận hàng </p>
        <?php endif; ?>          
      </div>

      <div class="info-group">
        <label>Ngày đặt hàng:</label>
        <p><?= date('d/m/Y') ?></p>
      </div>

      <div class="info-group">
        <label>Mã đơn hàng:</label>
        <p>#<?= 'DH' . date('Ymd') . rand(100, 999) ?></p>
      </div>

      <div class="info-group full-width">
        <label>Ghi chú đơn hàng:</label>
        <p><?= htmlspecialchars($order['note'] ?? '')?></p>
      </div>
    </div>

    <?php if ($order['payment_method'] === 'banking' && $card): ?>
      <div class="info-group full-width">
        <label>Thông tin thẻ:</label>
        <p>Chủ thẻ: <?= htmlspecialchars($card['cardholder']) ?></p>
        <p>Số thẻ: **** **** **** <?= substr($card['cardnumber'], -4) ?></p>
        <p>Hết hạn: <?= htmlspecialchars($card['expiryMonth']) ?>/<?= htmlspecialchars($card['expiryYear']) ?></p>
      </div>
    <?php endif; ?>

    <div class="info-group full-width">
      <label>Danh sách sản phẩm:</label>
      <table>
        <thead>
          <tr>
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Thành tiền</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $total = 0;
          foreach ($cartItems as $item):
              $thanhTien = $item['quantity'] * $item['price'];
              $total += $thanhTien;
          ?>
            <tr>
              <td><img src="<?= htmlspecialchars($item['img_src']) ?>" alt="<?= htmlspecialchars($item['product_name']) ?>" width="200" height="120"></td>
              <td><?= htmlspecialchars($item['product_name']) ?></td>
              <td><?= htmlspecialchars($item['quantity']) ?></td>
              <td><?= number_format($item['price'], 0, ',', '.') ?>₫</td>
              <td><?= number_format($thanhTien, 0, ',', '.') ?>₫</td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <div class="info-flex">
      <div class="info-group">
        <label>Phí vận chuyển:</label>
        <p>30,000₫</p>
      </div>

      <div class="info-group">
        <label>Giảm giá:</label>
        <p>0₫</p>
      </div>
    </div>

    <h3 class="total">Tổng tiền cần thanh toán: 
      <span id="total-item"><?= number_format($total + 30000, 0, ',', '.') ?>₫</span>
    </h3>

    <form action="./ThanhToanFinal.php" method="post">
      <input type="hidden" name="confirm" value="yes">
      <button type="submit">Xác nhận đơn hàng</button>
    </form>
  <?php else: ?>
    <p>Không có dữ liệu đơn hàng. Vui lòng quay lại trang giỏ hàng.</p>
  <?php endif; ?>
  </div>
</div>

