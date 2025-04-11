<?php
require_once "./backend/category.php";
$categoryMD = new Category();
?>
<div class="form-container">
    <h2>Thêm Sản Phẩm Mới</h2>
    <form action="xulySP.php" method="POST" enctype="multipart/form-data">
        <div class="form-grid">
            <div class="form-group">
                <label for="name">Tên Sản Phẩm</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="price">Giá</label>
                <input type="text" id="price" name="price"required>
            </div>
            <div class="form-group">
                <label for="stock">Tồn Kho</label>
                <input type="text" id="stock" name="stock" required>
            </div>
            <div class="form-group">
                <label for="color">Màu Sắc</label>
                <input type="text" id="color" name="color" required>
            </div>
            <div class="form-group">
                <label for="size">Kích Cỡ</label>
                <input type="text" id="size" name="size" required>
            </div>
            <div class="form-group">
                <label for="brand">Thương Hiệu</label>
                <input type="text" id="brand" name="brand" required>
            </div>
            <div class="form-group">
                <label for="category">Thể Loại</label>
                <select id="category" name="category" required>
                    <option value="">Chọn thể loại</option>
                    <?php
                    $categoryList = $categoryMD -> getAllCategory();
                    foreach ($categoryList as $value) {
                      # code...
                      echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group full-width image-upload-container">
                <label for="img">Ảnh Sản Phẩm</label>
                <label class="custom-file-upload">
                    <input type="file" id="img" name="img" accept="image/*" required onchange="previewImage(event)">
                    Chọn Ảnh
                </label>
                <img id="img-preview" src="#" alt="Preview" style="display: none;">
            </div>
            <div class="form-group submit-btn">
                <button type="submit" name="btnAddProduct">Thêm Sản Phẩm</button>
            </div>
        </div>
    </form>
</div>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('img-preview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>