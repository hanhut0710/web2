<div class="form-container">
    <h2>Thêm phiếu nhập hàng</h2>
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
            <!-- Số lượng nhập -->
            <div class="form-group">
                <label for="quantity">Số lượng nhập</label>
                <input type="number" id="quantity" name="quantity" placeholder="Ví dụ: 10">
            </div>
            <!-- Giá nhập -->
            <div class="form-group">
                <label for="price">Giá nhập (VND)</label>
                <input type="number" id="price" name="price" placeholder="Ví dụ: 2000000">
            </div>
            <!-- Nhà cung cấp -->
            <div class="form-group">
                <label for="supplier_id">Nhà cung cấp</label>
                <select id="supplier_id" name="supplier_id">
                    <option value="">Chọn nhà cung cấp</option>
                    <option value="1">Adidas Vietnam</option>
                    <option value="2">Nike Vietnam</option>
                </select>
            </div>
            <!-- Ngày nhập -->
            <div class="form-group">
                <label for="created_at">Ngày nhập</label>
                <input type="date" id="created_at" name="created_at">
            </div>
            <!-- Nút submit -->
            <div class="submit-btn">
                <button type="submit">Thêm phiếu nhập hàng</button>
            </div>
        </div>
    </form>
</div>