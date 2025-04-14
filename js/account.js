// Lấy thẻ a với class 'edit-button'
const editButton = document.getElementById('edit-button');

// Lấy tất cả các phần tử cần vô hiệu hóa
// Thêm sự kiện cho edit-button
editButton.addEventListener('click', function(event) {
    // Chặn hành động mặc định của thẻ a
    event.preventDefault();
    const disableElements = document.querySelectorAll('input, select, textarea, button, .stardust-radio-button, .nice-select, .custom-button');
    // Lặp qua tất cả các phần tử và bật lại khả năng tương tác
    disableElements.forEach(function(element) {
        element.style.pointerEvents = 'auto'; // Cho phép tương tác
        element.style.opacity = '1'; // Đặt độ mờ trở lại bình thường
    });
});
//--------------Save--------------------

document.getElementById('save-button').addEventListener('click', function(event) {
    const FullName = document.getElementById('FullName').value;
    const Phone = document.getElementById('Phone').value;
    const districtInput = document.getElementById("box-select-district").value;
    const input = document.getElementById("box-select-ward").value; // lấy giá trị
    const address = document.getElementById('box-select-address');
    // Ngăn chặn hành động gửi form (nếu cần)
    event.preventDefault();

    // Vô hiệu hóa tất cả các input, select, textarea và button
    var formElements = document.querySelectorAll('input, select, textarea, .custom-button');
    formElements.forEach(function(element) {
        element.disabled = true; // Vô hiệu hóa
        element.style.pointerEvents = 'none'; // Không cho phép tương tác
        element.style.opacity = '0.5'; // Làm mờ phần tử
    });
    if (districtInput && !input) {
        alert('Vui lòng chọn phường/xã!');
    } else if(!address) {
        alert('Vui lòng nhập địa chỉ!');
    }
    fetch('./handle/account_saveInfphp', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded' // hoặc 'application/json' nếu bạn dùng JSON
        },
        body: new URLSearchParams({
            FullName: FullName,
            Phone: Phone,
            District: districtInput,
            Ward: input,
            Address: address
        })
    })
    .then(response => response.text()) // hoặc .json() nếu bạn trả về JSON
    .then(data => {
        alert('Dữ liệu đã được lưu!');
        console.log('Kết quả từ server:', data);

        // Vô hiệu hóa form sau khi lưu
        const formElements = document.querySelectorAll('input, select, textarea, .custom-button');
        formElements.forEach(function(element) {
            element.disabled = true;
            element.style.pointerEvents = 'none';
            element.style.opacity = '0.5';
        });
    })
    .catch(error => {
        console.error('Lỗi khi gửi dữ liệu:', error);
        alert('Có lỗi xảy ra khi lưu thông tin!');
    });
    
});
