<?php
require_once "./backend/supplier.php";
require_once "./backend/product.php";

$supplier = new Supplier();
$product = new Product();

$supplierList = $supplier->getAllSupplier();
$productList = $product->getAllProduct();
?>

<section class="section add-import active">
    <h2 class="page-title">Thêm Phiếu Nhập Hàng</h2>

    <?php if (empty($supplierList)) { ?>
        <p style="color: red; text-align: center;">Không có nhà cung cấp nào trong hệ thống!</p>
    <?php } ?>
    <?php if (empty($productList)) { ?>
        <p style="color: red; text-align: center;">Không có sản phẩm nào trong hệ thống!</p>
    <?php } ?>

    <form id="importForm" method="post" action="backend/xulyPNH.php" enctype="multipart/form-data">
        <div class="info-table-container">
            <table class="info-table">
                <tbody>
                    <tr>
                        <th>Nhà cung cấp</th>
                        <td>
                            <select name="sup_id" id="sup_id">
                                <option value="">Chọn nhà cung cấp</option>
                                <?php foreach ($supplierList as $value) {
                                    echo '<option value="' . $value['id'] . '">' . htmlspecialchars($value['sup_name']) . '</option>';
                                } ?>
                            </select>
                        </td>
                        <th>Nhân viên</th>
                        <td>
                            <input type="text" name="staff_name" value="<?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : ''; ?>" readonly>
                            <input type="hidden" name="staff_id" value="<?php echo isset($_SESSION['staff_id']) ? htmlspecialchars($_SESSION['staff_id']) : ''; ?>">
                        </td>
                    </tr>
                    <tr>
                        <th>Ngày tạo phiếu</th>
                        <td><input type="date" name="created_at" id="created_at"></td>
                        <th>Phần trăm lợi nhuận (%)</th>
                        <td><input type="text" name="profit_percentage" id="profit_percentage" placeholder="Nhập phần trăm lợi nhuận"></td>
                    </tr>
                </tbody>
            </table>

            <div class="control-buttons">
                <button type="button" class="btn-control-large" id="add-row">Thêm dòng</button>
            </div>
        </div>

        <div class="table">
            <table id="product-table" class="product-table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá nhập</th>
                        <th>Màu sắc</th>
                        <th>Kích cỡ</th>
                        <th>Upload ảnh</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody id="product-body">
                    <tr>
                        <td>1</td>
                        <td>
                            <select name="products[0][product_id]">
                                <option value="">Chọn sản phẩm</option>
                                <?php foreach ($productList as $p) {
                                    echo '<option value="' . $p['id'] . '">' . htmlspecialchars($p['name']) . '</option>';
                                } ?>
                            </select>
                        </td>
                        <td><input type="number" name="products[0][quantity]" min="1" value="1"></td>
                        <td><input type="text" name="products[0][import_price]" placeholder="Giá nhập"></td>
                        <td><input type="text" name="products[0][color]" placeholder="Màu sắc"></td>
                        <td><input type="text" name="products[0][size]" placeholder="Kích cỡ"></td>
                        <td>
                            <label class="btn-upload" for="upload-img-1">Tải ảnh</label>
                            <input type="file" id="upload-img-1" name="products[0][img_src]" accept="image/*" style="display: none;" onchange="previewImage(this, 1)">
                            <img id="preview-img-1" class="preview-img" src="#" alt="Ảnh xem trước" style="display: none;">
                        </td>
                        <td><button type="button" class="btn-delete" onclick="deleteRow(this)">Xóa</button></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="control-buttons">
            <button type="submit" name="btnAddImport" class="btn-control-large">Tạo Phiếu Nhập</button>
        </div>
    </form>
</section>

<script>
let count = 1;

// Hàm để lấy ngày hiện tại và điền vào input date
function setCurrentDate() {
    const today = new Date();
    const year = today.getFullYear();
    const month = String(today.getMonth() + 1).padStart(2, '0');
    const day = String(today.getDate()).padStart(2, '0');
    const currentDate = `${year}-${month}-${day}`;
    document.getElementById('created_at').value = currentDate;
}

