<?php
require_once "./backend/product.php";
$product = new Product();
?>
<div class="section add-product-detail active">
    <div class="form-container">
        <h2>Thêm chi tiết sản phẩm</h2>
        <form action="./backend/xulyCTSP.php" method="post" enctype="multipart/form-data">
            <div class="form-grid">
                <div class="form-group">
                    <label for="product">Sản phẩm</label>
                    <select name="product" id="product" required>
                        <option value="">Chọn sản phẩm</option>
                        <?php
                        $productList = $product -> getAllProduct();
                        foreach ($productList as $value) {
                            echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="color">Màu sắc</label>
                    <input type="text" name="color" id="color" placeholder="VD: Black" required>
                </div>
                <div class="form-group">
                    <label for="size">Kích cỡ</label>
                    <input type="text" name="size" id="size" placeholder="VD: 36" required>
                </div>
                <div class="form-group">
                    <label for="brand">Thương hiệu</label>
                    <input type="text" name="brand" id="brand" placeholder="VD: Adidas" required>
                </div>
                <div class="form-group">
                    <label for="quantity">Số lượng</label>
                    <input type="number" name="quantity" id="quantity" min="0" placeholder="VD: 50" required>
                </div>
                <div class="form-group full-width image-upload-container">
                    <label for="image">Hình ảnh</label>
                    <input type="file" name="image" id="image" accept="image/*" onchange="previewImage(event)">
                    <label for="image" class="custom-file-upload"><i class="fa-light fa-upload"></i> Chọn ảnh</label>
                    <img id="img-preview" src="#" alt="Preview" style="display: none;">
                </div>
                <div class="submit-btn">
                    <button type="submit" name="btnAddDetails"class="btn-control-large">Lưu</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
function previewImage(event) {
    const preview = document.getElementById('img-preview');
    preview.src = URL.createObjectURL(event.target.files[0]);
    preview.style.display = 'block';
}
</script>