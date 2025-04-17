<?php
require_once "backend/supplier.php";

$supplier = new Supplier();
$id = $_GET['id'];

$info = $supplier->getSupplierById($id);
?>
<div class="section edit-supplier active">
    <div class="form-container">
        <h2>Sửa nhà cung cấp</h2>
        <form action="backend/xulyNCC.php" id="editSupplierForm" method="POST" onsubmit="return validateEditSupplier()">
            <input type="hidden" name="id" value="<?php echo $info['id']; ?>">
            <div class="form-grid">
                <div class="form-group">
                    <label for="sup_name">Tên nhà cung cấp</label>
                    <input type="text" id="sup_name" name="sup_name" value="<?php echo $info['sup_name']; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" value="<?php echo $info['email']; ?>">
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" id="phone" name="phone" value="<?php echo $info['phone']; ?>">
                </div>
                <div class="submit-btn">
                    <button type="submit" name="btnEditSupplier" class="btn-control-large">Lưu</button>
                    <a href="index.php?page=supplier"><button type="button" class="btn-control-large">Hủy</button></a>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
function validateEditSupplier() {
    let name = document.getElementById('sup_name').value.trim();
    let email = document.getElementById('email').value.trim();
    let phone = document.getElementById('phone').value.trim();

    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    const phonePattern = /^\d{10}$/;

    if (name === '') {
        alert('Vui lòng nhập tên nhà cung cấp!');
        return false;
    }

    if (email === '') {
        alert('Vui lòng nhập email!');
        return false;
    }

    if (phone === '') {
        alert('Vui lòng nhập số điện thoại!');
        return false;
    }

    if (!emailPattern.test(email)) {
        alert('Nhập sai định dạng email. Vui lòng thử lại!');
        return false;
    }

    if (!phonePattern.test(phone)) {
        alert('Nhập sai định dạng số điện thoại (10 chữ số). Vui lòng thử lại!');
        return false;
    }

    return true;
}
</script>