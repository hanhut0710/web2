<?php
require_once "./backend/supplier.php";
require_once "./backend/import.php";
require_once "./backend/pagination.php";

$supplier = new Supplier();
$import = new Import();

// Xử lý phân trang
$itemsPerPage = 10; // Số phiếu nhập mỗi trang
$currentPage = isset($_GET['page_num']) ? intval($_GET['page_num']) : 1;
$supplierId = isset($_GET['supplier_id']) ? intval($_GET['supplier_id']) : '';
$search = isset($_GET['search']) ? trim(htmlspecialchars($_GET['search'])) : '';

if ($search) {
    $totalItems = $import->getTotalImportBySearch($search, $supplierId);
} elseif ($supplierId) {
    $totalItems = $import->getTotalImportBySupplier($supplierId);
} else {
    $totalItems = $import->getTotalImport();
}

$pagination = new Pagination($totalItems, $currentPage, $itemsPerPage);
$offset = $pagination->getOffset(); // Định nghĩa $offset trước khi sử dụng

if ($search) {
    $importList = $import->getImportBySearch($search, $supplierId, $itemsPerPage, $offset);
} elseif ($supplierId) {
    $importList = $import->getAllImportByPagination($itemsPerPage, $offset, $supplierId);
} else {
    $importList = $import->getAllImportByPagination($itemsPerPage, $offset);
}
?>

<div class="section import active">
    <div class="admin-control">
        <div class="admin-control-left">
            <select name="supplier" id="supplier" onchange="filterBySupplier(this.value)">
                <option value="">Tất cả</option>
                <?php
                $supplierList = $supplier->getAllSupplier();
                foreach ($supplierList as $value) {
                    $selected = ($supplierId == $value['id']) ? 'selected' : '';
                    echo '<option value="' . $value['id'] . '" ' . $selected . '>' . $value['sup_name'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="admin-control-center">
            <form action="" class="form-search" onsubmit="searchImport(event)">
                <span class="search-btn"><i class="fa-light fa-magnifying-glass"></i></span>
                <input id="form-search-import" type="text" class="form-search-input" placeholder="Tìm kiếm mã phiếu...">
            </form>
        </div>
        <div class="admin-control-right">
            <a href="index.php?page=import"><button class="btn-control-large" id="btn-cancel-product"><i class="fa-light fa-rotate-right"></i> Làm mới</button></a>
            <?php 
                if($authManager->hasPermission($_SESSION['id'], 17)) {
                    echo '<a href="index.php?page=addImport"><button class="btn-control-large" id="btn-add-product"><i class="fa-light fa-plus"></i> Tạo phiếu nhập</button></a>';
                }
            ?>
        </div>
    </div>

    <div class="table">
        <table width="100%">
            <thead>
                <tr>
                    <td>Mã phiếu</td>
                    <td>Nhà cung cấp</td>
                    <td>Nhân viên nhập</td>
                    <td>Ngày nhập</td>
                    <td>Tổng số lượng</td>
                    <td>Thành tiền</td>
                    <td>Thao tác</td>
                </tr>
            </thead>
            <tbody id="showImport">
                <?php
                foreach ($importList as $value) {
                    echo '<tr>
                        <td>IM' . date('Ymd', strtotime($value['created_at'])) . sprintf('%03d', $value['id']) . '</td>
                        <td>' . $value['sp_name']. '</td>
                        <td>' . $value['staff_name']. '</td>
                        <td>' . date('d/m/Y', strtotime($value['created_at'])) . '</td>
                        <td>' . $value['quantity'] . '</td>
                        <td>' . number_format($value['total_price'], 0) . ' VNĐ</td>
                        <td class="control">';
                            if($authManager->hasPermission($_SESSION['id'], 23)) {
                                echo '<button class="btn-detail" onclick="location.href=\'index.php?page=importdetail&import_id=' . $value['id'] . '\'"><i class="fa-regular fa-eye"></i> Chi tiết</button>';
                            }
                       echo '</td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php echo $pagination->renderImport($supplierId); ?>
</div>

<script>
function filterBySupplier(supplierId) {
    let url = "index.php?page=import" + (supplierId ? "&supplier_id=" + supplierId : "");
    window.location.href = url;
}

function searchImport(event) {
    event.preventDefault();
    let searchValue = document.getElementById('form-search-import').value.trim();
    let url = "index.php?page=import";
    
    if (searchValue) {
        url += '&search=' + encodeURIComponent(searchValue);
    }
    
    <?php if (isset($_GET['supplier_id']) && $_GET['supplier_id'] !== '') { ?>
        url += '&supplier_id=<?php echo intval($_GET['supplier_id']); ?>';
    <?php } ?>
    window.location.href = url;
}
</script>