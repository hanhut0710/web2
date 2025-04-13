<?php
// require_once "./backend/supplier.php";
require_once "./backend/product.php";

// $supplier = new Supplier();
// $supplierList = $supplier->getAllSuppliers();

$product = new Product();
$productList = $product->getAllProduct();
?>

<div class="section add-import active">
    <div class="form-container">
        <h2>Tạo phiếu nhập hàng</h2>
        <form action="xulyImport.php?act=add" method="post">
            <div class="form-grid">
                <div class="form-group">
                    <label for="supplier">Nhà cung cấp</label>
                    <select name="supplier" id="supplier" required>
                        <?php foreach ($supplierList as $value) { ?>
                            <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="product">Sản phẩm</label>
                    <select name="product" id="product" required>
                        <?php foreach ($productList as $value) { ?>
                            <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="color">Màu sắc</label>
                    <input type="text" name="color" id="color" required>
                </div>
                <div class="form-group">
                    <label for="size">Kích cỡ</label>
                    <input type="text" name="size" id="size" required>
                </div>
                <div class="form-group">
                    <label for="quantity">Số lượng</label>
                    <input type="number" name="quantity" id="quantity" required>
                </div>
                <div class="form-group">
                    <label for="date">Ngày nhập</label>
                    <input type="date" name="date" id="date" required>
                </div>
                <div class="submit-btn">
                    <button type="submit" class="btn-control-large">Lưu</button>
                </div>
            </div>
        </form>
    </div>
</div>