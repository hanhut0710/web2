<?php
require_once "./backend/product.php";
require_once "./backend/productdetails.php";
require_once "./backend/pagination.php";

$product = new Product();
$details = new ProductDetails();

$product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;
$search = isset($_GET['search']) ? trim(htmlspecialchars($_GET['search'])) : '';
$limit = 10;
$page_num = isset($_GET['page_num']) ? max(1, intval($_GET['page_num'])) : 1;

if ($search) {
    $totalDetails = $details->getTotalDetailsBySearch($search, $product_id);
} elseif ($product_id) {
    $totalDetails = $details->getTotalDetailsByProduct($product_id);
} else {
    $totalDetails = $details->getTotalDetails();
}

$pagination = new Pagination($totalDetails, $page_num, $limit);
$offset = $pagination->getOffset();

if ($search) {
    $detailsList = $details->getDetailsBySearch($search, $product_id, $limit, $offset);
} elseif ($product_id) {
    $detailsList = $details->getAllDetailsByPagination($limit, $offset, $product_id);
} else {
    $detailsList = $details->getAllDetailsByPagination($limit, $offset, 0);
}
?>

<div class="section product-details active">
    <div class="admin-control">
        <div class="admin-control-left">
            <select name="product" id="product" onchange="filterByProduct(this.value)">
                <option value="">Tất cả sản phẩm</option>
                <?php
                $productList = $product->getAllProduct();
                foreach ($productList as $value) 
                {
                    $selected = ($product_id == $value['id']) ? 'selected' : '';
                    echo '<option value="'.$value['id'].'" '.$selected.'>'.$value['name'].'</option>';
                }
                ?>
            </select>
        </div>
        <div class="admin-control-center">
            <form action="" class="form-search" onsubmit="searchProductDetails(event)">
                <span class="search-btn" onclick="searchProductDetailsByButton()"><i class="fa-light fa-magnifying-glass"></i></span>
                <input id="form-search-product-details" type="text" name="search" class="form-search-input" placeholder="Tìm kiếm tên, màu sắc, kích cỡ, thương hiệu..." value="<?php echo isset($_GET['search']) ? ($_GET['search']) : ''; ?>">
            </form>
        </div>
        <div class="admin-control-right">
            <a href="index.php?page=productdetails"><button class="btn-control-large" id="btn-cancel-product"><i class="fa-light fa-rotate-right"></i> Làm mới</button></a>
            <!-- <a href="index.php?page=addProductDetail"><button class="btn-control-large" id="btn-add-product"><i class="fa-light fa-plus"></i> Thêm chi tiết mới</button></a> -->
        </div>
    </div>

    <div class="table">
        <table width="100%">
            <thead>
                <tr>
                    <td>Sản phẩm</td>
                    <td>Màu sắc</td>
                    <td>Kích cỡ</td>
                    <td>Số lượng</td>
                    <td>Hình ảnh</td>
                </tr>
            </thead>
            <tbody id="showProductDetails">
                <?php
                if (empty($detailsList)) 
                    echo '<tr><td colspan="5" style="text-align: center;">Không có chi tiết sản phẩm nào.</td></tr>';
                foreach ($detailsList as $value) {
                    echo '<tr>
                    <td>'.$value['p_name'].'</td>
                    <td>'.$value['color'].'</td>
                    <td>'.$value['size'].'</td>
                    <td>'.$value['stock'].'</td>
                    <td><img src="../'.$value['img_src'].'" alt="" style="max-width: 100px;"></td>
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
    <?php if (isset($_GET['search']) && $_GET['search'] !== '') { ?>
        url += '&search=<?php echo urlencode($_GET['search']); ?>';
    <?php } ?>
    <?php if (isset($_GET['page_num']) && $_GET['page_num'] > 1) { ?>
        url += '&page_num=<?php echo $page_num; ?>';
    <?php } ?>
    window.location.href = url;
}

function searchProductDetails(event) {
    event.preventDefault();
    let searchValue = document.getElementById('form-search-product-details').value.trim();
    let url = "index.php?page=productdetails";
    
    if (searchValue) {
        url += '&search=' + encodeURIComponent(searchValue);
    }
    
    <?php if (isset($_GET['product_id']) && $_GET['product_id'] !== '') { ?>
        url += '&product_id=<?php echo intval($_GET['product_id']); ?>';
    <?php } ?>
    window.location.href = url;
}

function searchProductDetailsByButton() {
    let searchValue = document.getElementById('form-search-product-details').value.trim();
    let url = "index.php?page=productdetails";
    
    if (searchValue) {
        url += '&search=' + encodeURIComponent(searchValue);
    }
    
    <?php if (isset($_GET['product_id']) && $_GET['product_id'] !== '') { ?>
        url += '&product_id=<?php echo intval($_GET['product_id']); ?>';
    <?php } ?>
    window.location.href = url;
}
</script>