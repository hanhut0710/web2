
<style>
        #customer-statistical {             /* Sử dụng Flexbox */
        justify-content: center;    /* Căn giữa theo chiều ngang */
        align-items: center;
        text-align: center;        /* Căn giữa theo chiều dọc */ 
        }
    </style>
            <div class="section active">
                <div class="admin-control">
                    <div class="admin-control-left">
                        <select name="the-loai-tk" id="the-loai-tk" onchange="">
                            <option>Tất cả</option>
                            <option>Cà phê</option>
                            <option>Trà trái cây</option>
                            <option>Trà sữa</option>
                            <option>Đá xay</option>
                            <option>Bánh ngọt</option>
                            <option>Đã xóa</option>
                        </select>
                    </div>
                    <div class="admin-control-center">
                        <form action="" class="form-search">
                            <span class="search-btn"><i class="fa-light fa-magnifying-glass" onclick="reloadPage()"></i></span>
                            <input id="form-search-tk" type="text" class="form-search-input" placeholder="Tìm kiếm tên món..." oninput="">
                        </form>
                    </div>
                    <div class="admin-control-right">
                        <form action="" class="fillter-date">
                            <div>
                                <label for="time-start">Từ</label>
                                <input type="date" class="form-control-date" id="time-start-tk" onchange="">
                            </div>
                            <div>
                                <label for="time-end">Đến</label>
                                <input type="date" class="form-control-date" id="time-end-tk" onchange="">
                            </div>
                        </form> 
                        <button class="btn-reset-order" onclick="reloadPage()"><i class="fa-regular fa-arrow-up-short-wide"></i></i></button>
                        <button class="btn-reset-order" onclick="reloadPage()"><i class="fa-regular fa-arrow-down-wide-short"></i></button>
                        <button class="btn-reset-order" onclick="reloadPage()"><i class="fa-light fa-arrow-rotate-right"></i></button>                    
                    </div>
                </div>
                <div class="order-statistical" id="order-statistical">
                    <div class="order-statistical-item">
                        <div class="order-statistical-item-content">
                            <p class="order-statistical-item-content-desc">Sản phẩm được bán ra</p>
                            <h4 class="order-statistical-item-content-h" id="quantity-product">20</h4>
                        </div>
                        <div class="order-statistical-item-icon">
                            <i class="fa-light fa-salad"></i>
                        </div>
                    </div>
                    <div class="order-statistical-item">
                        <div class="order-statistical-item-content">
                            <p class="order-statistical-item-content-desc">Số lượng bán ra</p>
                            <h4 class="order-statistical-item-content-h" id="quantity-order">20</h4>
                        </div>
                        <div class="order-statistical-item-icon">
                            <i class="fa-light fa-file-lines"></i>
                        </div>
                    </div>
                    <div class="order-statistical-item">
                        <div class="order-statistical-item-content">
                            <p class="order-statistical-item-content-desc">Doanh thu</p>
                            <h4 class="order-statistical-item-content-h" id="quantity-sale">500.000&nbsp;₫</h4>
                        </div>
                        <div class="order-statistical-item-icon">
                            <i class="fa-light fa-dollar-sign"></i>
                        </div>
                    </div>
                </div>
                <div class="table">
                    <table width="100%">
                        <thead>
                            <tr>
                                <td>STT</td>
                                <td>Tên món</td>
                                <td>Số lượng bán</td>
                                <td>Doanh thu</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody id="showTk">
                            <tbody id="showTk">
                                <tr>
                                <td>1</td>
                                <td><div class="prod-img-title"><img class="prd-img-tbl" src="../images/trasuaoolong.png" alt=""><p>Trà Sữa Oolong</p></div></td>
                                <td>5</td>
                                <td>245.000&nbsp;₫</td>
                                <td><button class="btn-detail product-order-detail" data-id="1" onclick="window.location.href='bill.html'"><i class="fa-regular fa-eye"></i> Chi tiết</button></td>
                                </tr>      
                                
                                <tr>
                                <td>2</td>
                                <td><div class="prod-img-title"><img class="prd-img-tbl" src="../images/frostymatcha.png" alt=""><p>Frosty Matcha</p></div></td>
                                <td>3</td>
                                <td>180.000 &nbsp;₫</td>
                                <td><button class="btn-detail product-order-detail" data-id="2" onclick="window.location.href='bill.html'"><i class="fa-regular fa-eye"></i> Chi tiết</button></td>
                                </tr>      
                                
                                <tr>
                                <td>3</td>
                                <td><div class="prod-img-title"><img class="prd-img-tbl" src="../images/bacxiu.png" alt=""><p>Bạc Xỉu</p></div></td>
                                <td>2</td>
                                <td>78.000&nbsp;₫</td>
                                <td><button class="btn-detail product-order-detail" data-id="3" onclick="window.location.href='bill.html'"><i class="fa-regular fa-eye"></i> Chi tiết</button></td>
                                </tr>      
                                
                                <tr>
                                <td>4</td>
                                <td><div class="prod-img-title"><img class="prd-img-tbl" src="../images/banhgau.png" alt=""><p>Bánh Gấu Chocolate</p></div></td>
                                <td>2</td>
                                <td>38.000&nbsp;₫</td>
                                <td><button class="btn-detail product-order-detail" data-id="4" onclick="window.location.href='bill.html'"><i class="fa-regular fa-eye"></i> Chi tiết</button></a></td>
                                </tr>      
                                
                                <tr>
                                <td>5</td>
                                <td><div class="prod-img-title"><img class="prd-img-tbl" src="../images/tradaocamsa.png" alt=""><p>Trà đào cam sả</p></div></td>
                                <td>1</td>
                                <td>39.000&nbsp;₫</td>
                                <td><button class="btn-detail product-order-detail" data-id="5" onclick="window.location.href='bill.html'"><i class="fa-regular fa-eye"></i> Chi tiết</button></td>
                                </tr>      
                                </tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="page-nav">
                <ul class="page-nav-list">
                    <li class="page-nav-item active">
                        <a href="statistic.html">1</a>
                    </li>
                    <li class="page-nav-item">
                        <a href="statistic2.html">2</a>
                    </li>
                    <li class="page-nav-item">
                        <a href="statistic3.html">3</a>
                    </li>
                </ul>
            </div>
            