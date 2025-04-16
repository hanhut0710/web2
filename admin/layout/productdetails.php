<?php
require_once "./backend/product.php";
require_once "./backend/productdetails.php";
require_once "./backend/pagination.php";

$product = new Product();
$details = new ProductDetails();

$product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;
$limit = 15;
$page_num = isset($_GET['page_num']) ? intval($_GET['page_num']) : 1;

if ($product_id) {
    $totalDetails = $details->getTotalDetailsByProduct($product_id);
    $detailsList = $details->getAllDetailsByPagination($limit, ($page_num - 1) * $limit, $product_id);
} else {
    $totalDetails = $details->getTotalDetails();
    $detailsList = $details->getAllDetailsByPagination($limit, ($page_num - 1) * $limit, 0);
}

$pagination = new Pagination($totalDetails, $page_num, $limit);
?>
<div class="section product-details active">
    <div class="admin-control">
        <div class="admin-control-left">
            <select name="product" id="product" onchange="filterByProduct(this.value)">
                <option value="">Tất cả sản phẩm</option>
                <?php
                $productList = $product->getAllProduct();
                foreach ($productList as $value) {
                    $selected = ($product_id == $value['id']) ? 'selected' : '';
                    echo '<option value="' . $value['id'] . '" ' . $selected . '>' . $value['name'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="admin-control-center">
            <form action="" class="form-search">
                <span class="search-btn"><i class="fa-light fa-magnifying-glass"></i></span>
                <input id="form-search-product-details" type="text" class="form-search-input" placeholder="Tìm kiếm tên, màu sắc, kích cỡ, thương hiệu...">
            </form>
        </div>
        <div class="admin-control-right">
            <button class="btn-reset-product-details"><i class="fa-light fa-arrow-rotate-right"></i></button>
            <a href="index.php?page=addProductDetail"><button class="btn-control-large" id="btn-add-detail"><i class="fa-light fa-plus"></i> Thêm chi tiết mới</button></a>
        </div>
    </div>

    <div class="table">
        <table width="100%">
            <thead>
                <tr>
                    <td>Sản phẩm</td>
                    <td>Màu sắc</td>
                    <td>Kích cỡ</td>
                    <td>Thương hiệu</td>
                    <td>Số lượng</td>
                    <td>Hình ảnh</td>
                    <td>Thao tác</td>
                </tr>
            </thead>
            <tbody id="showProductDetails">
                <?php
                foreach ($detailsList as $value) {
                    # code...
                    echo '<tr>
                    <td>'.$value['p_name'].'</td>
                    <td>'.$value['color'].'</td>
                    <td>'.$value['size'].'</td>
                    <td>'.$value['brand'].'</td>
                    <td>'.$value['stock'].'</td>
                    <td>'.$value['img_src'].'</td>
                    <td class="control">
                            <a href="index.php?page=editProductDetails&id=' . $value['id'] . '"><button class="btn-edit"><i class="fa-light fa-pen-to-square"></i> Sửa</button></a>
                            <a href="./backend/xulyCTSP.php?act=xoa&id=' . $value['id'] . '"><button class="btn-delete"><i class="fa-regular fa-trash"></i> Xóa</button></a>
                        </td>
                </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php
  
    echo $pagination->renderProductDetails();
    ?>
</div>

<script>
function filterByProduct(productId) {
    let url = "index.php?page=productdetails" + (productId ? "&product_id=" + productId : "");
    window.location.href = url;
}
</script>