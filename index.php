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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include("./layout/header.php");?>
    <?php include("./layout/banner.php");?>
    <?php include("./layout/main.php");?>
    <?php include("./layout/ins.php");?>
    <?php include("./layout/blog.php");?>
    <?php include("./layout/footer.php")?>
<!-- Đưa jQuery LÊN TRƯỚC Bootstrap -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- Các thư viện khác -->
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery.nicescroll.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/mixitup.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>
<script src="js/toast.js"></script>

    <script>
       fetch("./handle/get_bestseller.php")
.then(response => response.json())
.then(data => {
    const swiperWrapper = document.querySelector(".swiper-wrapper");
    data.forEach(product => {
        const productItem = `
        <div class="swiper-slide">
            <div class="product__item" style="background-color: rgb(233, 233, 233);">
                    <div class="product__item__pic" style="height: 190px; margin-bottom: 60px;">
                    <span style="color: red; font-weight: bold;">MỚI!!!</span>
                    <img src="${product.img_src}" onclick="openProductDetails(${product.id})">
                    <ul class="product__hover">
                        <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                        <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a></li>
                        <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                    </ul>
                </div>
               <div class="product__item__text" style="font-family: 'Staatliches', sans-serif; font-weight: bolder; font-size: 24px; color: #333; text-transform: uppercase; letter-spacing: 1px; margin: 10px 0; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); text-align: center;">
                    <h6>${product.name}</h6>
                </div>



            </div>
        </div>`;
        swiperWrapper.innerHTML += productItem;
    });

    // Khởi tạo swiper sau khi thêm xong sản phẩm
    new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 10,
    loop: false, // Bỏ loop
    scrollbar: {
        el: ".swiper-scrollbar",
        hide: false,
        draggable: true
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
    },
    breakpoints: {
        0: {
            slidesPerView: 1
        },
        576: {
            slidesPerView: 2
        },
        768: {
            slidesPerView: 3
        }
    }
});


});

    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

</body>

</html>
