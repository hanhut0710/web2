<div class="section import active">
    <div class="admin-control">
        <div class="admin-control-left">
            <select name="supplier" id="supplier" onchange="filterBySupplier(this.value)">
                <option value="">Tất cả nhà cung cấp</option>
                <option value="1">Nhà cung cấp A</option>
                <option value="2">Nhà cung cấp B</option>
            </select>
        </div>
        <div class="admin-control-center">
            <form action="" class="form-search">
                <span class="search-btn"><i class="fa-light fa-magnifying-glass"></i></span>
                <input id="form-search-import" type="text" class="form-search-input" placeholder="Tìm kiếm mã phiếu, sản phẩm...">
            </form>
        </div>
        <div class="admin-control-right">
            <button class="btn-reset-import"><i class="fa-light fa-arrow-rotate-right"></i></button>
            <a href="index.php?page=addImport"><button class="btn-control-large" id="btn-add-import"><i class="fa-light fa-plus"></i> Tạo phiếu nhập mới</button></a>
        </div>
    </div>

    <div class="table">
        <table width="100%">
            <thead>
                <tr>
                    <td>Mã phiếu</td>
                    <td>Nhà cung cấp</td>
                    <td>Sản phẩm</td>
                    <td>Ngày nhập</td>
                    <td>Tổng số lượng</td>
                    <td>Thao tác</td>
                </tr>
            </thead>
            <tbody id="showImport">
                <tr>
                    <td>IM123456</td>
                    <td>Nhà cung cấp A</td>
                    <td>Sản phẩm A</td>
                    <td>01/01/2025</td>
                    <td>100</td>
                    <td class="control">
                        <button class="btn-detail" onclick="location.href='#'"><i class="fa-regular fa-eye"></i> Chi tiết</button>
                    </td>
                </tr>
                <tr>
                    <td>IM123457</td>
                    <td>Nhà cung cấp B</td>
                    <td>Sản phẩm B</td>
                    <td>02/01/2025</td>
                    <td>50</td>
                    <td class="control">
                        <button class="btn-detail" onclick="location.href='#'"><i class="fa-regular fa-eye"></i> Chi tiết</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="page-nav">
        <ul class="page-nav-list">
            <li class="page-nav-item active"><a href="#">1</a></li>
            <li class="page-nav-item"><a href="#">2</a></li>
        </ul>
    </div>
</div>

<script>
function filterBySupplier(supplierId) {
    let url = "index.php?page=import" + (supplierId ? "&supplier_id=" + supplierId : "");
    window.location.href = url;
}
</script>