// Gọi hàm khi trang được tải
document.addEventListener('DOMContentLoaded', function() {
    setCurrentDate();
});

document.getElementById('add-row').addEventListener('click', function() {
    const tbody = document.getElementById('product-body');
    const row = document.createElement('tr');
    const rowIndex = count;
    row.innerHTML = `
        <td>${count++}</td>
        <td>
            <select name="products[${rowIndex}][product_id]">
                <option value="">Chọn sản phẩm</option>
                <?php foreach ($productList as $p) {
                    echo '<option value="' . $p['id'] . '">' . htmlspecialchars($p['name']) . '</option>';
                } ?>
            </select>
        </td>
        <td><input type="number" name="products[${rowIndex}][quantity]" min="1" value="1"></td>
        <td><input type="text" name="products[${rowIndex}][import_price]" placeholder="Giá nhập"></td>
        <td><input type="text" name="products[${rowIndex}][color]" placeholder="Màu sắc"></td>
        <td><input type="text" name="products[${rowIndex}][size]" placeholder="Kích cỡ"></td>
        <td>
            <label class="btn-upload" for="upload-img-${count}">Tải ảnh</label>
            <input type="file" id="upload-img-${count}" name="products[${rowIndex}][img_src]" accept="image/*" style="display: none;" onchange="previewImage(this, ${count})">
            <img id="preview-img-${count}" class="preview-img" src="#" alt="Ảnh xem trước" style="display: none;">
        </td>
        <td><button type="button" class="btn-delete" onclick="deleteRow(this)">Xóa</button></td>
    `;
    tbody.appendChild(row);
});

function deleteRow(btn) {
    const row = btn.closest('tr');
    row.remove();
    updateRowNumbers();
}

function updateRowNumbers() {
    const rows = document.querySelectorAll('#product-body tr');
    count = 1;
    rows.forEach((row) => {
        row.cells[0].textContent = count++;
    });
}

function previewImage(input, index) {
    const previewImg = document.getElementById(`preview-img-${index}`);
    if (input.files && input.files[0]) {
        const file = input.files[0];
        const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/pjpeg'];
        
        // Kiểm tra kiểu file
        if (!allowedTypes.includes(file.type)) {
            alert('Vui lòng chọn file ảnh hợp lệ (JPG, JPEG, PNG)!');
            input.value = '';
            previewImg.src = '#';
            previewImg.style.display = 'none';
            return;
        }
        
        // Kiểm tra kích thước file (2MB)
        if (file.size > 2 * 1024 * 1024) {
            alert('File ảnh quá lớn! Vui lòng chọn file nhỏ hơn 2MB.');
            input.value = '';
            previewImg.src = '#';
            previewImg.style.display = 'none';
            return;
        }
        
        // Hiển thị ảnh xem trước
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            previewImg.style.display = 'block';
        };
        reader.readAsDataURL(file);
    } else {
        previewImg.src = '#';
        previewImg.style.display = 'none';
    }
}

