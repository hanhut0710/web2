<?php
    require_once "./backend/category.php";
    require_once "./backend/product.php";
    require_once "./backend/pagination.php";
    $category = new Category();
    $categoryList = $category -> getAllCategory();

    $page_num= isset($_GET['page_num']) ? max(1, intval($_GET['page_num'])) : 1;
    $limit = 5;

    $product = new Product();
    $totalProduct = $product -> getTotalProduct();
    
    $pagination = new Pagination($totalProduct, $page_num, $limit);
    $offset = $pagination -> getOffset();

    $productList = $product -> getAllProductByCategory($limit, $offset);
?>

<div class="section product-all active">
            <div class="admin-control">
                <div class="admin-control-left">
                    <select name="the-loai" id="the-loai" onchange="filterByCategory(this.value)">
                    <option value="" selected>Tất cả</option>
                        <?php
                        if(count($categoryList) > 0)
                        {
                            foreach ($categoryList as $value) {
                                # code...
                                echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
                            }
                        }
                        // else
                        //     echo '<option>Không có</option>';
                        ?>
                    </select>
                </div>
                <div class="admin-control-center">
                    <form action="" class="form-search">
                        <span class="search-btn"><a href="adminProduct1.html"><i class="fa-light fa-magnifying-glass"></i></a></span>
                        <input id="form-search-product" type="text" class="form-search-input" placeholder="Tìm kiếm tên món...">
                    </form>
                </div>
                <div class="admin-control-right">
                    <button class="btn-control-large" id="btn-cancel-product"><i class="fa-light fa-rotate-right"></i> Làm mới</button>
                    <a href="index.php?page=addProduct"><button class="btn-control-large" id="btn-add-product" ><i class="fa-light fa-plus"></i> Thêm món mới</button></a>
                </div>
            </div>
            <!-- End of admin control -->

            <!-- List product -->
            <div id="show-product">
                 <!-- Product item-->
                  <?php
                    if(count($productList) > 0)
                    {
                        foreach ($productList as $value) {
                            # code...
                            echo '  <div class="list">
                    <div class="list-left">
                        <img src="'.$value['img_src'].'" alt="">
                        <div class="list-info">
                            <h4>'.$value['name'].'</h4>
                            <span class="list-category">'.$value['cat_name'].'</span>
                        </div>
                    </div>
                    <div class="list-right">
                        <div class="list-price">
                            <span class="list-current-price">'.$value['price'].'₫</span>
                        </div>
                        <div class="list-control">
                            <div class="list-tool">
                                <a href="xulySP.php&id='.$value['id'].'&act=edit"><button class="btn-edit" name="btnEditProduct"><i class="fa-light fa-pen-to-square"></i></button></a>
                                <a href="xulySP.php&id='.$value['id'].'&act=delete"><button class="btn-delete" name="btnDeleteProduct"><i class="fa-regular fa-trash"></i></button></a>
                            </div>
                        </div>
                    </div>
                </div>';
                        }
                    }
                  ?>   
            </div>

            <!-- page nav  -->
            <?php
                echo $pagination -> render();
            ?>
<script>
function filterByCategory(categoryId)
{
    let url = window.location.pathname + "?";
    if(categoryId)
        url += 'category_id=' +categoryId;
    window.location.href = url;
}

<script>

