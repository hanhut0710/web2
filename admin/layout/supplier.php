<?php
require_once "backend/supplier.php";
require_once "backend/pagination.php";
$supplier = new Supplier();

$limit = 5;
$page_num = isset($_GET['page_num']) ? max(1, intval($_GET['page_num'])) : 1; 
$totalSupplier = $supplier->getTotalSupplier(); 

$pagination = new Pagination($totalSupplier, $page_num, $limit);
$offset = $pagination->getOffset(); 
?>

<div class="section supplier active">
    <div class="admin-control">
        <div class="admin-control-center">
            <!-- thanh tìm kiếm -->
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
                $supplierList = $supplier->getAllSupplierByPagination($limit, $offset);
                foreach ($supplierList as $value) {
                    echo '<tr>
                        <td>' .$value['sup_name'].'</td>
                        <td>' .$value['email'].'</td>
                        <td>' .$value['phone'].'</td>
                        <td class="control">
                            <a href="index.php?page=editSupplier&id=' . $value['id'] . '"><button class="btn-edit"><i class="fa-light fa-pen-to-square"></i> Sửa</button></a>
                            <a href="index.php?page=deleteSupplier&id=' . $value['id'] . '"><button class="btn-delete"><i class="fa-regular fa-trash"></i> Xóa</button></a>
                        </td>
                    </tr>';
                }
            ?>
            </tbody>
        </table>
    </div>

    <?php
    echo $pagination->renderSupplier();
    ?>
</div>

<script>
document.querySelector('.btn-reset-supplier').addEventListener('click', function() {
    window.location.href = 'index.php?page=supplier';
});
</script>