

<h1>Quản lý chi tiết sản phẩm</h1>
    <div class="container">
        <!-- Form thêm/sửa chi tiết sản phẩm -->
        <div class="form-section">
            <h2>Thêm/Sửa chi tiết sản phẩm</h2>
            <form>
                <div class="form-group">
                    <label for="product_id">Sản phẩm</label>
                    <select id="product_id" name="product_id">
                        <option value="">Chọn sản phẩm</option>
                        <option value="1">Adidas Superstar</option>
                        <option value="2">Adidas Samba</option>
                        <!-- Thêm các sản phẩm khác từ bảng products -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="size">Kích cỡ</label>
                    <input type="text" id="size" name="size" placeholder="Ví dụ: 36">
                </div>
                <div class="form-group">
                    <label for="brand">Thương hiệu</label>
                    <input type="text" id="brand" name="brand" placeholder="Ví dụ: Adidas">
                </div>
                <div class="form-group">
                    <label for="color">Màu sắc</label>
                    <input type="text" id="color" name="color" placeholder="Ví dụ: Black">
                </div>
                <div class="form-group">
                    <label for="stock">Số lượng tồn</label>
                    <input type="number" id="stock" name="stock" placeholder="Ví dụ: 10">
                </div>
                <div class="form-group">
                    <label for="img_src">Hình ảnh</label>
                    <input type="file" id="img_src" name="img_src" accept="image/*">
                </div>
                <div class="form-group">
                    <button type="submit">Lưu</button>
                </div>
            </form>
        </div>

        <!-- Bảng danh sách chi tiết sản phẩm -->
        <div class="table-section">
            <h2>Danh sách chi tiết sản phẩm</h2>
            <table>
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Kích cỡ</th>
                        <th>Thương hiệu</th>
                        <th>Màu sắc</th>
                        <th>Số lượng tồn</th>
                        <th>Hình ảnh</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Dữ liệu mẫu -->
                    <tr>
                        <td>Adidas Superstar</td>
                        <td>36</td>
                        <td>Adidas</td>
                        <td>Black</td>
                        <td>10</td>
                        <td><img src="./img/shoes/adidassuperstar_black.png" alt="Adidas Superstar Black" class="product-img"></td>
                        <td class="actions">
                            <a href="#">Sửa</a>
                            <a href="#" class="delete">Xóa</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Adidas Samba</td>
                        <td>38</td>
                        <td>Adidas</td>
                        <td>Blue</td>
                        <td>8</td>
                        <td><img src="./img/shoes/adidassamba_blue.png" alt="Adidas Samba Blue" class="product-img"></td>
                        <td class="actions">
                            <a href="#">Sửa</a>
                            <a href="#" class="delete">Xóa</a>
                        </td>
                    </tr>
                    <!-- Thêm các dòng khác từ cơ sở dữ liệu -->
                </tbody>
            </table>
        </div>
    </div>