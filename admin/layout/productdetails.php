<div class="section product-details active">
    <div class="admin-control">
        <div class="admin-control-left">
            <select name="product" id="product" onchange="filterByProduct(this.value)">
                <option value="">Tất cả sản phẩm</option>
                <option value="1">Adidas Superstar</option>
                <option value="2">Nike Air Max</option>
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
                <tr>
                    <td>Adidas Superstar</td>
                    <td>Black</td>
                    <td>36</td>
                    <td>Adidas</td>
                    <td>50</td>
                    <td><img src="../images/adidas_superstar_black.png" class="prd-img-tbl" alt=""></td>
                    <td class="control">
                        <button class="btn-edit" onclick="location.href='index.php?page=editProductDetail&id=1'"><i class="fa-light fa-pen-to-square"></i> Sửa</button>
                        <button class="btn-delete" onclick="alert('Xóa chi tiết này?')"><i class="fa-regular fa-trash"></i> Xóa</button>
                    </td>
                </tr>
                <tr>
                    <td>Adidas Superstar</td>
                    <td>White</td>
                    <td>38</td>
                    <td>Adidas</td>
                    <td>30</td>
                    <td><img src="../images/adidas_superstar_white.png" class="prd-img-tbl" alt=""></td>
                    <td class="control">
                        <button class="btn-edit" onclick="location.href='index.php?page=editProductDetail&id=2'"><i class="fa-light fa-pen-to-square"></i> Sửa</button>
                        <button class="btn-delete" onclick="alert('Xóa chi tiết này?')"><i class="fa-regular fa-trash"></i> Xóa</button>
                    </td>
                </tr>
                <tr>
                    <td>Nike Air Max</td>
                    <td>Red</td>
                    <td>40</td>
                    <td>Nike</td>
                    <td>20</td>
                    <td><img src="../images/nike_airmax_red.png" class="prd-img-tbl" alt=""></td>
                    <td class="control">
                        <button class="btn-edit" onclick="location.href='index.php?page=editProductDetail&id=3'"><i class="fa-light fa-pen-to-square"></i> Sửa</button>
                        <button class="btn-delete" onclick="alert('Xóa chi tiết này?')"><i class="fa-regular fa-trash"></i> Xóa</button>
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