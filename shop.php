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
        let mode = "";
        document.addEventListener("DOMContentLoaded", function () {
        loadProducts('all'); // Load tất cả sản phẩm ban đầu

    document.querySelectorAll('#category-list a').forEach(link => {
    link.addEventListener('click', function (e) {
        e.preventDefault();
        currentCategory = this.getAttribute('data-category-id');
        searchInput.value = ''; // Reset tìm kiếm nếu chọn danh mục
        searchInput2.value = '';
        currentPage = 1;
        mode = "category"; // Đặt chế độ là danh mục
        resetAdvancedSearchFields();
        document.querySelectorAll('#category-list a').forEach(a => a.classList.remove('active'));
        this.classList.add('active');
       
        loadProducts();
    });
});
    document.querySelectorAll('#brand-list a').forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            currentBrand = this.getAttribute('data-brand');
            currentPage = 1;
            mode = "brand"; // Đặt chế độ là theo brand
            searchInput.value = '';
            resetAdvancedSearchFields();
            document.querySelectorAll('#brand-list a').forEach(a => a.classList.remove('active'));
            this.classList.add('active');

            loadProducts();
        });
    });

});


function loadProducts() {
    let url = '';
    const keyword = document.getElementById('searchInput').value.trim();
    const keyword2 = document.getElementById('searchInput2').value.trim();
    const brand = document.getElementById('brandSelect').value;
    const category = document.getElementById('categorySelect').value;
    const priceRange = document.getElementById('priceSelect').value;

    console.log("Keyword:", keyword2);

    // Tách min-max từ priceSelect
    let minPrice = 0;
    let maxPrice = 999999999;
    if (priceRange !== '') {
        const prices = priceRange.split('-');
        minPrice = parseInt(prices[0]) * 1000000;
        maxPrice = parseInt(prices[1]) * 1000000;
    }

    // Kiểm tra nếu có input nâng cao thì dùng search2
    if(mode === "search"){
        url = `./handle/search.php?keyword=${encodeURIComponent(keyword)}&page=${currentPage}&limit=${pageSize}`;
    }
    else if(mode === "category"){
        url = `./handle/get_product.php?page=${currentPage}&pageSize=${pageSize}&category_id=${currentCategory}`;
    }
    else if (mode === "brand") {
        url = `./handle/get_product.php?page=${currentPage}&pageSize=${pageSize}&brand_id=${currentBrand}`;
    }
    else if(mode === "advance_search"){
            url = `./handle/search2.php?keyword=${encodeURIComponent(keyword2)}&category=${category}&brand=${brand}&minPrice=${minPrice}&maxPrice=${maxPrice}&page=${currentPage}&limit=${pageSize}`;
        }
    console.log("URL:", url);
    fetch(url)
        .then(res => res.json())
        .then(data => {
            let productList = document.querySelector('.row.products');
            productList.innerHTML = "";

            let products = data.products || data.data || [];
            let total = data.total || data.totalProduct || 0;

            if (products.length === 0) {
                productList.innerHTML = "<p>Không có sản phẩm nào.</p>";
                updatePagination(0);
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

function resetAdvancedSearchFields() {
    console.log("Resetting advanced search fields...");
    document.getElementById("categorySelect").value = "all"; // Reset danh mục về "all"
    document.getElementById("brandSelect").value = ""; // Reset thương hiệu về giá trị mặc định
    document.getElementById("priceSelect").value = ""; // Reset khoảng giá về giá trị mặc định
    document.getElementById("searchInput2").value = ""; // Reset ô tìm kiếm nâng cao
}

function updatePagination(total) {
    let maxPage = Math.ceil(total / pageSize);
    document.getElementById('currentPage').innerText = currentPage;
    document.getElementById("prePage").innerText = currentPage - 1;
    document.getElementById("nextPage").innerText = currentPage + 1;

    document.getElementById('currentPage').style.display = (total > 0) ? "block" : "none";
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

// document.querySelectorAll('#category-list a').forEach(link => {
//     link.addEventListener('click', function (e) {
//         e.preventDefault();
//         currentCategory = this.getAttribute('data-category-id');
//         searchKeyword = '';
//         currentPage = 1;

//         document.querySelectorAll('#category-list a').forEach(a => a.classList.remove('active'));
//         this.classList.add('active');

//         loadProducts();
//     });
// });

function search(event) {
    event.preventDefault();
    searchKeyword = document.getElementById("searchInput").value.trim();
    currentCategory = document.getElementById("categorySelect").value;
    selectedBrand = document.getElementById("brandSelect").value;
    selectedPrice = document.getElementById("priceSelect").value;
    mode = "search"; // Đặt chế độ là tìm kiếm
    resetAdvancedSearchFields();
   

    loadProducts();
}

function advance_search(){
    mode = "advance_search";
    currentPage = 1; // Đặt chế độ là tìm kiếm nâng cao
    loadProducts();
    
   
}



document.addEventListener("DOMContentLoaded", function () {
    mode = "category"; // Đặt chế độ là tìm kiếm
    loadProducts();
});
    </script>
</body>

</html>