document.getElementById('importForm').addEventListener('submit', function(e) {
    let errors = [];

    // Kiểm tra nhà cung cấp
    const supId = document.getElementById('sup_id').value;
    if (!supId) 
        errors.push('Vui lòng chọn nhà cung cấp.');

    // Kiểm tra ngày tạo phiếu
    const createdAt = document.getElementById('created_at').value;
    if (!createdAt || !/^\d{4}-\d{2}-\d{2}$/.test(createdAt)) 
        errors.push('Vui lòng chọn ngày tạo phiếu hợp lệ (định dạng YYYY-MM-DD).');

    // Kiểm tra phần trăm lợi nhuận
    const profitPercentage = document.getElementById('profit_percentage').value;
    if (!profitPercentage) {
        errors.push('Vui lòng nhập phần trăm lợi nhuận.');
    } else {
        const profitValue = parseFloat(profitPercentage);
        if (isNaN(profitValue) || profitValue < 0 || profitValue > 100) {
            errors.push('Phần trăm lợi nhuận phải là số từ 0 đến 100.');
        }
    }

    // Kiểm tra danh sách sản phẩm
    const productRows = document.querySelectorAll('#product-body tr');
    if (productRows.length === 0) {
        errors.push('Vui lòng thêm ít nhất một sản phẩm.');
    } else {
        productRows.forEach((row, index) => {
            const productId = row.cells[1].querySelector('select').value;
            const quantity = row.cells[2].querySelector('input').value.trim();
            const importPrice = row.cells[3].querySelector('input').value.trim();
            const color = row.cells[4].querySelector('input').value.trim();
            const size = row.cells[5].querySelector('input').value.trim();
            const imgInput = row.cells[6].querySelector('input[type="file"]');

            if (!productId) {
                errors.push(`Sản phẩm ${index + 1}: Vui lòng chọn sản phẩm.`);
            }
            if (!quantity || !/^\d+$/.test(quantity) || parseInt(quantity) <= 0) {
                errors.push(`Sản phẩm ${index + 1}: Số lượng phải là số nguyên lớn hơn 0.`);
            }
            if (!importPrice || !/^\d+(\.\d{1,2})?$/.test(importPrice) || parseFloat(importPrice) <= 0) {
                errors.push(`Sản phẩm ${index + 1}: Giá nhập phải là số dương, tối đa 2 chữ số thập phân.`);
            }
            if (!color) {
                errors.push(`Sản phẩm ${index + 1}: Vui lòng nhập màu sắc.`);
            }
            if (!size) {
                errors.push(`Sản phẩm ${index + 1}: Vui lòng nhập kích cỡ.`);
            } else if (!/^\d+$/.test(size)) {
                errors.push(`Sản phẩm ${index + 1}: Kích cỡ phải là số.`);
            }
            if (!imgInput.files || imgInput.files.length === 0) {
                errors.push(`Sản phẩm ${index + 1}: Vui lòng chọn ảnh.`);
            }
        });
    }

    // Nếu có lỗi, ngăn gửi form và hiển thị thông báo
    if (errors.length > 0) {
        e.preventDefault();
        alert(errors.join('\n'));
    }
});
</script>

<style>
.section.add-import {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.page-title {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 30px;
    color: #333;
    text-align: center;
}

.info-table-container {
    margin-bottom: 30px;
}

.info-table {
    width: 100%;
    border-collapse: collapse;
    background-color: #f9f9f9;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.info-table th, .info-table td {
    padding: 12px 15px;
    border: 1px solid #ddd;
    text-align: left;
}

.info-table th {
    background-color: #f2f2f2;
    font-weight: bold;
    color: #555;
}

.info-table td input {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 14px;
}

.table {
    overflow-x: auto;
}

.product-table {
    width: 100%;
    border-collapse: collapse;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.product-table th, .product-table td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: left;
}

.product-table th {
    background-color: #f2f2f2;
    font-weight: bold;
    color: #555;
}

.product-table td input[type="number"],
.product-table td input[type="text"] {
    padding: 6px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
}

.product-table td:nth-child(3) input, /* Số lượng */
.product-table td:nth-child(4) input, /* Giá nhập */
.product-table td:nth-child(5) input, /* Màu sắc */
.product-table td:nth-child(6) input  /* Kích cỡ */ {
    width: 100px;
}

.product-table td select {
    width: 100%;
    padding: 6px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
}

.btn-upload {
    display: inline-block;
    padding: 6px 12px;
    background-color: #3498db;
    color: white;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.3s;
}

.btn-upload:hover {
    background-color: #2980b9;
}

.preview-img {
    display: block;
    max-width: 80px;
    margin-top: 5px;
    border-radius: 4px;
}

.control-buttons {
    text-align: right;
    margin: 20px 0;
}

.btn-control-large {
    padding: 10px 20px;
    background-color: #ff9800 !important;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-control-large:hover {
    background-color: #e68900 !important;
}

.btn-delete {
    padding: 6px 12px;
    background-color: #e74c3c !important;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-delete:hover {
    background-color: #c0392b !important;
}
</style>