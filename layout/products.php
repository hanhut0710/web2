
<section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 sidebar">
                    <div class="shop__sidebar">
                    <div class="shop__sidebar__search">
                        <form id="searchForm" onsubmit="search(event)">
                            <input type="text" id="searchInput" class="search" placeholder="Tìm kiếm ...">
                            <button type="submit"><span class="icon_search"></span></button>
                        </form>
                    </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Phân Loại</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                            <ul id="category-list">
                                                <li><a href="#" data-category-id="all" class="active">Tất cả</a></li>
                                                <li><a href="#" data-category-id="1">Casualwear</a></li>
                                                <li><a href="#" data-category-id="5">Sportwear</a></li>
                                                <li><a href="#" data-category-id="2">Running</a></li>
                                                <li><a href="#" data-category-id="4">Basketball</a></li>
                                                <li><a href="#" data-category-id="3">Football</a></li>
                                            </ul>
                                            <div id="product-list"></div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseTwo">Thương hiệu</a>
                                    </div>
                                    <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__brand">
                                                <ul id="brand-list">
                                                    <li><a href="#" data-brand="all" class="active">Tất cả</a></li>
                                                    <li><a href="#" data-brand="1">Nike</a></li>
                                                    <li><a href="#" data-brand="2">Adidas</a></li>
                                                    <li><a href="#" data-brand="3">Puma</a></li>
                                                    <li><a href="#" data-brand="4">Vans</a></li>
                                                    <li><a href="#" data-brand="5">Converse</a></li>
                                                    <li><a href="#" data-brand="6">New Balance</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">    
                                <div class="shop__product__option__right">
                                   <button class="filter_box" onclick="openFilter()"><span>LỌC NÂNG CAO</span><i class="fa-solid fa-filter"></i></button> 
                                <form id="advancedSearchForm" onclick="loadProducts()">
                                    <input type="text" id="searchInput2" class="search" placeholder="Từ khóa...">
                                    <select id="categorySelect">
                                        <option value="all">Danh mục</option>
                                        <option value="1">Casualwear</option>
                                        <option value="5">Sportwear</option>
                                        <option value="2">Running</option>
                                        <option value="4">Basketball</option>
                                        <option value="3">Football</option>
                                    </select>

                                    <select id="brandSelect">
                                        <option value="">Hãng</option>
                                        <option value="1">Nike</option>
                                        <option value="2">Adidas</option>
                                        <option value="3">Puma</option>
                                        <option value="4">Vans</option>
                                        <option value="5">Converse</option>
                                        <option value="6">New Balance</option>
                                    </select>

                                    <select id="priceSelect">
                                        <option value="">Giá</option>
                                        <option value="1-2">1tr - 2tr</option>
                                        <option value="2-3">2tr - 3tr</option>
                                        <option value="3-4">3tr - 4tr</option>
                                        <option value="4-999">Trên 4tr</option>
                                    </select>

                                    <button type="submit" onclick="advance_search()"><span class="icon_search"></span></button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row products"></div>
                    <div class="row">   
                        <div class="col-lg-12">
                                <div style="display: flex;justify-content: center;" class="product__pagination">
                                    <a style="display: none;margin: 0 10px;" id="prePage" href="#">Prev</a>
                                    <a class="active" style="margin: 0 10px;" href="#" id="currentPage">1</a>
                                    <a style="display: none;margin: 0 10px;" href="#" id="nextPage">Next</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>