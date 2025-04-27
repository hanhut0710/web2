<?php
require_once "./backend/category.php";
require_once "./backend/brand.php";

$category = new Category();
$categoryList = $category->getAllCategory();

$brand = new Brand();
$brandList = $brand->getAllBrand();
?>

<div class="form-container">
    <h2>Thêm Sản Phẩm</h2>
    <form action="./backend/xulySP.php" method="POST" enctype="multipart/form-data">
        <div class="form-grid">
            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input type="text" name="name" id="name" placeholder="Nhập tên sản phẩm">
            </div>
            <div class="form-group">
                <label for="brand_id">Thương hiệu</label>
                <select name="brand_id" id="brand_id">
                    <option value="">Chọn thương hiệu</option>
                    <?php 
                        foreach ($brandList as $value) {
                            echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="category_id">Danh mục</label>
                <select name="category_id" id="category_id">
                    <option value="">Chọn danh mục</option>
                    <?php 
                        foreach ($categoryList as $value) {
                            echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="price">Giá bán</label>
                <input type="number" name="price" id="price" value="0" readonly>
            </div>
            <div class="form-group">
                <label for="status">Trạng thái</label>
                <select name="status" id="status">
                    <option value="1" selected>Hiển thị</option>
                    <option value="0">Ẩn</option>
                </select>
            </div>
            <div class="form-group full-width image-upload-container">
                <label for="img_src" class="custom-file-upload">
                    <i class="fa fa-upload"></i> Tải ảnh đại diện
                </label>
                <input type="file" name="img_src" id="img_src" accept="image/*" onchange="previewImage(event)">
                <img id="img-preview" style="display:none; max-width: 200px; margin-top: 10px;" />
            </div>
        </div>
        <div class="submit-btn">
            <button type="submit" name="btnAddProduct" class="btn-control-large"><i class="fa fa-plus-circle"></i> Thêm sản phẩm</button>
            <a href="index.php?page=product"><button type="button" class="btn-control-large">Hủy</button></a>
        </div>
    </form>
</div>

<style>
.form-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
}
.form-group.full-width {
    grid-column: 1 / -1;
}
.custom-file-upload {
    padding: 8px 15px;
    background-color: var(--orange);
    color: white;
    border-radius: 5px;
    cursor: pointer;
}
.custom-file-upload:hover {
    background-color: #e5a500;
}
.submit-btn {
    display: flex;
    gap: 10px;
    justify-content: flex-end;
    margin-top: 20px;
}
@media (max-width: 768px) {
    .form-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<script>
function previewImage(event) {
    const output = document.getElementById('img-preview');
    if (event.target.files && event.target.files[0]) {
        const file = event.target.files[0];
        if (file.size > 2 * 1024 * 1024) {
            alert('File ảnh quá lớn! Vui lòng chọn file nhỏ hơn 2MB.');
            event.target.value = '';
            output.style.display = 'none';
            return;
        }
        output.src = URL.createObjectURL(file);
        output.style.display = 'block';
    } else {
        output.style.display = 'none';
    }
}

document.querySelector('form').addEventListener('submit', function(event) {
    const name = document.getElementById('name').value.trim();
    const brandId = document.getElementById('brand_id').value;
    const categoryId = document.getElementById('category_id').value;
    const status = document.getElementById('status').value;
    const imgInput = document.getElementById('img_src');
    
    // Biến lưu thông báo lỗi
    let errorMessage = '';

    if (name === '') {
        errorMessage += 'Vui lòng nhập tên sản phẩm!\n';
    } else if (name.length < 3) {
        errorMessage += 'Tên sản phẩm phải có ít nhất 3 ký tự!\n';
    }

    if (brandId === '') {
        errorMessage += 'Vui lòng chọn thương hiệu!\n';
    }

    if (categoryId === '') {
        errorMessage += 'Vui lòng chọn danh mục!\n';
    }

    if (status === '') {
        errorMessage += 'Vui lòng chọn trạng thái!\n';
    }


    if (errorMessage !== '') {
        alert(errorMessage);
        event.preventDefault(); 
    }
});
</script>