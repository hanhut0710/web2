<?php
require_once "./backend/category.php";
require_once "./backend/brand.php";
require_once "./backend/product.php";

$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$product = new Product();
$product_data = $product->getProductById($product_id); // Fetch product by ID

// Kiểm tra nếu sản phẩm không tồn tại
if (!$product_data) {
    echo '<script>alert("Sản phẩm không tồn tại!");
        window.location.href = "index.php?page=product";
        </script>';
    exit();
}

$category = new Category();
$categoryList = $category->getAllCategory();

$brand = new Brand();
$brandList = $brand->getAllBrand();
?>

<div class="form-container">
    <h2>Sửa Sản Phẩm</h2>
    <form action="backend/xulySP.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $product_data['id']; ?>">
        <div class="form-grid">
            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input type="text" name="name" id="name" required placeholder="Nhập tên sản phẩm" value="<?php echo htmlspecialchars($product_data['name']); ?>">
            </div>
            <div class="form-group">
                <label for="brand_id">Thương hiệu</label>
                <select name="brand_id" id="brand_id" required>
                    <option value="">Chọn thương hiệu</option>
                    <?php 
                        foreach ($brandList as $value) {
                            $selected = ($value['id'] == $product_data['brand_id']) ? 'selected' : '';
                            echo '<option value="'.$value['id'].'" '.$selected.'>'.htmlspecialchars($value['name']).'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="category_id">Danh mục</label>
                <select name="category_id" id="category_id" required>
                    <option value="">Chọn danh mục</option>
                    <?php 
                        foreach ($categoryList as $value) {
                            $selected = ($value['id'] == $product_data['category_id']) ? 'selected' : '';
                            echo '<option value="'.$value['id'].'" '.$selected.'>'.htmlspecialchars($value['name']).'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="price">Giá bán</label>
                <input type="number" name="price" id="price" value="<?php echo $product_data['price']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="status">Trạng thái</label>
                <select name="status" id="status" required>
                    <option value="1" <?php echo $product_data['status'] == 1 ? 'selected' : ''; ?>>Hiển thị</option>
                    <option value="0" <?php echo $product_data['status'] == 0 ? 'selected' : ''; ?>>Ẩn</option>
                </select>
            </div>
            <div class="form-group full-width image-upload-container">
                <label for="img_src" class="custom-file-upload">
                    <i class="fa fa-upload"></i> Tải ảnh đại diện
                </label>
                <input type="file" name="img_src" id="img_src" accept="image/*" onchange="previewImage(event)">
                <img id="img-preview" src="<?php echo '../' .$product_data['img_src']; ?>" style="max-width: 200px; margin-top: 10px; display: block;" alt="Ảnh sản phẩm" />
            </div>
        </div>
        <div class="submit-btn">
            <button type="submit" name="btnEditProduct" class="btn-control-large"><i class="fa fa-save"></i> Lưu thay đổi</button>
            <a href="index.php?page=product"><button type="button" class="btn-control-large">Hủy</button></a>
        </div>
    </form>
</div>

<style>
.form-container {
    padding: 20px;
}
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
    display: inline-block;
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
#img-preview {
    max-width: 200px;
    width: 100%;
    height: auto;
    display: block !important;
    visibility: visible !important;
    opacity: 1 !important;
}
img[src=""], img:not([src]) {
    border: 1px dashed #ccc;
    background: #f0f0f0;
    min-height: 100px;
    display: flex !important;
    align-items: center;
    justify-content: center;
    color: #666;
    text-align: center;
    width: 200px;
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
    const fileInput = event.target;
    
    if (fileInput.files && fileInput.files[0]) {
        const file = fileInput.files[0];
        // Kiểm tra định dạng file
        if (!file.type.startsWith('image/')) {
            alert('Vui lòng chọn file ảnh (jpg, png, gif, ...)!');
            fileInput.value = '';
            output.src = '<?php echo '../' .$product_data['img_src']; ?>';
            return;
        }
        // Kiểm tra kích thước file (2MB)
        if (file.size > 2 * 1024 * 1024) {
            alert('File ảnh quá lớn! Vui lòng chọn file nhỏ hơn 2MB.');
            fileInput.value = '';
            output.src = '<?php echo '../' . $product_data['img_src']; ?>';
            return;
        }
        // Hiển thị ảnh mới
        output.src = URL.createObjectURL(file);
    } else {
        // Khôi phục ảnh hiện tại nếu không chọn file
        output.src = '<?php echo '../' .$product_data['img_src']; ?>';
    }
}

// Kiểm tra lỗi tải ảnh
document.getElementById('img-preview').addEventListener('error', function() {
    console.log('Lỗi tải ảnh: ', this.src);
    this.src = ''; // Đặt src rỗng để hiển thị placeholder
});
</script>