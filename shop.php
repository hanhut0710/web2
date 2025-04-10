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
        currentCategory = this.getAttribute('data-category-id');
        searchKeyword = ''; // Reset tìm kiếm nếu chọn danh mục
        currentPage = 1;

        document.querySelectorAll('#category-list a').forEach(a => a.classList.remove('active'));
        this.classList.add('active');

        loadProducts();
    });
});

});

// let currentPage = 1;
// let pageSize = 6;
// let currentCategory = 'all';

function loadProducts() {
    let url = '';

    if (searchKeyword.trim() !== '') {
        url = `./handle/search.php?keyword=${encodeURIComponent(searchKeyword)}&page=${currentPage}&limit=${pageSize}`;
    } else {
        url = `./handle/get_product.php?page=${currentPage}&pageSize=${pageSize}&category_id=${currentCategory}`;
    }

    fetch(url)
        .then(res => res.json())
        .then(data => {
            let productList = document.querySelector('.row.products');
            productList.innerHTML = "";

            let products = data.products || data.data || [];
            let total = data.total || data.totalProduct || 0;

            if (products.length === 0) {
                productList.innerHTML = "<p>Không có sản phẩm nào.</p>";
                return;
            }

            products.forEach(product => {
                let productHTML = `
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg">
                                <img class="image" src="${product.img_src}" onclick="openProductDetails(${product.id})">
                            </div>
                            <div class="product__item__text">
                                <h6>${product.name}</h6>
                                <a href="#" class="add-cart">+ Add To Cart</a>
                                <h5>${product.price}đ</h5>
                            </div>
                        </div>
                    </div>`;
                productList.innerHTML += productHTML;
            });

            updatePagination(total);
        })
        .catch(err => console.error("Lỗi load sản phẩm:", err));
}

function updatePagination(total) {
    let maxPage = Math.ceil(total / pageSize);
    document.getElementById('currentPage').innerText = currentPage;
    document.getElementById("prePage").innerText = currentPage - 1;
    document.getElementById("nextPage").innerText = currentPage + 1;

    document.getElementById('prePage').style.display = currentPage > 1 ? "block" : "none";
    document.getElementById('nextPage').style.display = currentPage < maxPage ? "block" : "none";
}

document.getElementById('nextPage').addEventListener('click', () => {
    currentPage++;
    loadProducts();
});

document.getElementById('prePage').addEventListener('click', () => {
    currentPage--;
    loadProducts();
});

document.querySelectorAll('#category-list a').forEach(link => {
    link.addEventListener('click', function (e) {
        e.preventDefault();
        currentCategory = this.getAttribute('data-category-id');
        searchKeyword = '';
        currentPage = 1;

        document.querySelectorAll('#category-list a').forEach(a => a.classList.remove('active'));
        this.classList.add('active');

        loadProducts();
    });
});

function search(event) {
    event.preventDefault();
    const keyword = document.getElementById("searchInput").value.trim();
    searchKeyword = keyword;
    currentCategory = 'all';
    currentPage = 1;
    loadProducts();
    searchInput.value = "";
}

document.addEventListener("DOMContentLoaded", function () {
    loadProducts();
});
    </script>
</body>

</html>
