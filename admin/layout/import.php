<?php
require_once "./backend/supplier.php";
require_once "./backend/import.php";
require_once "./backend/pagination.php";

$supplier = new Supplier();
$import = new Import();
?>

<div class="section import active">
    <div class="admin-control">
        <div class="admin-control-left">
            <select name="supplier" id="supplier" onchange="filterBySupplier(this.value)">
                <option value="">Tất cả</option>
                <?php
                $supplierList = $supplier->getAllSupplier();
                foreach ($supplierList as $value) {
                    echo '<option value="' . $value['id'] . '">' . $value['sup_name'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="admin-control-center">
            <form action="" class="form-search">
                <span class="search-btn"><i class="fa-light fa-magnifying-glass"></i></span>
                <input id="form-search-import" type="text" class="form-search-input" placeholder="Tìm kiếm mã phiếu...">
            </form>
        </div>
        <div class="admin-control-right">
            <a href="index.php?page=import"><button class="btn-control-large" id="btn-cancel-product"><i class="fa-light fa-rotate-right"></i> Làm mới</button></a>
            <a href="index.php?page=addImport"><button class="btn-control-large" id="btn-add-product"><i class="fa-light fa-plus"></i> Tạo phiếu nhập</button></a>
        </div>
    </div>

    <div class="table">
        <table width="100%">
            <thead>
                <tr>
                    <td>Mã phiếu</td>
                    <td>Nhà cung cấp</td>
                    <td>Ngày nhập</td>
                    <td>Tổng số lượng</td>
                    <td>Thành tiền</td>
                    <td>Thao tác</td>
                </tr>
            </thead>
            <tbody id="showImport">
                <?php
                $importList = $import->getAllImport();
                foreach ($importList as $value) {
                    echo '<tr>
                        <td>IM' . date('Ymd', strtotime($value['created_at'])) . sprintf('%03d', $value['id']) . '</td>
                        <td>' . $value['sp_name'] . '</td>
                        <td>' . date('d/m/Y', strtotime($value['created_at'])) . '</td>
                        <td>' . $value['quantity'] . '</td>
                        <td>' . number_format($value['total_price'], 2) . ' VNĐ</td>
                        <td class="control">
                            <button class="btn-detail" onclick="location.href=\'index.php?page=importdetail&import_id=' . $value['id'] . '\'"><i class="fa-regular fa-eye"></i> Chi tiết</button>
                        </td>
                    </tr>';
                }
                ?>
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