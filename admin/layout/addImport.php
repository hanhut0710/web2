<?php
require_once "./backend/supplier.php";

$supplier = new Supplier();
$supplierList = $supplier -> getAllSupplier();
?>
<div class="section add-import active">
    <div class="form-container">
        <h2>Thêm phiếu nhập hàng</h2>
        <form action="">
            <div class="form-grid">
                <div class="form-group">
                    <label for="sup_id">Nhà cung cấp</label>
                    <select id="sup_id" name="sup_id">
                        <option value="">Chọn nhà cung cấp</option>
                        <?php
                            foreach ($supplierList as $value) {
                                echo '<option value="'.$value['id'].'">'.$value['sup_name'].'</option>';
                            }
                           
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="created_at">Ngày nhập</label>
                    <input type="date" id="created_at" name="created_at">
                </div>
                <div class="form-group full-width">
                    <label>Chi tiết nhập hàng</label>
                    <div id="detail-list">
                        <div class="detail-item">
                            <select name="product_detail_id[]" required>
                                <option value="">Chọn biến thể</option>
                                <option value="1">Adidas Superstar (Black, Size 36)</option>
                                <option value="2">Adidas Superstar (White, Size 38)</option>
                                <option value="3">Nike Air Max (Red, Size 40)</option>
                            </select>
                            <input type="number" name="quantity[]" placeholder="Số lượng" min="1" required>
                            <button type="button" onclick="removeDetail(this)">Xóa</button>
                        </div>
                    </div>
                    <button type="button" onclick="addDetail()">Thêm biến thể</button>
                </div>
                <div class="submit-btn">
                    <button type="submit" class="btn-control-large">Lưu</button>
                    <a href="index.php?page=import"><button type="button" class="btn-control-large">Hủy</button></a>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
function addDetail() {
    const detailList = document.getElementById('detail-list');
    const newDetail = document.createElement('div');
    newDetail.className = 'detail-item';
    newDetail.innerHTML = `
        <select name="product_detail_id[]" required>
            <option value="">Chọn biến thể</option>
            <option value="1">Adidas Superstar (Black, Size 36)</option>
            <option value="2">Adidas Superstar (White, Size 38)</option>
            <option value="3">Nike Air Max (Red, Size 40)</option>
        </select>
        <input type="number" name="quantity[]" placeholder="Số lượng" min="1" required>
        <button type="button" onclick="removeDetail(this)">Xóa</button>
    `;
    detailList.appendChild(newDetail);
}

function removeDetail(button) {
    button.parentElement.remove();
}
</script>