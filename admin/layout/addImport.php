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

            <!-- Danh sách sản phẩm -->
            <div class="form-group full-width">
                <label>Sản phẩm</label>
                <div id="product-container">
                    <!-- Sản phẩm đầu tiên -->
                    <div class="product-group" style="border: 1px solid #ddd; padding: 15px; margin-bottom: 15px; border-radius: 8px;">
                        <h4>Sản phẩm 1</h4>
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="products_0_product_id">Chọn sản phẩm</label>
                                <select name="products[0][product_id]" id="products_0_product_id" onchange="toggleNewProductForm(0)">
                                    <option value="">Chọn sản phẩm</option>
                                    <?php foreach ($productList as $p) {
                                        echo '<option value="' . $p['id'] . '">' . $p['name'] . '</option>';
                                    } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn-small" onclick="showNewProductForm(0)">Thêm sản phẩm mới</button>
                            </div>
                        </div>
                        <!-- Form thêm sản phẩm mới (ẩn mặc định) -->
                        <div class="new-product-form" id="newProductForm_0" style="display: none; margin-top: 20px;">
                            <div class="form-grid">
                                <div class="form-group">
                                    <label for="products_0_new_product_name">Tên sản phẩm</label>
                                    <input type="text" name="products[0][new_product_name]" id="products_0_new_product_name" placeholder="Nhập tên sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="products_0_new_product_brand">Thương hiệu</label>
                                    <select name="products[0][new_product_brand]" id="products_0_new_product_brand">
                                        <option value="">Chọn thương hiệu</option>
                                        <?php foreach ($brandList as $value) {
                                            echo '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="products_0_new_product_category">Danh mục</label>
                                    <select name="products[0][new_product_category]" id="products_0_new_product_category">
                                        <option value="">Chọn danh mục</option>
                                        <?php foreach ($categoryList as $value) {
                                            echo '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="products_0_new_product_status">Trạng thái</label>
                                    <select name="products[0][new_product_status]" id="products_0_new_product_status">
                                        <option value="1" selected>Hiển thị</option>
                                        <option value="0">Ẩn</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="products_0_new_product_img">Ảnh đại diện</label>
                                    <label for="products_0_new_product_img" class="custom-file-upload">Chọn ảnh</label>
                                    <input type="file" id="products_0_new_product_img" name="products[0][new_product_img]" accept="image/*">
                                    <img class="preview-img" id="preview_products_0_new_product_img" src="#" alt="Ảnh xem trước" style="display: none; max-width: 100px;">
                                </div>
                                <div class="form-group">
                                    <label for="products_0_new_product_price">Giá bán</label>
                                    <input type="number" name="products[0][new_product_price]" id="products_0_new_product_price" step="0.01" value="0" readonly>
                                </div>
                            </div>
                            <button type="button" class="btn-small" onclick="hideNewProductForm(0)">Ẩn form</button>
                        </div>
                        <!-- Biến thể (chỉ 1) -->
                        <div class="form-group full-width">
                            <label>Chi tiết biến thể</label>
                            <div class="form-grid">
                                <div class="form-group">
                                    <label for="products_0_color">Màu sắc</label>
                                    <input type="text" name="products[0][color]" id="products_0_color" placeholder="Màu sắc" required>
                                </div>
                                <div class="form-group">
                                    <label for="products_0_size">Kích cỡ</label>
                                    <input type="text" name="products[0][size]" id="products_0_size" placeholder="Kích cỡ" required>
                                </div>
                                <div class="form-group">
                                    <label for="products_0_import_price">Giá nhập</label>
                                    <input type="number" name="products[0][import_price]" id="products_0_import_price" placeholder="Giá nhập" step="0.01" min="0" required oninput="updateNewProductPrice(0)">
                                </div>
                                <div class="form-group">
                                    <label for="products_0_quantity">Số lượng</label>
                                    <input type="number" name="products[0][quantity]" id="products_0_quantity" placeholder="Số lượng" min="1" required>
                                </div>
                                <div class="form-group">
                                    <label for="products_0_img_src">Ảnh biến thể</label>
                                    <label for="products_0_img_src" class="custom-file-upload">Chọn ảnh</label>
                                    <input type="file" id="products_0_img_src" name="products[0][img_src]" accept="image/*" onchange="previewImage(this, 'preview_products_0_img_src')">
                                    <img class="preview-img" id="preview_products_0_img_src" src="#" alt="Ảnh xem trước" style="display: none; max-width: 100px;">
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn-small btn-delete" onclick="removeProduct(this)" style="background-color: #e74c3c; margin-top: 10px;">Xóa sản phẩm</button>
                    </div>
                </div>
                <button type="button" class="btn-small" onclick="addProduct()">Thêm sản phẩm</button>
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
.product-group {
    background-color: #f9f9f9;
}
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
.btn-delete {
    background-color: #e74c3c;
}
.btn-delete:hover {
    background-color: #c0392b;
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
let productCount = 1;

function addProduct() {
    const container = document.getElementById('product-container');
    const productGroup = document.createElement('div');
    productGroup.className = 'product-group';
    productGroup.style.border = '1px solid #ddd';
    productGroup.style.padding = '15px';
    productGroup.style.marginBottom = '15px';
    productGroup.style.borderRadius = '8px';
    productGroup.innerHTML = `
        <h4>Sản phẩm ${productCount + 1}</h4>
        <div class="form-grid">
            <div class="form-group">
                <label for="products_${productCount}_product_id">Chọn sản phẩm</label>
                <select name="products[${productCount}][product_id]" id="products_${productCount}_product_id" onchange="toggleNewProductForm(${productCount})">
                    <option value="">Chọn sản phẩm</option>
                    <?php foreach ($productList as $p) {
                        echo '<option value="' . $p['id'] . '">' . $p['name'] . '</option>';
                    } ?>
                </select>
            </div>
            <div class="form-group">
                <button type="button" class="btn-small" onclick="showNewProductForm(${productCount})">Thêm sản phẩm mới</button>
            </div>
        </div>
        <div class="new-product-form" id="newProductForm_${productCount}" style="display: none; margin-top: 20px;">
            <div class="form-grid">
                <div class="form-group">
                    <label for="products_${productCount}_new_product_name">Tên sản phẩm</label>
                    <input type="text" name="products[${productCount}][new_product_name]" id="products_${productCount}_new_product_name" placeholder="Nhập tên sản phẩm">
                </div>
                <div class="form-group">
                    <label for="products_${productCount}_new_product_brand">Thương hiệu</label>
                    <select name="products[${productCount}][new_product_brand]" id="products_${productCount}_new_product_brand">
                        <option value="">Chọn thương hiệu</option>
                        <?php foreach ($brandList as $value) {
                            echo '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="products_${productCount}_new_product_category">Danh mục</label>
                    <select name="products[${productCount}][new_product_category]" id="products_${productCount}_new_product_category">
                        <option value="">Chọn danh mục</option>
                        <?php foreach ($categoryList as $value) {
                            echo '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="products_${productCount}_new_product_status">Trạng thái</label>
                    <select name="products[${productCount}][new_product_status]" id="products_${productCount}_new_product_status">
                        <option value="1" selected>Hiển thị</option>
                        <option value="0">Ẩn</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="products_${productCount}_new_product_img">Ảnh đại diện</label>
                    <label for="products_${productCount}_new_product_img" class="custom-file-upload">Chọn ảnh</label>
                    <input type="file" id="products_${productCount}_new_product_img" name="products[${productCount}][new_product_img]" accept="image/*">
                    <img class="preview-img" id="preview_products_${productCount}_new_product_img" src="#" alt="Ảnh xem trước" style="display: none; max-width: 100px;">
                </div>
                <div class="form-group">
                    <label for="products_${productCount}_new_product_price">Giá bán</label>
                    <input type="number" name="products[${productCount}][new_product_price]" id="products_${productCount}_new_product_price" step="0.01" value="0" readonly>
                </div>
            </div>
            <button type="button" class="btn-small" onclick="hideNewProductForm(${productCount})">Ẩn form</button>
        </div>
        <div class="form-group full-width">
            <label>Chi tiết biến thể</label>
            <div class="form-grid">
                <div class="form-group">
                    <label for="products_${productCount}_color">Màu sắc</label>
                    <input type="text" name="products[${productCount}][color]" id="products_${productCount}_color" placeholder="Màu sắc" required>
                </div>
                <div class="form-group">
                    <label for="products_${productCount}_size">Kích cỡ</label>
                    <input type="text" name="products[${productCount}][size]" id="products_${productCount}_size" placeholder="Kích cỡ" required>
                </div>
                <div class="form-group">
                    <label for="products_${productCount}_import_price">Giá nhập</label>
                    <input type="number" name="products[${productCount}][import_price]" id="products_${productCount}_import_price" placeholder="Giá nhập" step="0.01" min="0" required oninput="updateNewProductPrice(${productCount})">
                </div>
                <div class="form-group">
                    <label for="products_${productCount}_quantity">Số lượng</label>
                    <input type="number" name="products[${productCount}][quantity]" id="products_${productCount}_quantity" placeholder="Số lượng" min="1" required>
                </div>
                <div class="form-group">
                    <label for="products_${productCount}_img_src">Ảnh biến thể</label>
                    <label for="products_${productCount}_img_src" class="custom-file-upload">Chọn ảnh</label>
                    <input type="file" id="products_${productCount}_img_src" name="products[${productCount}][img_src]" accept="image/*" onchange="previewImage(this, 'preview_products_${productCount}_img_src')">
                    <img class="preview-img" id="preview_products_${productCount}_img_src" src="#" alt="Ảnh xem trước" style="display: none; max-width: 100px;">
                </div>
            </div>
        </div>
        <button type="button" class="btn-small btn-delete" onclick="removeProduct(this)" style="background-color: #e74c3c; margin-top: 10px;">Xóa sản phẩm</button>
    `;
    container.appendChild(productGroup);
    productCount++;
    // Gắn sự kiện preview ảnh cho sản phẩm mới
    document.getElementById(`products_${productCount-1}_new_product_img`).addEventListener('change', function() {
        previewImage(this, `preview_products_${productCount-1}_new_product_img`);
    });
    // Gắn sự kiện preview ảnh cho biến thể
    document.getElementById(`products_${productCount-1}_img_src`).addEventListener('change', function() {
        previewImage(this, `preview_products_${productCount-1}_img_src`);
    });
}

function removeProduct(button) {
    if (document.querySelectorAll('.product-group').length > 1) {
        button.closest('.product-group').remove();
        productCount--;
    } else {
        alert('Phải có ít nhất một sản phẩm!');
    }
}

function toggleNewProductForm(productIndex) {
    const select = document.getElementById(`products_${productIndex}_product_id`);
    const form = document.getElementById(`newProductForm_${productIndex}`);
    if (select.value) {
        form.style.display = 'none';
        hideNewProductForm(productIndex);
    }
}

function showNewProductForm(productIndex) {
    document.getElementById(`newProductForm_${productIndex}`).style.display = 'block';
    document.getElementById(`products_${productIndex}_product_id`).value = '';
    updateNewProductPrice(productIndex);
}

function hideNewProductForm(productIndex) {
    const form = document.getElementById(`newProductForm_${productIndex}`);
    form.style.display = 'none';
    // Reset form
    document.getElementById(`products_${productIndex}_new_product_name`).value = '';
    document.getElementById(`products_${productIndex}_new_product_brand`).value = '';
    document.getElementById(`products_${productIndex}_new_product_category`).value = '';
    document.getElementById(`products_${productIndex}_new_product_status`).value = '1';
    document.getElementById(`products_${productIndex}_new_product_price`).value = '0';
    document.getElementById(`products_${productIndex}_new_product_img`).value = '';
    document.getElementById(`preview_products_${productIndex}_new_product_img`).style.display = 'none';
}

function previewImage(input, previewId) {
    const previewImg = document.getElementById(previewId);
    if (input.files && input.files[0]) {
        const file = input.files[0];
        if (file.size > 1 * 1024 * 1024) {
            alert('File ảnh quá lớn! Vui lòng chọn file nhỏ hơn 1MB.');
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

function updateNewProductPrice(productIndex) {
    const importPrice = document.getElementById(`products_${productIndex}_import_price`);
    const profitPercentage = parseFloat(document.getElementById('profit_percentage').value) || 0;
    const price = parseFloat(importPrice.value) || 0;
    const salePrice = price * (1 + profitPercentage / 100);
    document.getElementById(`products_${productIndex}_new_product_price`).value = salePrice.toFixed(2);
}

// Gắn sự kiện preview ảnh và cập nhật giá bán
document.getElementById('profit_percentage').addEventListener('input', function() {
    for (let i = 0; i < productCount; i++) {
        updateNewProductPrice(i);
    }
});
</script>