<?php
require_once "./backend/supplier.php";
require_once "./backend/product.php";
require_once "./backend/category.php";
require_once "./backend/brand.php";

$supplier = new Supplier();
$product = new Product();
$category = new Category();
$brand = new Brand();

$supplierList = $supplier->getAllSupplier();
$productList = $product->getAllProduct();
$categoryList = $category->getAllCategory();
$brandList = $brand->getAllBrand();
?>

<div class="section add-import active">
    <div class="form-container">
        <h2>Thêm Phiếu Nhập Hàng</h2>
        <form id="importForm" action="./backend/xulyPNH.php" method="post" enctype="multipart/form-data">
            <!-- Thông tin chung -->
            <div class="form-grid">
                <div class="form-group">
                    <label for="sup_id">Nhà cung cấp</label>
                    <select id="sup_id" name="sup_id" required>
                        <option value="">Chọn nhà cung cấp</option>
                        <?php foreach ($supplierList as $value) {
                            echo '<option value="' . $value['id'] . '">' . $value['sup_name'] . '</option>';
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="profit_percentage">Phần trăm lợi nhuận (%)</label>
                    <input type="number" id="profit_percentage" name="profit_percentage" step="0.1" min="0" required placeholder="Nhập % lợi nhuận">
                </div>
                <div class="form-group">
                    <label for="created_at">Ngày nhập</label>
                    <input type="date" id="created_at" name="created_at" required>
                </div>
            </div>

            <!-- Thông tin sản phẩm -->
            <div class="form-group full-width">
                <label>Sản phẩm</label>
                <div class="product-type-container">
                    <select name="product_id" id="product_id">
                        <option value="">Chọn sản phẩm</option>
                        <?php foreach ($productList as $p) {
                            echo '<option value="' . $p['id'] . '">' . $p['name'] . '</option>';
                        } ?>
                    </select>
                    <button type="button" class="btn-small" onclick="showNewProductForm()">Thêm sản phẩm</button>
                </div>
                <!-- Form thêm sản phẩm mới (ẩn mặc định) -->
                <div class="new-product-form" id="newProductForm" style="display: none; margin-top: 20px;">
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="new_product_name">Tên sản phẩm</label>
                            <input type="text" name="new_product_name" id="new_product_name" placeholder="Nhập tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="new_product_brand">Thương hiệu</label>
                            <select name="new_product_brand" id="new_product_brand">
                                <option value="">Chọn thương hiệu</option>
                                <?php foreach ($brandList as $value) {
                                    echo '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="new_product_category">Danh mục</label>
                            <select name="new_product_category" id="new_product_category">
                                <option value="">Chọn danh mục</option>
                                <?php foreach ($categoryList as $value) {
                                    echo '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="new_product_status">Trạng thái</label>
                            <select name="new_product_status" id="new_product_status">
                                <option value="1" selected>Hiển thị</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="new_product_img">Ảnh đại diện</label>
                            <label for="new_product_img" class="custom-file-upload">Chọn ảnh</label>
                            <input type="file" id="new_product_img" name="new_product_img" accept="image/*">
                            <img class="preview-img" id="preview_new_product_img" src="#" alt="Ảnh xem trước" style="display: none; max-width: 100px;">
                        </div>
                        <div class="form-group">
                            <label for="new_product_price">Giá bán</label>
                            <input type="number" name="new_product_price" id="new_product_price" step="0.01" value="0" readonly>
                        </div>
                    </div>
                    <button type="button" class="btn-small" onclick="hideNewProductForm()">Ẩn form</button>
                </div>
            </div>

            <!-- Thông tin biến thể -->
            <div class="form-group full-width">
                <label>Chi tiết biến thể</label>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="color">Màu sắc</label>
                        <input type="text" name="color" id="color" placeholder="Màu sắc" required>
                    </div>
                    <div class="form-group">
                        <label for="size">Kích cỡ</label>
                        <input type="text" name="size" id="size" placeholder="Kích cỡ" required>
                    </div>
                    <div class="form-group">
                        <label for="import_price">Giá nhập</label>
                        <input type="number" name="import_price" id="import_price" placeholder="Giá nhập" step="0.01" min="0" required>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Số lượng</label>
                        <input type="number" name="quantity" id="quantity" placeholder="Số lượng" min="1" required>
                    </div>
                    <div class="form-group">
                        <label for="img_src">Ảnh biến thể</label>
                        <label for="img_src" class="custom-file-upload">Chọn ảnh</label>
                        <input type="file" id="img_src" name="img_src" accept="image/*">
                        <img class="preview-img" id="preview_img_src" src="#" alt="Ảnh xem trước" style="display: none; max-width: 100px;">
                    </div>
                </div>
            </div>

            <!-- Nút điều khiển -->
            <div class="submit-btn">
                <button type="submit" name="btnAddImport" class="btn-control-large">Lưu</button>
                <a href="index.php?page=import"><button type="button" class="btn-control-large">Hủy</button></a>
            </div>
        </form>
    </div>
</div>

<style>
.product-type-container {
    display: flex;
    align-items: center;
    gap: 10px;
}
.btn-small {
    padding: 5px 10px;
    background-color: var(--orange);
    color: white;
    border-radius: 5px;
    font-size: 14px;
}
.btn-small:hover {
    background-color: #e5a500;
}
.custom-file-upload {
    padding: 8px 15px;
    font-size: 14px;
    background-color: var(--orange);
    color: white;
    border-radius: 5px;
    cursor: pointer;
}
.custom-file-upload:hover {
    background-color: #e5a500;
}
.preview-img {
    max-height: 100px;
    object-fit: cover;
    margin-top: 10px;
}
.new-product-form {
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #f9f9f9;
}
.form-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
}
@media (max-width: 768px) {
    .form-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<script>
function showNewProductForm() {
    document.getElementById('newProductForm').style.display = 'block';
    document.getElementById('product_id').disabled = true;
    updateNewProductPrice();
}

function hideNewProductForm() {
    document.getElementById('newProductForm').style.display = 'none';
    document.getElementById('product_id').disabled = false;
    // Reset form
    document.getElementById('new_product_name').value = '';
    document.getElementById('new_product_brand').value = '';
    document.getElementById('new_product_category').value = '';
    document.getElementById('new_product_status').value = '1';
    document.getElementById('new_product_price').value = '0';
    document.getElementById('new_product_img').value = '';
    document.getElementById('preview_new_product_img').style.display = 'none';
}

function previewImage(input, previewImg) {
    if (input.files && input.files[0]) {
        const file = input.files[0];
        if (file.size > 2 * 1024 * 1024) {
            alert('File ảnh quá lớn! Vui lòng chọn file nhỏ hơn 2MB.');
            input.value = '';
            previewImg.src = '#';
            previewImg.style.display = 'none';
            return;
        }
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            previewImg.style.display = 'block';
        };
        reader.readAsDataURL(file);
    } else {
        previewImg.src = '#';
        previewImg.style.display = 'none';
    }
}

function updateNewProductPrice() {
    const importPrice = document.getElementById('import_price').value || 0;
    const profitPercentage = document.getElementById('profit_percentage').value || 0;
    const salePrice = importPrice * (1 + profitPercentage / 100);
    document.getElementById('new_product_price').value = salePrice.toFixed(2);
}

// Gắn sự kiện preview ảnh
document.getElementById('new_product_img').addEventListener('change', function() {
    previewImage(this, document.getElementById('preview_new_product_img'));
});
document.getElementById('img_src').addEventListener('change', function() {
    previewImage(this, document.getElementById('preview_img_src'));
});

// Gắn sự kiện cập nhật giá bán
document.getElementById('import_price').addEventListener('input', updateNewProductPrice);
document.getElementById('profit_percentage').addEventListener('input', updateNewProductPrice);
</script>