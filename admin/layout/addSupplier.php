<div class="section add-supplier active">
    <div class="form-container">
        <h2>Thêm nhà cung cấp</h2>
        <form action="backend/xulyNCC.php" method="POST">
            <div class="form-grid">
                <div class="form-group">
                    <label for="sup_name">Tên nhà cung cấp</label>
                    <input type="text" id="sup_name" name="sup_name" placeholder="VD: Adidas Vietnam" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="VD: contact@adidas.vn" required>
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" id="phone" name="phone" placeholder="VD: 0901234567" required>
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