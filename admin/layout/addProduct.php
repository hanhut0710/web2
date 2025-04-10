<div class="form-container">
  <h2>Thêm Sản Phẩm</h2>
  <form action="xulySP.php" method="POST" enctype="multipart/form-data">
    <div class="form-grid">
      <div class="form-group">
        <label for="name">Tên sản phẩm</label>
        <input type="text" name="name" id="name" required>
      </div>

      <div class="form-group">
        <label for="price">Giá</label>
        <input type="number" name="price" id="price" required>
      </div>

      <div class="form-group">
        <label for="stock">Tồn kho</label>
        <input type="number" name="stock" id="stock" required>
      </div>

      <div class="form-group">
        <label for="category_id">Thể loại</label>
        <select name="category_id" id="category_id" required>
          <option value="">--Chọn--</option>
          <option value="1">Giày thể thao</option>
        </select>
      </div>

      <div class="form-group">
        <label for="status">Trạng thái</label>
        <select name="status" id="status">
          <option value="1" selected>Hiển thị</option>
          <option value="0">Ẩn</option>
        </select>
      </div>

      <div class="form-group full-width image-upload-container">
        <label class="custom-file-upload">
          <input type="file" name="img_src" accept="image/*" onchange="previewImage(event)">
          <i class="fa fa-upload"></i> Tải ảnh sản phẩm
        </label>
        <img id="img-preview" style="display:none;" />
      </div>

      <div class="form-group">
        <label for="color">Màu sắc</label>
        <input type="text" name="color" required>
      </div>

      <div class="form-group">
        <label for="size">Size</label>
        <input type="text" name="size" required>
      </div>

      <div class="form-group">
        <label for="brand">Thương hiệu</label>
        <input type="text" name="brand" required>
      </div>

      <div class="form-group">
        <label for="detail_stock">Tồn kho biến thể</label>
        <input type="number" name="detail_stock" required>
      </div>
    </div>

    <div class="submit-btn">
      <button type="submit"><i class="fa fa-plus-circle"></i> Thêm sản phẩm</button>
    </div>
  </form>
</div>


<script>
  function previewImage(event) {
    const output = document.getElementById('img-preview');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.style.display = 'block';
  }

  function previewImageDetail(event) {
    const output = document.getElementById('img-preview-detail');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.style.display = 'block';
  }
</script>
