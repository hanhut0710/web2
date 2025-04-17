<?php
require_once "./backend/supplier.php";
require_once "./backend/import.php";
require_once "./backend/productdetails.php";
require_once "./backend/product.php";

$supplier = new Supplier();
$productdetails = new ProductDetails();
$product = new Product();
$import = new Import();

?>
<div class="section import-detail active">
    <div class="form-container">
        <h2>Chi tiết phiếu nhập hàng</h2>
        <div class="import-info">
            <div class="info-group">
                <label>Mã phiếu:</label>
                <span>IM20250413001</span>
            </div>
            <div class="info-group">
                <label>Nhà cung cấp:</label>
                <span>Adidas Vietnam</span>
            </div>
            <div class="info-group">
                <label>Ngày nhập:</label>
                <span>13/04/2025</span>
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
                    </tr>
                </thead>
                <tbody id="showImportDetails">
                    <tr>
                        <td>Adidas Superstar</td>
                        <td>Black</td>
                        <td>36</td>
                        <td>Adidas</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>Adidas Superstar</td>
                        <td>White</td>
                        <td>38</td>
                        <td>Adidas</td>
                        <td>15</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="total-quantity">
            <label>Tổng số lượng:</label>
            <span>25</span>
        </div>

        <div class="control-buttons">
            <a href="index.php?page=import"><button class="btn-control-large">Quay lại</button></a>
        </div>
    </div>
</div>

<style>
.import-info {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-bottom: 20px;
}
.info-group {
    flex: 1 1 200px;
}
.info-group label {
    font-weight: bold;
    display: block;
}
.total-quantity {
    margin-top: 20px;
    font-size: 1.1em;
}
.total-quantity label {
    font-weight: bold;
}
.control-buttons {
    margin-top: 20px;
    text-align: right;
}

</style>