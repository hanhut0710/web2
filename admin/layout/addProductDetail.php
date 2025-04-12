<div class="form-container">
    <h2>Thêm chi tiết sản phẩm</h2>
    <form>
        <div class="form-grid">
            <!-- Sản phẩm -->
            <div class="form-group">
                <label for="product_id">Sản phẩm</label>
                <select id="product_id" name="product_id">
                    <option value="">Chọn sản phẩm</option>
                    <option value="1">Adidas Superstar</option>
                    <option value="2">Adidas Samba</option>
                </select>
            </div>
            <!-- Kích cỡ -->
            <div class="form-group">
                <label for="size">Kích cỡ</label>
                <input type="text" id="size" name="size" placeholder="Ví dụ: 36">
            </div>
            <!-- Thương hiệu -->
            <div class="form-group">
                <label for="brand">Thương hiệu</label>
                <input type="text" id="brand" name="brand" placeholder="Ví dụ: Adidas">
            </div>
            <!-- Màu sắc -->
            <div class="form-group">
                <label for="color">Màu sắc</label>
                <input type="text" id="color" name="color" placeholder="Ví dụ: Black">
            </div>
            <!-- Số lượng tồn -->
            <div class="form-group">
                <label for="stock">Số lượng tồn</label>
                <input type="number" id="stock" name="stock" placeholder="Ví dụ: 10">
            </div>
            <!-- Hình ảnh -->
            <div class="form-group full-width">
                <label for="img_src">Hình ảnh sản phẩm</label>
                <div class="image-upload-container">
                    <label for="img_src" class="custom-file-upload">
                        <i class="fas fa-upload"></i> Chọn hình ảnh
                    </label>
                    <input type="file" id="img_src" name="img_src" accept="image/*">
                    <img id="img-preview" src="#" alt="Xem trước hình ảnh">
                </div>
            </div>
            <!-- Nút submit -->
            <div class="submit-btn">
                <button type="submit">Thêm chi tiết sản phẩm</button>
            </div>
        </div>
    </form>
</div>

<script>
    document.getElementById('img_src').addEventListener('change', function(event) {
        const imgPreview = document.getElementById('img-preview');
        const file = event.target.files[0];
        if (file) {
            imgPreview.src = URL.createObjectURL(file);
            imgPreview.style.display = 'block';
        } else {
            imgPreview.style.display = 'none';
        }
    });
</script>