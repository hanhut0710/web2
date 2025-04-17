<?php
require_once "backend/category.php";
require_once "backend/product.php";
require_once "backend/pagination.php";

$category = new Category();
$categoryList = $category->getAllCategory();

$page_num = isset($_GET['page_num']) ? max(1, intval($_GET['page_num'])) : 1;
$limit = 5;

$category_id = isset($_GET['category_id']) ? intval($_GET['category_id']) : '';
$product = new Product();
if ($category_id) {
    $totalProduct = $product->getTotalProductByCategory($category_id);
    $productList = $product->getProductByCategory($category_id, $limit, $page_num);
} else {
    $totalProduct = $product->getTotalProduct();
    $productList = $product->getAllProductByCategory($limit, ($page_num - 1) * $limit);
}

$pagination = new Pagination($totalProduct, $page_num, $limit);
?>

<div class="section product-all active">
    <div class="admin-control">
        <div class="admin-control-left">
            <select name="the-loai" id="the-loai" onchange="filterByCategory(this.value)">
                <option value="" <?php echo $category_id == '' ? 'selected' : ''; ?>>Tất cả</option>
                <?php
                if (count($categoryList) > 0) {
                    foreach ($categoryList as $value) {
                        echo '<option value="' . $value['id'] . '" ' . ($category_id == $value['id'] ? 'selected' : '') . '>' . $value['name'] . '</option>';
                    }
                }
                ?>
            </select>
        </div>
        <div class="admin-control-center">
            <form action="" class="form-search">
                <span class="search-btn"><i class="fa-light fa-magnifying-glass"></i></span>
                <input id="form-search-product" type="text" class="form-search-input" placeholder="Tìm kiếm tên món..." disabled title="Chức năng tìm kiếm đang phát triển">
            </form>
        </div>
        <div class="admin-control-right">
            <button class="btn-control-large" id="btn-cancel-product"><i class="fa-light fa-rotate-right"></i> Làm mới</button>
            <a href="index.php?page=addProduct"><button class="btn-control-large" id="btn-add-product"><i class="fa-light fa-plus"></i> Thêm món mới</button></a>
        </div>
    </div>
    <!-- End of admin control -->

    <!-- List product -->
    <div id="show-product">
        <?php
        if (count($productList) > 0) {
            foreach ($productList as $value) {
                echo '<div class="list">
                    <div class="list-left">
                        <img src="' .$value['img_src'] . '" alt="">
                        <div class="list-info">
                            <h4>' . $value['name'] . '</h4>
                            <span class="list-category">' . $value['cat_name'] . '</span>
                        </div>
                    </div>
                    <div class="list-right">
                        <div class="list-price">
                            <span class="list-current-price">' . $value['price'] . '₫</span>
                        </div>
                        <div class="list-control">
                            <div class="list-tool">
                                <a href="./backend/xulySP.php&id=' . $value['id'] . '&act=edit"><button class="btn-edit" name="btnEditProduct"><i class="fa-light fa-pen-to-square"></i></button></a>
                                <a href="./backend/xulySP.php&id=' . $value['id'] . '&act=delete"><button class="btn-delete" name="btnDeleteProduct"><i class="fa-regular fa-trash"></i></button></a>
                            </div>
                        </div>
                    </div>
                </div>';
            }
        } else {
            echo '<div class="no-result">
                    <i class="fa-light fa-circle-exclamation"></i>
                    <h4 class="no-result-h">Không có sản phẩm nào trong danh mục này.</h4>
                </div>';
        }
        ?>
    </div>

    <!-- page nav -->
    <?php
    echo $pagination->renderProduct();
    ?>
</div>

<script>
function filterByCategory(categoryId) {
    let url = window.location.pathname + "?page=product";
    if (categoryId) 
        url += '&category_id=' + categoryId;
    
    <?php if (isset($_GET['page_num']) && $_GET['page_num'] > 1) 
    { ?>
        url += '&page_num=<?php echo $page_num; ?>';
    <?php } ?>
    window.location.href = url;
}
</script>