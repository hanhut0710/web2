function submitPayment(event) {
  event.preventDefault(); // Ngăn reload trang

  // Lấy giá trị từ form
  const cardholder = document.getElementById('cardholder').value.trim();
  const cardnumber = document.getElementById('cardnumber').value.replace(/\s/g, '');
  const expiryMonth = document.getElementById('expiry-month').value;
  const expiryYear = document.getElementById('expiry-year').value;
  const cvv = document.getElementById('cvv').value.trim();

  // Kiểm tra đơn giản

  if (!/^\d{16}$/.test(cardnumber)) {
    showToast("Số thẻ không hợp lệ. Vui lòng kiểm tra lại.","fail");
    return;
  }

    if (!expiryMonth) {
    showToast("Vui lòng chọn tháng hết hạn.","fail");
    return;
    }
    if (!expiryYear) {
      showToast("Vui lòng chọn năm hết hạn.","fail");
      return;
    }

    // So sánh với thời gian hiện tại
    const now = new Date();
    const expiryDate = new Date(`20${expiryYear}`, expiryMonth); // YYYY, MM

    if (expiryDate <= now) {
    showToast("Thẻ đã hết hạn. Vui lòng kiểm tra lại.","fail");
    return;
    }
  if (!/^\d{3,4}$/.test(cvv)) {
    showToast("CVV không hợp lệ.","fail");
    return;
  }
  const paymentData = {
    cardholder,
    cardnumber,
    expiryMonth,
    expiryYear,
    cvv
  };
  // ✅ Gộp dữ liệu từ form PHP + thanh toán
  const fullData = {
    ...userDataFromPHP,
    ...paymentData
  };
  fetch('OrderConfirmation.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: new URLSearchParams(fullData)
  })
  .then(response => response.text())
  .then(result => {
    window.location.href = 'OrderConfirmation.php';
  })
  .catch(error => {
    console.error('Lỗi gửi dữ liệu:', error);
    showToast("Đã xảy ra lỗi khi gửi thanh toán.","fail");
  });
}
