<?php
require_once "./backend/category.php";
$category = new Category();
$categoryList = $category->getAllCategory();
?>

<div class="form-container">
  <h2>Thêm Sản Phẩm</h2>
  <form action="./backend/xulySP.php" method="POST" enctype="multipart/form-data">
    <div class="form-grid">
      <div class="form-group">
        <label for="name">Tên sản phẩm</label>
        <input type="text" name="name" id="name" required>
      </div>
      <div class="form-group">
        <label for="price">Giá</label>
        <input type="number" name="price" id="price" step="0.01" required>
      </div>
      <div class="form-group">
        <label for="category_id">Thể loại</label>
        <select name="category_id" id="category_id" required>
          <option value="">Chọn thể loại</option>
          <?php foreach ($categoryList as $cat) { ?>
            <option value="<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></option>
          <?php } ?>
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
          <input type="file" name="img_src" accept="image/*" onchange="previewImage(event)" required>
          <i class="fa fa-upload"></i> Tải ảnh đại diện
        </label>
        <img id="img-preview" style="display:none; max-width: 200px;" />
      </div>
    </div>
    <div class="submit-btn">
      <button type="submit" name="btnAddProduct"><i class="fa fa-plus-circle"></i> Thêm sản phẩm</button>
    </div>
  </form>
</div>

<script>
function previewImage(event) {
  const output = document.getElementById('img-preview');
  output.src = URL.createObjectURL(event.target.files[0]);
  output.style.display = 'block';
}
</script>