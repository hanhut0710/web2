<div class="section add-supplier active">
    <div class="form-container">
        <h2>Thêm nhà cung cấp</h2>
        <form action="backend/xulyNCC.php" method="POST" id="addSupplierForm">
            <div class="form-grid">
                <div class="form-group">
                    <label for="sup_name">Tên nhà cung cấp</label>
                    <input type="text" id="sup_name" name="sup_name" placeholder="VD: Adidas Vietnam">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" placeholder="VD: contact@adidas.vn">
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" id="phone" name="phone" placeholder="VD: 0901234567">
                </div>
                <div class="submit-btn">
                    <button type="submit" name="btnAddSupplier" class="btn-control-large">Thêm</button>
                    <a href="index.php?page=supplier"><button type="button" class="btn-control-large">Hủy</button></a>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
.submit-btn {
    margin-top: 20px;
    grid-column: 1 / 3;
    display: flex;
    justify-content: center;
    gap: 10px;
}

.btn-control-large {
    background-color: var(--orange);
    height: 40px;
    color: #fff;
    border-radius: 8px;
    padding: 10px 20px;
    min-width: 100px;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.btn-control-large:hover {
    background-color: #e5a500;
}

.btn-cancel {
    background-color: #e5e5e5;
    color: var(--dark-gray);
}

.btn-cancel:hover {
    background-color: #d0d0d0;
}

.submit-btn a {
    text-decoration: none;
    display: inline-block;
}
</style>

<script>
document.getElementById('addSupplierForm').addEventListener('submit', function(e) {
    e.preventDefault();

    let name = document.getElementById('sup_name').value;
    let email = document.getElementById('email').value;
    let phone = document.getElementById('phone').value;

    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    const phonePattern = /^\d{10}$/;
    if(name == '' || phone == '' || email == '')
    {
        alert('Vui lòng nhập đầy đủ thông tin !');
        return;
    }

    if(!emailPattern.test(email))
    {
        alert('Nhập sai định dạng mail. Vui lòng thử lại !');
        return;
    }

    if(!phonePattern.test(phone))
    {
        alert('Nhập sai định dạng SĐT. Vui lòng thử lại !');
        return;
    }

    this.submit();
});
</script>