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

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    
    <?php include("./layout/header.php");?>
    <?php include("./layout/products.php");?>
    <?php include("./layout/footer.php");?>


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
    <script src="js/script.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
    loadProducts('all'); // Load tất cả sản phẩm ban đầu

    document.querySelectorAll('#category-list a').forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            let categoryId = this.getAttribute('data-category-id');

            console.log("Đã chọn danh mục:", categoryId); // ✅ Kiểm tra categoryId đúng chưa

            currentPage = 1;

            // Xóa class active khỏi tất cả danh mục
            document.querySelectorAll('#category-list a').forEach(a => a.classList.remove('active'));

            // Thêm class active vào danh mục được chọn
            this.classList.add('active');

            loadProducts(categoryId);
        });
    });
});

let currentPage = 1;
let pageSize = 6;
let currentCategory = 'all';

function loadProducts(categoryId = 'all') {
    currentCategory = categoryId;
    fetch(`./handle/get_product.php?page=${currentPage}&pageSize=${pageSize}&category_id=${categoryId}`)
        .then(response => response.json())
        .then(data => {
            console.log("Dữ liệu nhận được từ API:", data); // ✅ Kiểm tra API trả về đúng chưa

            let productList = document.querySelector('.row.products');
            productList.innerHTML = ""; // Xóa sản phẩm cũ trước khi hiển thị sản phẩm mới

            if (data.data.length === 0) {
                productList.innerHTML = "<p>Không có sản phẩm nào.</p>";
                return;
            }
            data.data.forEach(product => {
                let productHTML = `
                     <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="">
                                    <img class="image" src="${product.img_src}" onclick="openProductDetails(${product.id})">
                                    <ul class="product__hover">
                                        <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                        <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a>
                                        </li>
                                        <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>${product.name}</h6>
                                    <a href="#" class="add-cart">+ Add To Cart</a>
                                    <div class="rating">
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <h5>${product.price}đ</h5>
                                    <div class="product__color__select">
                                        <label for="pc-4">
                                            <input type="radio" id="pc-4">
                                        </label>
                                        <label class="active black" for="pc-5">
                                            <input type="radio" id="pc-5">
                                        </label>
                                        <label class="grey" for="pc-6">
                                            <input type="radio" id="pc-6">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                productList.innerHTML += productHTML;
            });
            phanTrang(data);
        })
        .catch(error => console.error("Lỗi khi tải sản phẩm:", error));
}

function phanTrang(data) {
    let maxPage = Math.ceil(data.totalProduct / pageSize);

    document.getElementById('currentPage').innerText = currentPage;
    document.getElementById("prePage").innerHTML = currentPage -1;
    document.getElementById("nextPage").innerHTML = currentPage +1;
    document.getElementById('prePage').style.display = currentPage > 1 ? "block" : "none";
    document.getElementById('nextPage').style.display = currentPage < maxPage ? "block" : "none";
}

document.getElementById('nextPage').addEventListener('click', () => {
    currentPage++;
    loadProducts(currentCategory);
});

document.getElementById('prePage').addEventListener('click', () => {
    currentPage--;
    loadProducts(currentCategory);
});


    </script>
</body>

</html>
