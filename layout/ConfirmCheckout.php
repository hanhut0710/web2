<?php
// Nhận dữ liệu từ fetch POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
   // Thông tin khách hàng
   $order = [
    'ho' => $_POST['ho'] ?? '',
    'ten' => $_POST['ten'] ?? '',
    'phone' => $_POST['phone'] ?? '',
    'email' => $_POST['email'] ?? '',
    'district' => $_POST['district'] ?? '',
    'ward' => $_POST['ward'] ?? '',
    'address' => $_POST['address'] ?? '',
    'note' => $_POST['note'] ?? '',
    'payment_method' => $_POST['payment_method'] ?? 'COD',
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
        <p><?= htmlspecialchars($order['address']) ?>, <?= htmlspecialchars($order['ward']) ?>, <?= htmlspecialchars($order['district']) ?></p>
      </div>

      <div class="info-group">
        <label>Phương thức thanh toán:</label>
        <p><?= htmlspecialchars($order['payment_method']) ?></p>
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

    <?php if ($order['payment_method'] === 'PayPal' && $card): ?>
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
          <tr>
            <td><img src="images/aothun.jpg" alt="Áo thun nam" width="60" height="60"></td>
            <td>Áo thun nam</td>
            <td>2</td>
            <td>150,000₫</td>
            <td>300,000₫</td>
          </tr>
          <tr>
            <td><img src="images/quanjeans.jpg" alt="Quần jeans" width="60" height="60"></td>
            <td>Quần jeans</td>
            <td>1</td>
            <td>350,000₫</td>
            <td>350,000₫</td>
          </tr>
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

    <h3 class="total">Tổng tiền cần thanh toán: 680,000₫</h3>

    <form action="ThanhToanFinal.php" method="post">
      <input type="hidden" name="confirm" value="yes">
      <button type="submit">Xác nhận đơn hàng</button>
    </form>
  <?php else: ?>
    <p>Không có dữ liệu đơn hàng. Vui lòng quay lại trang giỏ hàng.</p>
  <?php endif; ?>
</div>