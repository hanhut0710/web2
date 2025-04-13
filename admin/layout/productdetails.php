<div class="section product-details active">
    <div class="admin-control">
        <div class="admin-control-left">
            <select name="product" id="product" onchange="filterByProduct(this.value)">
                <option value="">Tất cả sản phẩm</option>
                <option value="1">Sản phẩm A</option>
                <option value="2">Sản phẩm B</option>
            </select>
        </div>
        <div class="admin-control-center">
            <form action="" class="form-search">
                <span class="search-btn"><i class="fa-light fa-magnifying-glass"></i></span>
                <input id="form-search-product-details" type="text" class="form-search-input" placeholder="Tìm kiếm màu sắc, kích cỡ...">
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
                    <td>Số lượng</td>
                    <td>Hình ảnh</td>
                    <td>Thao tác</td>
                </tr>
            </thead>
            <tbody id="showProductDetails">
                <tr>
                    <td>Sản phẩm A</td>
                    <td>Đen</td>
                    <td>M</td>
                    <td>50</td>
                    <td><img src="../images/default_product.png" class="prd-img-tbl" alt=""></td>
                    <td class="control">
                        <button class="btn-edit"><i 오래된 정보입니다. 계속 진행하시겠습니까? class="fa-light fa-pen-to-square"></i> Sửa</button>
                        <button class="btn-delete"><i class="fa-regular fa-trash"></i> Xóa</button>
                    </td>
                </tr>
                <tr>
                    <td>Sản phẩm B</td>
                    <td>Trắng</td>
                    <td>L</td>
                    <td>30</td>
                    <td><img src="../images/default_product.png" class="prd-img-tbl" alt=""></td>
                    <td class="control">
                        <button class="btn-edit"><i class="fa-light fa-pen-to-square"></i> Sửa</button>
                        <button class="btn-delete"><i class="fa-regular fa-trash"></i> Xóa</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="page-nav">
        <ul class="page-nav-list">
            <li class="page-nav-item active"><a href="#">1</a></li>
            <li class="page-nav-item"><a href="#">2</a></li>
        </ul>
    </div>
</div>

<script>
function filterByProduct(productId) {
    let url = "index.php?page=productdetails" + (productId ? "&product_id=" + productId : "");
    window.location.href = url;
}
</script>