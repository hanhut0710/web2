<?php
require_once "backend/supplier.php";
$supplier = new Supplier();
?>

<div class="section supplier active">
    <div class="admin-control">
        <div class="admin-control-center">
            <form action="" class="form-search">
                <span class="search-btn"><i class="fa-light fa-magnifying-glass"></i></span>
                <input id="form-search-supplier" type="text" class="form-search-input" placeholder="Tìm kiếm tên, email...">
            </form>
        </div>
        <div class="admin-control-right">
            <button class="btn-reset-supplier"><i class="fa-light fa-arrow-rotate-right"></i></button>
            <a href="index.php?page=addSupplier"><button class="btn-control-large" id="btn-add-supplier"><i class="fa-light fa-plus"></i> Thêm nhà cung cấp mới</button></a>
        </div>
    </div>

    <div class="table">
        <table width="100%">
            <thead>
                <tr>
                    <td>Tên nhà cung cấp</td>
                    <td>Email</td>
                    <td>Số điện thoại</td>
                    <td>Thao tác</td>
                </tr>
            </thead>
            <tbody id="showSupplier">
            <?php
                $supplierList = $supplier -> getAllSupplier();
                foreach ($supplierList as $value) {
                    # code...
                    echo '<tr>
                    <td>'.$value['sup_name'].'</td>
                    <td>'.$value['email'].'</td>
                    <td>'.$value['phone'].'</td>
                    <td class="control">
                        <a href="index.php?page=editSupplier&id='.$value['id'].'"><button class="btn-edit""><i class="fa-light fa-pen-to-square"></i> Sửa</button></a>
                        <a href="index.php?page=deleteSupplier&id='.$value['id'].'"><button class="btn-delete"><i class="fa-regular fa-trash"></i> Xóa</button></a>
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
document.getElementById('form-search-supplier').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        alert('Tìm kiếm: ' + this.value);
    }
});

document.querySelector('.btn-reset-supplier').addEventListener('click', function() {
    window.location.href = 'index.php?page=supplier';
});
</script>