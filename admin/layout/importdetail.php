<?php
require_once "./backend/supplier.php";
require_once "./backend/import.php";
require_once "./backend/productdetails.php";
require_once "./backend/product.php";
require_once "./backend/staff.php"; // Thêm class Staff

$supplier = new Supplier();
$productdetails = new ProductDetails();
$product = new Product();
$import = new Import();
$staff = new Staff(); // Khởi tạo class Staff

$import_id = isset($_GET['import_id']) ? (int)$_GET['import_id'] : 0;
$import_info = $import_id ? $import->getImportById($import_id) : null;
$import_details = $import->getImportDetailsByImport($import_id);

// Lấy thông tin nhân viên nếu import_info tồn tại
$staff_info = null;
if ($import_info && isset($import_info['staff_id'])) {
    $staff_info = $staff->getStaffById($import_info['staff_id']);
}

// Tính tổng số lượng từ chi tiết
$total_quantity = 0;
foreach ($import_details as $detail) {
    $total_quantity += $detail['quantity'];
}
?>

<div class="section import-detail active">
    <div class="form-container">
        <h2>Chi tiết phiếu nhập hàng</h2>
        <div class="import-info">
            <div class="info-group">
                <label>Mã phiếu:</label>
                <span><?php echo $import_info ? 'IM' . date('Ymd', strtotime($import_info['created_at'])) . sprintf('%03d', $import_info['id']) : 'N/A'; ?></span>
            </div>
            <div class="info-group">
                <label>Nhà cung cấp:</label>
                <span><?php echo $import_info ? htmlspecialchars($import_info['sup_name']) : 'N/A'; ?></span>
            </div>
            <div class="info-group">
                <label>Nhân viên nhập:</label>
                <span><?php echo $staff_info ? htmlspecialchars($staff_info['username']) : 'N/A'; ?></span>
            </div>
            <div class="info-group">
                <label>Ngày nhập:</label>
                <span><?php echo $import_info ? date('d/m/Y', strtotime($import_info['created_at'])) : 'N/A'; ?></span>
            </div>
            <div class="info-group">
                <label>Tổng thành tiền:</label>
                <span><?php echo $import_info ? number_format($import_info['total_price'], 0) . ' VNĐ' : 'N/A'; ?></span>
            </div>
        </div>

        <div class="table">
            <table width="100%">
                <thead>
                    <tr>
                        <td>Sản phẩm</td>
                        <td>Màu sắc</td>
                        <td>Kích cỡ</td>
                        <td>Giá nhập</td>
                        <td>Số lượng</td>
                        <td>Thành tiền</td>
                    </tr>
                </thead>
                <tbody id="showImportDetails">
                    <?php
                    if ($import_details) {
                        foreach ($import_details as $detail) {
                            echo '<tr>
                                <td>' . htmlspecialchars($detail['name']) . '</td>
                                <td>' . htmlspecialchars($detail['color']) . '</td>
                                <td>' . htmlspecialchars($detail['size']) . '</td>
                                <td>' . number_format($detail['price'], 0) . ' VNĐ</td>
                                <td>' . $detail['quantity'] . '</td>
                                <td>' . number_format($detail['total_price'], 0) . ' VNĐ</td>
                            </tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="total-quantity">
            <label>Tổng số lượng:</label>
            <span><?php echo $total_quantity; ?></span>
        </div>

        <div class="control-buttons">
            <a href="index.php?page=import"><button class="btn-control-large">Quay lại</button></a>
        </div>
    </div>
</div>