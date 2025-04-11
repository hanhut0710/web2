<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Male-Fashion | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <link rel="stylesheet" href="css/account.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .nice-select {
            -webkit-tap-highlight-color: transparent;
            background-color: #fff;
            border-radius: 5px;
            border: solid 1px #e8e8e8;
            box-sizing: border-box;
            clear: both;
            cursor: pointer;
            display: block;
            float: left;
            font-family: inherit;
            font-size: 14px;
            font-weight: normal;
            height: 42px;
            line-height: 40px;
            outline: none;
            padding-left: 18px;
            padding-right: 30px;
            position: relative;
            text-align: left !important;
            -webkit-transition: all 0.2s ease-in-out;
            transition: all 0.2s ease-in-out;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            white-space: nowrap;
            width: 100%;
        }
        .nice-select .list {
            width: 100%;
            position: absolute;
            top: 100%;
            left: 0;
            max-height: 250px;
            overflow-y: auto;
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 0 0 6px 6px;
            z-index: 10;
            margin: 0;
            padding: 0;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            
        }   
        input, select, textarea, button, .stardust-radio-button , .nice-select {
            pointer-events: none; /* Không cho phép tương tác */
            opacity: 0.5; /* Làm mờ các trường nhập liệu để người dùng thấy rõ là chúng đang bị vô hiệu hóa */
        }

        /* Thẻ a để kích hoạt chỉnh sửa */
        .editable:focus {
            pointer-events: auto;
            opacity: 1; /* Tăng độ sáng trở lại khi người dùng có thể chỉnh sửa */
        }
    </style>
</head>

<body>
    
    <?php include("./layout/header.php");?>
    <?php include("./layout/account_detail.php");?>
    <?php include("./layout/footer.php")?>

    <script src="js/account.js"></script>
    <script src="js/script.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/header.js"></script>
    <script>
      // Danh sách các quận/huyện có sẵn
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
// Giả sử bạn có danh sách phường/xã cho các quận/huyện
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

document
  .getElementById("box-select-ward")
  .addEventListener("focus", function () {
    const districtInput = document.getElementById("box-select-district").value;
    const input = document.getElementById("box-select-ward");
    const wardDropdown = document.getElementById("wardDropdown");

    // Kiểm tra nếu ô `box-select-district` không có dữ liệu
    if (!districtInput) {
      wardDropdown.innerHTML =
        "<div class='dropdown__item'>Vui lòng chọn Quận/huyện trước</div>";
      wardDropdown.classList.add("Dropdownvisible");
    } else {
      // Nếu đã có dữ liệu trong `box-select-district`, hiển thị danh sách phường/xã tương ứng
      wardDropdown.innerHTML = ""; // Xóa nội dung cũ
      const wards = wardsByDistrict[districtInput] || [];
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
// Lấy tất cả các phần tử .stardust-radio-button
const radioButtons = document.querySelectorAll('.stardust-radio-button');
// Lặp qua tất cả các radio button để thêm sự kiện click
radioButtons.forEach((button) => {
    button.addEventListener('click', function () {
        // Lấy tất cả các inner circle của các radio button
        const allInnerCircles = document.querySelectorAll('.stardust-radio-button__inner-circle');
        
        // Ẩn tất cả các inner circle
        allInnerCircles.forEach((circle) => {
            circle.style.display = 'none';
        });

        // Lấy inner circle của button hiện tại và hiển thị nó
        const innerCircle = button.querySelector('.stardust-radio-button__inner-circle');
        innerCircle.style.display = 'block';

        // Xóa lớp 'selected' khỏi tất cả các button
        radioButtons.forEach((btn) => {
            btn.classList.remove('selected');
        });

        // Thêm lớp 'selected' vào button được chọn
        button.classList.add('selected');
    });
});

    </script>
</body>

</html>
