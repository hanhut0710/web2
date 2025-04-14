<div class="section import active">
    <div class="admin-control">
        <div class="admin-control-left">
            <select name="supplier" id="supplier" onchange="filterBySupplier(this.value)">
                <option value="">Tất cả nhà cung cấp</option>
                <option value="1">Nhà cung cấp A</option>
                <option value="2">Nhà cung cấp B</option>
            </select>
        </div>
        <div class="admin-control-right">
            <a href="index.php?page=addImport"><button class="btn-control-large" id="btn-add-import"><i class="fa-light fa-plus"></i> Tạo phiếu nhập mới</button></a>
        </div>
    </div>

    <div id="show-import">
        <div class="list">
            <div class="list-left">
                <div class="list-info">
                    <h4>Mã phiếu: IM123456</h4>
                    <p>Nhà cung cấp: Nhà cung cấp A</p>
                    <p>Ngày nhập: 01/01/2025</p>
                    <p>Tổng số lượng: 100</p>
                </div>
            </div>
            <div class="list-right">
                <div class="list-control">
                    <div class="list-tool">
                        <a href="#"><button class="btn-detail"><i class="fa-light fa-eye"></i></button></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="no-result hidden">
            <i class="fa-light fa-circle-exclamation"></i>
            <h4 class="no-result-h">Không có phiếu nhập hàng nào.</h4>
        </div>
    </div>

    <div class="page-nav">
        <ul class="page-nav-list">
            <li class="page-nav-item"><a href="#">«</a></li>
            <li class="page-nav-item active"><a href="#">1</a></li>
            <li class="page-nav-item"><a href="#">2</a></li>
            <li class="page-nav-item"><a href="#">»</a></li>
        </ul>
    </div>
</div>

<script>
function filterBySupplier(supplierId) {
    let url = "index.php?page=import" + (supplierId ? "&supplier_id=" + supplierId : "");
    window.location.href = url;
}
</script>