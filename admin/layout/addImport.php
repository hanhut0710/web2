<?php
require_once "./backend/supplier.php";
require_once "./backend/product.php";

$supplier = new Supplier();
$product = new Product();
$supplierList = $supplier->getAllSupplier();
$productList = $product->getAllProduct();
?>
<div class="section add-import active">
    <div class="form-container">
        <h2>Thêm phiếu nhập hàng</h2>
        <form action="./backend/xulyPNH.php" method="post" enctype="multipart/form-data">
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
                    <label for="created_at">Ngày nhập</label>
                    <input type="date" id="created_at" name="created_at" required>
                </div>
                <div class="form-group full-width">
                    <label>Chi tiết nhập hàng</label>
                    <div id="detail-list">
                        <div class="detail-item">
                            <select name="product_id[]" required>
                                <option value="">Chọn sản phẩm</option>
                                <?php foreach ($productList as $p) {
                                    echo '<option value="' . $p['id'] . '">' . $p['name'] . '</option>';
                                } ?>
                            </select>
                            <input type="text" name="color[]" placeholder="Màu sắc" required>
                            <input type="text" name="size[]" placeholder="Kích cỡ" required>
                            <input type="text" name="brand[]" placeholder="Thương hiệu" required>
                            <input type="number" name="quantity[]" placeholder="Số lượng" min="1" required>
                            <label for="img_src_0" class="upload-label">Tải ảnh</label>
                            <input type="file" id="img_src_0" name="img_src[]" accept="image/*" style="display: none;">
                            <img class="preview-img" id="preview_img_src_0" src="#" alt="Ảnh xem trước" style="display: none; max-width: 50px; margin-left: 10px;">
                            <button type="button" onclick="removeDetail(this)">Xóa</button>
                        </div>
                    </div>
                    <button type="button" onclick="addDetail()">Thêm biến thể</button>
                </div>
                <div class="submit-btn">
                    <button type="submit" name="btnAddImport" class="btn-control-large">Lưu</button>
                    <a href="index.php?page=import"><button type="button" class="btn-control-large">Hủy</button></a>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
.detail-item {
    display: flex;
    gap: 10px;
    align-items: center;
    margin-bottom: 10px;
}
.detail-item select,
.detail-item input {
    flex: 1;
    padding: 5px;
}
.upload-label {
    padding: 5px 10px;
    background-color:rgb(255, 230, 9);
    color: white;
    border-radius: 4px;
    cursor: pointer;
    text-align: center;
}
.upload-label:hover {
    background-color:rgb(255, 241, 46);
}
.preview-img {
    max-height: 50px;
    object-fit: cover;
}
</style>

<script>
let fileInputIndex = 1;

function addDetail() {
    const detailList = document.getElementById('detail-list');
    const newDetail = document.createElement('div');
    newDetail.className = 'detail-item';
    newDetail.innerHTML = `
        <select name="product_id[]" required>
            <option value="">Chọn sản phẩm</option>
            <?php 
            foreach ($productList as $p) 
            {
                echo '<option value="' . $p['id'] . '">' . $p['name'] . '</option>';
            } 
            ?>
        </select>
        <input type="text" name="color[]" placeholder="Màu sắc" required>
        <input type="text" name="size[]" placeholder="Kích cỡ" required>
        <input type="text" name="brand[]" placeholder="Thương hiệu" required>
        <input type="number" name="quantity[]" placeholder="Số lượng" min="1" required>
        <label for="img_src_${fileInputIndex}" class="upload-label">Tải ảnh</label>
        <input type="file" id="img_src_${fileInputIndex}" name="img_src[]" accept="image/*" style="display: none;">
        <img class="preview-img" id="preview_img_src_${fileInputIndex}" src="#" alt="Ảnh xem trước" style="display: none; max-width: 50px; margin-left: 10px;">
        <button type="button" onclick="removeDetail(this)">Xóa</button>
    `;
    detailList.appendChild(newDetail);

    // Gắn sự kiện change cho input file mới
    const newFileInput = document.getElementById(`img_src_${fileInputIndex}`);
    const newPreviewImg = document.getElementById(`preview_img_src_${fileInputIndex}`);
    newFileInput.addEventListener('change', function() {
        previewImage(this, newPreviewImg);
    });

    fileInputIndex++;
}

function removeDetail(button) {
    button.parentElement.remove();
}

function previewImage(input, previewImg) {
    if (input.files && input.files[0]) {
        const file = input.files[0];
        if (file.size > 2 * 1024 * 1024) { // Giới hạn 2MB
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

// Gắn sự kiện change cho input file ban đầu
document.getElementById('img_src_0').addEventListener('change', function() {
    previewImage(this, document.getElementById('preview_img_src_0'));
});
</script>