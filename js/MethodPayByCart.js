function submitPayment(event) {
  event.preventDefault(); // Ngăn reload trang

  // Lấy giá trị từ form
  const cardholder = document.getElementById('cardholder').value.trim();
  const cardnumber = document.getElementById('cardnumber').value.replace(/\s/g, '');
  const expiryMonth = document.getElementById('expiry-month').value;
  const expiryYear = document.getElementById('expiry-year').value;
  const cvv = document.getElementById('cvv').value.trim();

  // Kiểm tra đơn giản
  if (!cardholder || !cardnumber || !expiryMonth || !cvv) {
    alert("Vui lòng điền đầy đủ thông tin!");
    return;
  }

  if (!/^\d{16}$/.test(cardnumber)) {
    alert("Số thẻ không hợp lệ. Vui lòng kiểm tra lại.");
    return;
  }

    if (!expiryMonth || !expiryYear) {
    alert("Vui lòng chọn ngày hết hạn.");
    return;
    }

    // So sánh với thời gian hiện tại
    const now = new Date();
    const expiryDate = new Date(`20${expiryYear}`, expiryMonth); // YYYY, MM

    if (expiryDate <= now) {
    alert("Thẻ đã hết hạn. Vui lòng kiểm tra lại.");
    return;
    }
  if (!/^\d{3,4}$/.test(cvv)) {
    alert("CVV không hợp lệ.");
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
    alert("Đã xảy ra lỗi khi gửi thanh toán.");
  });
}
