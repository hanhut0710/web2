
<?php
$thongTinNguoiDung = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $thongTinNguoiDung = [
        'ho' => $_POST['ho'] ?? '',
        'ten' => $_POST['ten'] ?? '',
        'phone' => $_POST['phone'] ?? '',
        'email' => $_POST['email'] ?? '',
        'address' => $address_str ?? '',
        'address_id' => $_POST['address_id'],
        'note' => $_POST['note'] ?? '',
        'payment_method' => $_POST['payment_method_paypal'] ?? 'banking',
    ];
}
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
<div class="container" style="padding: 100px">
  <form class="payment-form" id="cardForm" onsubmit="submitPayment(event)">
    <h2>Thanh Toán Bằng Thẻ</h2>
    <p class="subtext">Vui lòng điền đầy đủ thông tin thẻ ngân hàng để hoàn tất thanh toán.</p>

    <div class="card-icons">
      <img src="https://img.icons8.com/color/48/000000/visa.png"/>
      <img src="https://img.icons8.com/color/48/000000/mastercard-logo.png"/>
    </div>

    <label for="cardholder">Tên chủ thẻ</label>
    <input type="text" id="cardholder" placeholder="Họ và Tên" name="name" required>

    <label for="cardnumber">Số thẻ</label>
    <input type="text" id="cardnumber" placeholder="XXXX XXXX XXXX XXXX" maxlength="19" name="cardnumber" required>

    <div class="form-group inline">
        <div class="expiry-container">
            <div>
                <label for="expiry-month">Tháng hết hạn</label>
                <select id="expiry-month" name="expiry-month"> 
                <option value="">MM</option>
                <script>
                    for (let i = 1; i <= 12; i++) {
                    const mm = i.toString().padStart(2, '0');
                    document.write(`<option value="${mm}">${mm}</option>`);
                    }
                </script>
                </select>
            </div>
            <div>
                <label for="expiry-year">Năm hết hạn</label>
                <select id="expiry-year" name="expiry-year">
                <option value="">YY</option>
                <!-- Sinh tự động từ năm hiện tại đến 10 năm sau -->
                <script>
                    const currentYear = new Date().getFullYear();
                    for (let i = 0; i <= 10; i++) {
                    const yy = (currentYear + i).toString().slice(-2);
                    document.write(`<option value="${yy}">${currentYear + i}</option>`);
                    }
                </script>
                </select>
            </div>
        </div>
        <div class="cvv-field">
            <label for="cvv">CVV</label>
            <input type="password" id="cvv" maxlength="4" name="cvv" required>
            <img class="cvv-icon" src="https://img.icons8.com/ios-glyphs/20/lock--v1.png" alt="cvv">
        </div>
    </div>

    <button type="submit">Xác nhận thanh toán</button>
  </form>
</div>
<script>
document.getElementById('cardnumber').addEventListener('input', function (e) {
  let value = e.target.value.replace(/\D/g, '');
  value = value.replace(/(.{4})/g, '$1 ').trim();
  e.target.value = value;
});
const userDataFromPHP = <?php echo json_encode($thongTinNguoiDung); ?>;
</script>
