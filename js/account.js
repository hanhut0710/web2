// Lấy thẻ a với class 'edit-button'
const editButton = document.getElementById('edit-button');

// Lấy tất cả các phần tử cần vô hiệu hóa
// Thêm sự kiện cho edit-button
editButton.addEventListener('click', function(event) {
    // Chặn hành động mặc định của thẻ a
    event.preventDefault();
    const disableElements = document.querySelectorAll('input, select, textarea, button, .stardust-radio-button, .nice-select, .custom-button, #add_address');
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
document.getElementById('add_address').addEventListener('click', function () {
    // Xóa form cũ nếu đã có
    const oldForm = document.getElementById('address_form');
    if (oldForm) oldForm.remove();

    // Tạo div chứa form
    const form = document.createElement('div');
    form.id = 'address_form';
    form.className = 'address-form-overlay';

    // Tạo Tỉnh/Thành phố
    const cityBox = document.createElement('div');
    cityBox.className = 'box-select';
    const cityInputBox = document.createElement('div');
    cityInputBox.className = 'box-input box-input--hasvalue';

    const cityInput = document.createElement('input');
    cityInput.type = 'search';
    cityInput.id = 'box-select-city';
    cityInput.placeholder = 'Hồ Chí Minh';
    cityInput.className = 'box-input__main';
    cityInput.value = 'Hồ Chí Minh';
    cityInput.setAttribute('readonly', true);

    const cityLabel = document.createElement('label');
    cityLabel.setAttribute('for', 'box-select-city');
    cityLabel.className = 'email-label';
    cityLabel.textContent = 'Tỉnh / Thành phố';

    cityInputBox.appendChild(cityInput);
    cityInputBox.appendChild(cityLabel);
    cityBox.appendChild(cityInputBox);

    // Tạo Quận/Huyện
    const districtBox = document.createElement('div');
    districtBox.className = 'box-input';

    const districtInput = document.createElement('input');
    districtInput.type = 'search';
    districtInput.id = 'box-select-district';
    districtInput.placeholder = '';
    districtInput.className = 'box-input__main';

    const districtLabel = document.createElement('label');
    districtLabel.setAttribute('for', 'box-select-district');
    districtLabel.className = 'email-label';
    districtLabel.textContent = 'Quận / Huyện';

    const districtDropdown = document.createElement('div');
    districtDropdown.id = 'districtDropdown';
    districtDropdown.className = 'dropdown';
    const districts = ['Huyện Bình Chánh', 'Huyện Cần Giờ', 'Huyện Hóc Môn', 'Huyện Nhà Bè', 'Huyện Củ Chi', 'Quận 1', 'Quận 2', 'Quận 3', 'Quận 4', 'Quận 5', 'Quận 6', 'Quận 7', 'Quận 8', 'Quận 9', 'Quận 10', 'Quận 11', 'Quận 12', 'Quận Bình Tân', 'Quận Bình Thạnh', 'Quận Tân Phú', 'Quận Gò Vấp', 'Quận Phú Nhuận', 'Quận Tân Bình'];
    districts.forEach(district => {
        const districtItem = document.createElement('div');
        districtItem.className = 'dropdown__item';
        districtItem.textContent = district;
        districtDropdown.appendChild(districtItem);
    });
    districtInput.addEventListener('click', function(){
        if(districtInput.value){
            districtInput.setAttribute("placeholder", districtInput.value); // Đặt placeholder là giá trị hiện tại
            districtInput.setAttribute("autocomplete", "off"); // Tắt autocomplete từ trình duyệt
            districtInput.value = "";
        }
        districtDropdown.classList.toggle("Dropdownvisible"); // Toggle hiển thị dropdown
        filterDistricts(""); // Hiển thị tất cả các mục khi người dùng mở dropdown
    });
    districtInput.addEventListener("input", function () {
    const input = districtInput
      .value.toLowerCase();
    filterDistricts(input);
}); // Gọi hàm lọc với giá trị hiện tại
    districtBox.appendChild(districtInput);
    districtBox.appendChild(districtLabel);
    districtBox.appendChild(districtDropdown);
    cityBox.appendChild(districtBox);

    // Tạo Phường/Xã
    const wardBox = document.createElement('div');
    wardBox.className = 'box-select';
    const wardInputBox = document.createElement('div');
    wardInputBox.className = 'box-input';

    const wardInput = document.createElement('input');
    wardInput.id = 'box-select-ward';
    wardInput.type = 'search';
    wardInput.placeholder = '';
    wardInput.className = 'box-input__main';

    const wardLabel = document.createElement('label');
    wardLabel.setAttribute('for', 'box-select-ward');
    wardLabel.className = 'email-label';
    wardLabel.textContent = 'Chọn phường / xã';
    const wardDropdown = document.createElement('div');
    wardDropdown.id = 'wardDropdown';
    wardDropdown.className = 'dropdown';
    let wardsByDistrict = {
        "Quận 1": [
          "Phường Bến Nghé",
          "Phường Bến Thành",
          "Phường Cô Giang",
          "Phường Cầu Kho",
          "Phường Đa Kao",
          "Phường Nguyễn Cư Trinh",
          "Phường Nguyễn Thái Bình",
          "Phường Phạm Ngũ Lão",
          "Phường Tân Định",
          "Phường Thủ Thiêm",
        ],
        "Quận 2": [
          "Phường An Khánh",
          "Phường An Lợi Đông",
          "Phường An Phú",
          "Phường Bình An",
          "Phường Bình Khánh",
          "Phường Cát Lái",
          "Phường Thạnh Mỹ Lợi",
          "Phường Thủ Thiêm",
          "Phường Tân Phú",
          "Phường Xuân Thạnh",
        ],
        "Quận 3": [
          "Phường 1",
          "Phường 2",
          "Phường 3",
          "Phường 4",
          "Phường 5",
          "Phường 6",
          "Phường 7",
          "Phường 8",
          "Phường 9",
          "Phường Võ Thị Sáu",
        ],
        "Quận 4": [
          "Phường 1",
          "Phường 2",
          "Phường 3",
          "Phường 4",
          "Phường 5",
          "Phường 6",
          "Phường 7",
          "Phường 8",
          "Phường 9",
          "Phường 10",
          "Phường 11",
        ],
        "Quận 5": [
          "Phường 1",
          "Phường 2",
          "Phường 3",
          "Phường 4",
          "Phường 5",
          "Phường 6",
          "Phường 7",
          "Phường 8",
          "Phường 9",
          "Phường 10",
          "Phường 11",
        ],
        "Quận 6": [
          "Phường 1",
          "Phường 2",
          "Phường 3",
          "Phường 4",
          "Phường 5",
          "Phường 6",
          "Phường 7",
          "Phường 8",
          "Phường 9",
          "Phường 10",
        ],
        "Quận 7": [
          "Phường Tân Kiểng",
          "Phường Tân Hưng",
          "Phường Tân Phong",
          "Phường Tân Thuận Đông",
          "Phường Tân Thuận Tây",
          "Phường Phú Mỹ",
          "Phường Bình Thuận",
          "Phường Hưng Thạnh",
          "Phường Phú Thuận",
          "Phường Xuân Thủy",
        ],
        "Quận 8": [
          "Phường 1",
          "Phường 2",
          "Phường 3",
          "Phường 4",
          "Phường 5",
          "Phường 6",
          "Phường 7",
          "Phường 8",
          "Phường 9",
          "Phường 10",
          "Phường 11",
          "Phường 12",
          "Phường 13",
          "Phường 14",
          "Phường 15",
        ],
        "Quận 9": [
          "Phường Hiệp Phú",
          "Phường Long Bình",
          "Phường Long Thạnh Mỹ",
          "Phường Phú Hữu",
          "Phường Tân Phú",
          "Phường Trường Thạnh",
          "Phường Tam Bình",
          "Phường Linh Đông",
          "Phường Linh Xuân",
          "Phường An Phú",
          "Phường Bình An",
        ],
        "Quận 10": [
          "Phường 1",
          "Phường 2",
          "Phường 3",
          "Phường 4",
          "Phường 5",
          "Phường 6",
          "Phường 7",
          "Phường 8",
          "Phường 9",
          "Phường 10",
        ],
        "Quận 11": [
          "Phường 1",
          "Phường 2",
          "Phường 3",
          "Phường 4",
          "Phường 5",
          "Phường 6",
          "Phường 7",
          "Phường 8",
          "Phường 9",
          "Phường 10",
        ],
        "Quận 12": [
          "Phường An Phú Đông",
          "Phường Đông Hưng Thuận",
          "Phường Hiệp Thành",
          "Phường Tân Chánh Hiệp",
          "Phường Tân Hưng Thuận",
          "Phường Tân Thới Nhất",
          "Phường Tân Thới Hiệp",
          "Phường Thạnh Lộc",
          "Phường Thạnh Xuân",
          "Phường Trung Mỹ Tây",
        ],
        "Huyện Bình Chánh": [
          "Xã Bình Hưng",
          "Xã Bình Lợi",
          "Xã Bình Tân",
          "Xã Hưng Long",
          "Xã Lê Minh Xuân",
          "Xã Phạm Văn Hai",
          "Xã Tân Kiên",
          "Xã Tân Quý Tây",
          "Xã Vĩnh Lộc A",
          "Xã Vĩnh Lộc B",
          "Thị trấn Tân Túc",
        ],
        "Quận Bình Tân": [
          "Phường Bình Hưng Hòa",
          "Phường Bình Hưng Hòa A",
          "Phường Bình Hưng Hòa B",
          "Phường Bình Trị Đông",
          "Phường Bình Trị Đông A",
          "Phường Bình Trị Đông B",
          "Phường An Lạc",
          "Phường An Lạc A",
          "Phường An Lạc B",
          "Phường Tân Tạo",
          "Phường Tân Tạo A",
          "Phường Tân Tạo B",
        ],
        "Huyện Cần Giờ": [
          "Thị trấn Cần Thạnh",
          "Xã Bình Khánh",
          "Xã An Thới Đông",
          "Xã Cần Thạnh",
          "Xã Long Hòa",
          "Xã Tam Thôn Hiệp",
          "Xã Phú Mỹ",
        ],
        "Huyện Củ Chi": [
          "Trung Lập Hạ",
          "Thị trấn Củ Chi",
          "Xã Phước Hiệp",
          "Xã Phước Vĩnh An",
          "Xã Tân An Hội",
          "Xã Tân Phú Trung",
          "Xã Nhuận Đức",
          "Xã Bình Mỹ",
          "Xã Hòa Phú",
          "Xã An Nhơn Tây",
          "Xã Trung An",
          "Xã Tân Thạnh Tây",
          "Xã Tân Thông Hội",
          "Xã Lê Minh Xuân",
        ],
        "Huyện Hóc Môn": [
          "Thị trấn Hóc Môn",
          "Xã Bà Điểm",
          "Xã Đông Thạnh",
          "Xã Nhị Bình",
          "Xã Tân Hiệp",
          "Xã Tân Thới Nhì",
          "Xã Tân Xuân",
          "Xã Xuân Thới Sơn",
          "Xã Xuân Thới Thượng",
        ],
        "Huyện Nhà Bè": [
          "Thị trấn Nhà Bè",
          "Xã Hiệp Phước",
          "Xã Long Thới",
          "Xã Phước Kiển",
          "Xã Nhơn Đức",
          "Xã Tân Quý Tây",
          "Xã An Phú",
          "Xã Phước An",
        ],
        "Quận Gò Vấp": [
          "Phường 1",
          "Phường 2",
          "Phường 3",
          "Phường 4",
          "Phường 5",
          "Phường 6",
          "Phường 7",
          "Phường 8",
          "Phường 9",
          "Phường 10",
          "Phường 11",
          "Phường 12",
        ],
        "Quận Tân Phú": [
          "Phường Tân Quý",
          "Phường Tân Thới Nhất",
          "Phường Phú Thọ Hòa",
          "Phường Sơn Kỳ",
          "Phường Tân Sơn Nhì",
          "Phường Hiệp Tân",
          "Phường Hòa Thạnh",
          "Phường Tây Thạnh",
          "Phường Phú Trung",
          "Phường Nguyễn Sơn",
        ],
        "Quận Phú Nhuận": [
          "Phường 1",
          "Phường 2",
          "Phường 3",
          "Phường 4",
          "Phường 5",
          "Phường 7",
          "Phường 9",
          "Phường 10",
          "Phường 11",
          "Phường 12",
        ],
        "Quận Tân Bình": [
          "Phường 1",
          "Phường 2",
          "Phường 3",
          "Phường 4",
          "Phường 5",
          "Phường 6",
          "Phường 7",
          "Phường 8",
          "Phường 9",
          "Phường 10",
          "Phường 11",
          "Phường 12",
        ],
        "Quận Bình Thạnh": [
          "Phường 1",
          "Phường 2",
          "Phường 3",
          "Phường 4",
          "Phường 5",
          "Phường 6",
          "Phường 7",
          "Phường 8",
          "Phường 9",
          "Phường 10",
          "Phường 11",
          "Phường 12",
          "Phường 13",
          "Phường 14",
          "Phường 15",
        ],
        // Thêm các quận/huyện và danh sách phường/xã tương ứng
      };
    wardInputBox.appendChild(wardInput);
    wardInputBox.appendChild(wardLabel);
    wardBox.appendChild(wardInputBox);
    wardInputBox.appendChild(wardDropdown);

    wardInput.addEventListener("focus", function () {
        console.log(districtInput.value);
        console.log(wardDropdown);
    if (!districtInput.value) {
      wardDropdown.innerHTML =
        "<div class='dropdown__item'>Vui lòng chọn Quận/huyện trước</div>";
      wardDropdown.classList.add("Dropdownvisible");
    } else {
      // Nếu đã có dữ liệu trong `box-select-district`, hiển thị danh sách phường/xã tương ứng
      wardDropdown.innerHTML = ""; // Xóa nội dung cũ
      const wards = wardsByDistrict[districtInput.value] || [];
      if (wardInput.value) {
        wardInput.setAttribute("placeholder", input.value); // Đặt placeholder là giá trị hiện tại
        wardInput.value = "";
      }
      // Kiểm tra có phường/xã nào cho quận/huyện đã chọn
      if (wards.length > 0) {
        wards.forEach((ward) => {
            const item = document.createElement("div");
            item.classList.add("dropdown__item");
            item.innerHTML = `<span>${ward}</span>`;
            item.addEventListener("click", function () {
                wardInput.value = ward;
                if (wardInputBox) {
                wardInputBox.classList.add("box-input--hasvalue");
                }
                // Ẩn dropdown
                if (wardDropdown) {
                wardDropdown.classList.remove("Dropdownvisible");
                }
            });
            wardDropdown.appendChild(item);
            });
        } else {
            wardDropdown.innerHTML =
            "<div class='dropdown__item'>Không tìm thấy Phường/Xã</div>";
        }
      wardDropdown.classList.add("Dropdownvisible");
    }
  });

  document.addEventListener("click", function (event) {
    // Click ngoài Quận/Huyện
    if (!districtInput.contains(event.target) && !districtDropdown.contains(event.target)) {
      districtDropdown.classList.remove("Dropdownvisible");
      if (districtInput.value.trim() === "") {
        districtInput.setAttribute("placeholder", "Quận / Huyện");
        if (districtBox) districtBox.classList.remove("box-input--hasvalue");
      }
    }
    if (
        !wardInput.contains(event.target) &&
        !wardDropdown.contains(event.target)
      ) {
        wardDropdown.classList.remove("Dropdownvisible");
        if(wardInput.value.trim() == ""){
        wardInput.setAttribute("placeholder", "Phường / Xã");
        if (wardInputBox) wardInputBox.classList.remove("box-input--hasvalue");
        }
      }
  });
    // Tạo Địa chỉ chi tiết

    const addressInputBox = document.createElement('div');
    addressInputBox.className = 'box-input';

    const addressInput = document.createElement('input');
    addressInput.id = 'box-select-address';
    addressInput.type = 'text';
    addressInput.placeholder = '';
    addressInput.className = 'box-input__main';

    const addressLabel = document.createElement('label');
    addressLabel.setAttribute('for', 'box-select-address');
    addressLabel.className = 'email-label';
    addressLabel.textContent = 'Địa chỉ';

    addressInput.addEventListener("input" , function(){
        if(addressInput.value.trim() !== ''){
            addressInputBox.classList.add('box-input--hasvalue');
        } else {
            addressInputBox.classList.remove('box-input--hasvalue');
        }
    });
    addressInputBox.appendChild(addressInput);
    addressInputBox.appendChild(addressLabel);
    wardBox.appendChild(addressInputBox);

    // Thêm các phần tử vào form
    form.appendChild(cityBox);
    form.appendChild(wardBox);
    // Nút đóng form
    const closeBtn = document.createElement('span');
    closeBtn.textContent = '×';
    closeBtn.className = 'close-btn';
    closeBtn.addEventListener('click', () => form.remove());
    // Tạo khung chứa nút
    const buttonContainer = document.createElement('div');
    buttonContainer.className = 'form-button-group';

    // Nút "Đặt làm mặc định"
    const defaultBtn = document.createElement('button');
    defaultBtn.type = 'button';
    defaultBtn.textContent = 'Đặt làm mặc định';
    defaultBtn.className = 'btn btn-default';
    defaultBtn.addEventListener('click', () => {
        alert('Đã đặt làm mặc định!');
        // Thực hiện logic đặt địa chỉ làm mặc định tại đây
    });

    // Nút "Lưu"
    const saveBtn = document.createElement('button');
    saveBtn.type = 'button';
    saveBtn.textContent = 'Lưu';
    saveBtn.className = 'custom-button';
    saveBtn.addEventListener('click', () => {

        alert('Đã lưu địa chỉ!');
    });

    // Gắn 2 nút vào buttonContainer
    buttonContainer.appendChild(defaultBtn);
    buttonContainer.appendChild(saveBtn);

    // Thêm khung nút vào form
    form.appendChild(buttonContainer);
    form.appendChild(closeBtn);

    // Thêm form vào body
    document.body.appendChild(form);
    function filterDistricts(query) {
        districtDropdown.innerHTML = ""; // Xóa nội dung cũ của dropdown
      
        const filteredDistricts = districts.filter((district) =>
          district.toLowerCase().includes(query)
        );
        if (filteredDistricts.length > 0) {
          // Hiển thị các quận/huyện phù hợp
          districtDropdown.innerHTML = ""; // Xóa nội dung cũ của dropdown
          filteredDistricts.forEach((district) => {
            const item = document.createElement("div");
            item.classList.add("dropdown__item");
            item.innerHTML = `<span>${district}</span>`;
            item.addEventListener("click", function () {
              if (districtInput.placeholder != district) {
                wardInput.value = ""; // Reset xã/phường nếu đổi quận/huyện
                if (wardInputBox) wardInputBox.classList.remove("box-input--hasvalue");
              }
              districtInput.value = district;
              districtInput.removeAttribute("placeholder");
              districtDropdown.classList.remove("Dropdownvisible");
            districtBox.classList.add("box-input--hasvalue");
            });
            districtDropdown.appendChild(item);
          });
        } else {
          // Hiển thị thông báo khi không tìm thấy kết quả
          const noResultItem = document.createElement("div");
          noResultItem.classList.add("dropdown__item");
          noResultItem.innerHTML = "<span>Không tìm thấy Quận/huyện</span>";
          districtDropdown.appendChild(noResultItem);
        }
      
        // Hiển thị dropdown nếu có kết quả, ẩn nếu không
        if (query || filteredDistricts.length > 0) {
          districtDropdown.classList.add("Dropdownvisible");
        } else {
          districtDropdown.classList.remove("Dropdownvisible");
        }
      }
});

