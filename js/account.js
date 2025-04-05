// Lấy thẻ a với class 'edit-button'
const editButton = document.getElementById('edit-button');

// Lấy tất cả các phần tử cần vô hiệu hóa
const disableElements = document.querySelectorAll('input, select, textarea, button, .stardust-radio-button, .nice-select');

// Thêm sự kiện cho edit-button
editButton.addEventListener('click', function(event) {
    // Chặn hành động mặc định của thẻ a
    event.preventDefault();

    // Lặp qua tất cả các phần tử và bật lại khả năng tương tác
    disableElements.forEach(function(element) {
        element.style.pointerEvents = 'auto'; // Cho phép tương tác
        element.style.opacity = '1'; // Đặt độ mờ trở lại bình thường
    });
});
//--------------Save--------------------
document.getElementById('saveButton').addEventListener('click', function(event) {
    // Ngăn chặn hành động gửi form (nếu cần)
    event.preventDefault();

    // Vô hiệu hóa tất cả các input, select, textarea và button
    var formElements = document.querySelectorAll('input, select, textarea, button');
    formElements.forEach(function(element) {
        element.disabled = true; // Vô hiệu hóa
        element.style.pointerEvents = 'none'; // Không cho phép tương tác
        element.style.opacity = '0.5'; // Làm mờ phần tử
    });
    alert('Dữ liệu đã được lưu!'); // Thay thế với hành động thực tế của bạn
});
