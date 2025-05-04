      // Danh sách các quận/huyện có sẵn
      let IDaddress = 0;
      document.querySelectorAll('.box-select input').forEach(function(input) {
        input.disabled = true;
      });
      const districts = [
        "Huyện Bình Chánh",
        "Huyện Cần Giờ",
        "Huyện Hóc Môn",
        "Huyện Nhà Bè",
        "Huyện Củ Chi",
        "Quận 1",
        "Quận 2",
        "Quận 3",
        "Quận 4",
        "Quận 5",
        "Quận 6",
        "Quận 7",
        "Quận 8",
        "Quận 9",
        "Quận 10",
        "Quận 11",
        "Quận 12",
        "Quận Bình Tân",
        "Quận Bình Thạnh",
        "Quận Tân Phú",
        "Quận Gò Vấp",
        "Quận Phú Nhuận",
        "Quận Tân Bình",
      ]; // Thêm danh sách đầy đủ tại đây
      // Hiển thị dropdown khi click vào input và cập nhật placeholder
      document
        .getElementById("box-select-district")
        .addEventListener("click", function () {
          const input = document.getElementById("box-select-district");
          const dropdown = document.getElementById("districtDropdown");
          // Kiểm tra nếu input đã có giá trị trước đó
          if (input.value) {
            input.setAttribute("placeholder", input.value); // Đặt placeholder là giá trị hiện tại
            input.setAttribute("autocomplete", "off"); // Tắt autocomplete từ trình duyệt
            input.value = "";
          }
      
          dropdown.classList.toggle("Dropdownvisible"); // Toggle hiển thị dropdown
          filterDistricts(""); // Hiển thị tất cả các mục khi người dùng mở dropdown
        });
      
      // Lọc và cập nhật kết quả khi người dùng gõ vào input
      document
        .getElementById("box-select-district")
        .addEventListener("input", function () {
          const input = document
            .getElementById("box-select-district")
            .value.toLowerCase();
          filterDistricts(input); // Gọi hàm lọc với giá trị hiện tại
        });
      
      // Hàm để lọc và hiển thị các quận/huyện phù hợp
      function filterDistricts(query) {
        const dropdown = document.getElementById("districtDropdown");
        dropdown.innerHTML = ""; // Xóa nội dung cũ của dropdown
      
        const filteredDistricts = districts.filter((district) =>
          district.toLowerCase().includes(query)
        );
      
        if (filteredDistricts.length > 0) {
          // Hiển thị các quận/huyện phù hợp
          dropdown.innerHTML = ""; // Xóa nội dung cũ của dropdown
          filteredDistricts.forEach((district) => {
            const item = document.createElement("div");
            item.classList.add("dropdown__item");
            item.innerHTML = `<span>${district}</span>`;
            item.addEventListener("click", function () {
              const districtInput = document.getElementById("box-select-district");
              const wardInput = document.getElementById("box-select-ward");
      
              if (districtInput.placeholder != district) {
                wardInput.value = ""; // Reset xã/phường nếu đổi quận/huyện
              }
      
              districtInput.value = district;
              districtInput.removeAttribute("placeholder");
              dropdown.classList.remove("Dropdownvisible");
      
              // ✅ Gắn class --hasvalue cho box-input
              const box = districtInput.closest(".box-input");
              if (box) {
                box.classList.add("box-input--hasvalue");
              }
            });
      
            dropdown.appendChild(item);
          });
        } else {
          // Hiển thị thông báo khi không tìm thấy kết quả
          const noResultItem = document.createElement("div");
          noResultItem.classList.add("dropdown__item");
          noResultItem.innerHTML = "<span>Không tìm thấy Quận/huyện</span>";
          dropdown.appendChild(noResultItem);
        }
      
        // Hiển thị dropdown nếu có kết quả, ẩn nếu không
        if (query || filteredDistricts.length > 0) {
          dropdown.classList.add("Dropdownvisible");
        } else {
          dropdown.classList.remove("Dropdownvisible");
        }
      }
      document.addEventListener("click", function (event) {
        const inputDistrict = document.getElementById("box-select-district");
        const dropdownDistrict = document.getElementById("districtDropdown");
        const boxDistrict = inputDistrict.closest(".box-input");
      
        const inputWard = document.getElementById("box-select-ward");
        const dropdownWard = document.getElementById("wardDropdown");
        const boxWard = inputWard.closest(".box-input");
      
        // Click ngoài Quận/Huyện
        if (!inputDistrict.contains(event.target) && !dropdownDistrict.contains(event.target)) {
          dropdownDistrict.classList.remove("Dropdownvisible");
      
          if (inputDistrict.value.trim() === "") {
            inputDistrict.setAttribute("placeholder", "Quận / huyện");
            if (boxDistrict) boxDistrict.classList.remove("box-input--hasvalue");
          }
        }
      
        // Click ngoài Phường/Xã
        if (!inputWard.contains(event.target) && !dropdownWard.contains(event.target)) {
          dropdownWard.classList.remove("Dropdownvisible");
      
          if (inputWard.value.trim() === "") {
            inputWard.setAttribute("placeholder", "Phường / Xã");
            if (boxWard) boxWard.classList.remove("box-input--hasvalue");
          }
        }
      });
      // ===================================Ward Select============================
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
      const districtInput = document.getElementById("box-select-district");
      const input = document.getElementById("box-select-ward").value; // lấy giá trị
      const wardDropdown = document.getElementById("wardDropdown");
      const address = document.getElementById('box-select-address');
      document
        .getElementById("box-select-ward")
        .addEventListener("focus", function () {
          console.log(document.getElementById("box-select-ward"))
          console.log(districtInput);
          if (!districtInput.value) {
            wardDropdown.innerHTML =
              "<div class='dropdown__item'>Vui lòng chọn Quận/huyện trước</div>";
            wardDropdown.classList.add("Dropdownvisible");
          } else {
            // Nếu đã có dữ liệu trong `box-select-district`, hiển thị danh sách phường/xã tương ứng
            wardDropdown.innerHTML = ""; // Xóa nội dung cũ
            const wards = wardsByDistrict[districtInput.value] || [];
            if (input.value) {
              input.setAttribute("placeholder", input.value); // Đặt placeholder là giá trị hiện tại
              input.value = "";
            }
      
            // Kiểm tra có phường/xã nào cho quận/huyện đã chọn
            if (wards.length > 0) {
              wards.forEach((ward) => {
        const item = document.createElement("div");
        item.classList.add("dropdown__item");
        item.innerHTML = `<span>${ward}</span>`;
      
        item.addEventListener("click", function () {
          const wardInput = document.getElementById("box-select-ward");
          wardInput.value = ward;
      
          // ✅ Thêm class --hasvalue cho box-input
          const box = wardInput.closest(".box-input");
          if (box) {
            box.classList.add("box-input--hasvalue");
          }
      
          // Ẩn dropdown
          const wardDropdown = document.getElementById("wardDropdown");
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
      // Đóng dropdown khi click ra ngoài
      document.addEventListener("click", function (event) {
        const wardDropdown = document.getElementById("wardDropdown");
        const wardInput = document.getElementById("box-select-ward");
        if (
          !wardInput.contains(event.target) &&
          !wardDropdown.contains(event.target)
        ) {
          wardDropdown.classList.remove("Dropdownvisible");
          wardInput.setAttribute("placeholder", "");
        }
      });
      document.addEventListener('input', function (e) {
            // Kiểm tra xem input có class .box-input__main không
            if (e.target.classList.contains('box-input__main')) {
              const parentBox = e.target.closest('.box-input');
              if (e.target.value.trim() !== '') {
                parentBox.classList.add('box-input--hasvalue');
              } else {
                parentBox.classList.remove('box-input--hasvalue');
              }
            }
          });
          const addressInputBox =  address.closest(".box-input");
          address.addEventListener("click", function() {
          toggleHasValue(address, addressInputBox);  // Gọi hàm để thêm hoặc xóa class khi click
        });
        function toggleHasValue(address, addressInputBox) {
          // Kiểm tra nếu giá trị input không rỗng
          if (address.value.trim() !== '') {
              // Nếu có giá trị, thêm class 'box-input--hasvalue'
              addressInputBox.classList.add('box-input--hasvalue');
          } else {
              // Nếu không có giá trị, xóa class 'box-input--hasvalue'
              addressInputBox.classList.remove('box-input--hasvalue');
          }
      }

      ////Btn Chọn Địa chỉ 
    const selectBtn = document.getElementById("selectAddress");
if(selectBtn){
    selectBtn.addEventListener("click", () => {
        // Gọi API lấy danh sách địa chỉ
        fetch('./handle/get_address.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error("Không thể tải danh sách địa chỉ.");
                }
                return response.json();
            })
            .then(data => {
                // Tạo giao diện modal
                showAddressModal(data);
            })
            .catch(error => {
                alert(error.message);
            });
    });
}
    function showAddressModal(addressList) {
        // Tạo lớp phủ
        const overlay = document.createElement("div");
        overlay.className = "modal-overlay";

        // Tạo nội dung form
        const modal = document.createElement("div");
        modal.className = "modal-content";

        const title = document.createElement("h3");
        title.textContent = "Chọn địa chỉ giao hàng";
        modal.appendChild(title);

        // Danh sách địa chỉ
        const ul = document.createElement("ul");
        if (addressList.length === 0) {
            const li = document.createElement("li");
            li.textContent = "Không có địa chỉ nào.";
            ul.appendChild(li);
        } else {
            addressList.forEach(addr => {
                const li = document.createElement("li");
                li.textContent = `${addr.address_line}, ${addr.ward}, ${addr.district}, ${addr.city}`;
                if (addr.default == 1) {
                    li.style.fontWeight = "bold";
                    li.style.color = "red";
                    li.textContent += " (Mặc định)";
                }
                const addressInput = document.getElementById('box-select-address');
                const wardInput = document.getElementById('box-select-ward');
                li.addEventListener("click", () => {
                    IDaddress = addr.id;
                    document.getElementById("address_id").value = IDaddress;
                    console.log(IDaddress);
                    addressInput.value = addr.address_line;
                    districtInput.value = addr.district;
                    wardInput.value = addr.ward ;
                    document.body.removeChild(overlay);
                    ['box-select-district', 'box-select-ward','box-select-address'].forEach(id => {
                        const input = document.getElementById(id);
                        if (input) {
                          input.closest('.box-input')?.classList.add('box-input--hasvalue');
                        }
                      });
                });

                ul.appendChild(li);
            });
        }

        modal.appendChild(ul);

        // Nút đóng
        const closeBtn = document.createElement("button");
        closeBtn.className = "modal-close-btn";
        closeBtn.textContent = "Đóng";
        closeBtn.addEventListener("click", () => {
            document.body.removeChild(overlay);
        });

        modal.appendChild(closeBtn);
        const addBtn = document.createElement("button");
        addBtn.className = "modal-add-btn";
        addBtn.textContent = "➕ Thêm địa chỉ mới";

        addBtn.addEventListener("click", () => {
            // addButton.addEventListener('click', function (e) {
                const form1 = document.querySelector('.address-form');
                const fomrCon = document.getElementById('address-container');
                if (form1 && !form1.contains(e.target) && !e.target.matches('#add')) {
                  form1.remove(); // Xoá form ra khỏi DOM
                  fomrCon.remove();
                }
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
                const districts = ['Huyện Bình Chánh', 'Huyện Cần Giờ', 'Huyện Hóc Môn', 'Huyện Nhà Bè', 'Huyện Củ Chi', 'Quận 1', 'Quận 2', 'Quận 3', 'Quận 4', 'Quận 5', 'Quận 6', 'Quận 7', 'Quận 8', 'Quận 9', 'Quận 10', 'Quận 11', 'Quận 12', 'Quận Bình Tân', 'Quận Bình Thạnh', 'Quận Tân Phú', 'Quận Gò Vấp', 'Quận Phú Nhuận', 'Quận Tân Bình'];
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
                    "Quận 8": [
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
                    "Quận 9": [
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
                    "Quận 10": [
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
                    "Quận 11": [
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
                    "Quận 12": [
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
                    "Quận Bình Tân": [
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
                    "Huyện Nhà Bè": [
                      "Thị trấn Nhà Bè",
                      "Xã Hiệp Phước",
                      "Xã Long Thới",
                      "Xã Phước Kiển",
                      "Xã Nhơn Đức",
                      "Xã Tân Quý Tây",
                      "Xã An Phú",
                      "Xã Phước An",
                    ],
                    "Quận Gò Vấp": [
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
                    "Quận Tân Phú": [
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
                    "Quận Phú Nhuận": [
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
                    "Quận Tân Bình": [
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
                    "Quận Bình Thạnh": [
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
                    wardInput.setAttribute("placeholder", wardInput.value); // Đặt placeholder là giá trị hiện tại
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
            
                // Nút "Lưu"
                const saveBtn = document.createElement('button');
                saveBtn.type = 'button';
                saveBtn.textContent = 'Lưu';
                saveBtn.className = 'btn custom-button';
                saveBtn.style = 'pointer-events: auto !important; opacity: 1;';
                saveBtn.addEventListener('click', () => {
                  if(districtInput.value == "" || wardInput.value == "" || addressInput.value.trim() == ""){
                    alert("Vui lòng nhập đầy đủ thông tin địa chỉ");
                    return ;
                  }
                    fetch('./handle/account_saveInf.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded' // hoặc 'application/json' nếu bạn dùng JSON
                    },
                    body: new URLSearchParams({
                        District: districtInput.value,
                        Ward: wardInput.value,
                        Address: addressInput.value
                    })
                })
                .then(response => response.text()) // hoặc .json() nếu bạn trả về JSON
                .then(data => {
                    console.log('Kết quả từ server:', data);
                    alert("Đã lưu địa chỉ!");
                    location.reload();
                })
                .catch(error => {
                    console.error('Lỗi khi gửi dữ liệu:', error);
                    alert('Có lỗi xảy ra khi lưu thông tin!');
                });
                });
            
                // Gắn 2 nút vào buttonContainer
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
            // });
            // alert("Chức năng thêm địa chỉ đang phát triển...");
        });

        modal.appendChild(addBtn);
        overlay.appendChild(modal);
        document.body.appendChild(overlay);

        overlay.addEventListener("click", (e) => {
            if (e.target === overlay) {
                document.body.removeChild(overlay);
            }
        });
    }
    document.addEventListener("DOMContentLoaded", () => {
        fetch('./handle/get_ItemCart.php')
            .then(res => res.json())
            .then(data => {
                const cartList = document.querySelector('.checkout__total__products');
                const totalAll = document.querySelector('.checkout__total__all');
                cartList.innerHTML = ""; // Xóa cũ
                totalAll.innerHTML = ""; // Xóa tổng cũ
                if (data.length === 0) {
                    const li = document.createElement("li");
                    li.textContent = "Giỏ hàng trống";
                    cartList.appendChild(li);
                        const emptyTotal = `
                        <li>Tổng Cộng <span>$0.00</span></li>
                    `;
                    totalAll.innerHTML = emptyTotal;
                    return;
                }
                let total = 0;
                data.forEach((item, index) => {
                  const li = document.createElement("li");
                  li.innerHTML = `
                      ${String(item.quantity).padStart(2, "0")}. 
                      ${item.name} 
                      <span>${item.total.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })}</span>
                  `;
                  cartList.appendChild(li);
                  total += item.total;
              });
                const totalFormatted = total.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
                const totalHTML = `
                <li>Tổng Cộng <span>${totalFormatted}</span></li>
                `;
                totalAll.innerHTML = totalHTML;
            })
            .catch(err => {
                console.error("Lỗi khi lấy giỏ hàng:", err);
            });
    });

    const paymentCheckoutBox = document.getElementById('payment');
    const paypalCheckoutBox = document.getElementById('paypal');

    paymentCheckoutBox.addEventListener('change', function(){
      if (this.checked){
        paypalCheckoutBox.checked= false;
      }
    });
    paypalCheckoutBox.addEventListener('change', function(){
      if (this.checked){
        paymentCheckoutBox.checked = false;
      }
    });
    window.addEventListener("DOMContentLoaded", function () {
    document.getElementById("checkout-form").onsubmit = function(event) {
      // Lấy giá trị của các trường input

      let ho = document.getElementsByName("ho")[0].value;
      let ten = document.getElementsByName("ten")[0].value;
      let phone = document.getElementsByName("phone")[0].value;
      let email = document.getElementsByName("email")[0].value;
      let address = document.getElementById("box-select-address").value;
      let district = document.getElementById("box-select-district");
      let ward = document.getElementById("box-select-ward");
      let ghiChu = document.getElementsByName("note")[0].value;
      // Kiểm tra các trường bắt buộc: Họ, Tên, Địa chỉ, Quận, Huyện
      if (ho === "") {
        alert("Vui lòng nhập Họ.");
        event.preventDefault();  // Ngừng gửi form nếu thiếu họ
        return false;
    }
    
    if (ten === "") {
        alert("Vui lòng nhập Tên.");
        event.preventDefault();  // Ngừng gửi form nếu thiếu tên
        return false;
    }
    
    if (address === "") {
        alert("Vui lòng nhập Địa chỉ.");
        event.preventDefault();  // Ngừng gửi form nếu thiếu địa chỉ
        return false;
    }
    
    if (district.value === "") {
        alert("Vui lòng chọn Quận / Huyện.");
        event.preventDefault();  // Ngừng gửi form nếu thiếu quận/huyện
        return false;
    }
    if (phone ===""){
      alert("Vui lòng nhập số điện thoại.");
        event.preventDefault();  // Ngừng gửi form nếu thiếu phường/xã
        return false;
    }
    if (ward.value === "") {
        alert("Vui lòng chọn Phường / Xã.");
        event.preventDefault();  // Ngừng gửi form nếu thiếu phường/xã
        return false;
    }
      // Kiểm tra định dạng email (nếu có nhập email)
      if (email !== "" && !/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/.test(email)) {
          alert("Email không hợp lệ.");
          event.preventDefault();  // Ngừng gửi form nếu email không hợp lệ
          return false;
      }
  
      // Kiểm tra số điện thoại (nếu có nhập số điện thoại)
      if (phone !== "" && !/^[0-9]{10,11}$/.test(phone)) {
          alert("Số điện thoại không hợp lệ.");
          event.preventDefault();  // Ngừng gửi form nếu số điện thoại không hợp lệ
          return false;
      }
      
      // Kiểm tra nếu người dùng đã chọn ghi chú, thì ghi chú không được bỏ trống
      let ghiChuCheckbox = document.getElementById("diff-acc");
      if (ghiChuCheckbox.checked && ghiChu === "") {
          alert("Vui lòng nhập ghi chú nếu bạn chọn ghi chú cho đơn hàng.");
          event.preventDefault();  // Ngừng gửi form nếu ghi chú trống khi đã chọn ghi chú
          return false;
      }
      let paymentCheckbox = document.getElementById("payment");  // COD
      let paypalCheckbox = document.getElementById("paypal");    // PayPal

      // Kiểm tra nếu cả hai đều không được chọn
      if (!paymentCheckbox.checked && !paypalCheckbox.checked) {
          alert("Vui lòng chọn phương thức thanh toán.");
          event.preventDefault();
          return false;
      }
    if (paymentCheckbox.checked) {
        // Nếu là COD, gửi form sang trang xác nhận thanh toán (xuly_thanhtoan.php)
        event.preventDefault();  // Ngừng gửi form
        this.action = "OrderConfirmation.php";  // Đặt URL gửi form đến trang xác nhận thanh toán
        this.submit();  // Gửi form sau khi đã thay đổi action
    }
    // Kiểm tra nếu phương thức thanh toán là PayPal
    else if (paypalCheckbox.checked) {
        // Nếu là PayPal, chuyển sang trang PayPal (giả sử là trang thanh toán PayPal)
        event.preventDefault();  // Ngừng gửi form
        this.action = "MethodPayByCart.php";  // Đặt URL gửi form đến trang thanh toán PayPal
        this.submit();  // Gửi form sau khi đã thay đổi action
    }
      // Nếu tất cả các điều kiện đã được kiểm tra thành công, form sẽ được gửi
  };
});
  function removeAsteriskOnInput(event) {
    // Kiểm tra nếu giá trị của trường input đã có dữ liệu
    const span = event.target.previousElementSibling.querySelector('span');
    if (event.target.value !== "") {
        // Xóa dấu sao trong <span> nếu trường nhập liệu không rỗng
        span.style.display = 'none';
    } else {
        // Hiển thị lại dấu sao nếu trường nhập liệu trống
        span.style.display = 'inline';
    }
}

// Lắng nghe sự kiện input trên các trường "Họ" và "Tên"
document.getElementsByName("ho")[0].addEventListener("input", removeAsteriskOnInput);
document.getElementsByName("ten")[0].addEventListener("input", removeAsteriskOnInput);