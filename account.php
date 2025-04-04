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
    </style>
</head>

<body>
    
    <?php include("./layout/header.php");?>
    <?php include("./layout/account_detail.php");?>
    <?php include("./layout/footer.php")?>


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
    <script>
        const districtData = {
  "70": [ // TP Hồ Chí Minh
    { id: "1", name: "Quận 1" },
    { id: "2", name: "Quận 3" },
    { id: "3", name: "Quận 5" },
    { id: "4", name: "Quận 7" },
    { id: "5", name: "Quận 10" },
    { id: "6", name: "TP Thủ Đức" }
  ],
  "10": [ // TP Hà Nội
    { id: "1", name: "Ba Đình" },
    { id: "2", name: "Đống Đa" },
    { id: "3", name: "Cầu Giấy" },
    { id: "4", name: "Thanh Xuân" },
    { id: "5", name: "Long Biên" }
  ],
  "90": [ // TP Cần Thơ
    { id: "1", name: "Ninh Kiều" },
    { id: "2", name: "Bình Thủy" },
    { id: "3", name: "Cái Răng" }
  ],
  // Thêm các tỉnh/thành khác tương tự
};
document.addEventListener("DOMContentLoaded", function () {
    const provinceSelect = document.getElementById("provinceOptions");
    const districtSelect = document.getElementById("districtSelect");

    provinceSelect.addEventListener("change", function () {
      const provinceId = this.value;
      const districts = districtData[provinceId] || [];

      // Xóa tất cả các option hiện tại trong select quận/huyện
      districtSelect.innerHTML = '<option value="">--Chọn Quận/huyện--</option>';

      // Thêm các option mới
      districts.forEach(district => {
        const option = document.createElement("option");
        option.value = district.id;
        option.textContent = district.name;
        districtSelect.appendChild(option);
      });

      // Cập nhật nice-select hiển thị lại (nếu dùng plugin nice-select)
      if (typeof jQuery !== "undefined" && jQuery().niceSelect) {
        jQuery(districtSelect).niceSelect("update");
      }
    });
  });
    </script>
</body>

</html>
