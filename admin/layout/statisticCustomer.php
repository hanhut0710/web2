<style>
       #top5 {
    justify-content: center;
    align-items: center;
    text-align: center;
    margin-top: 30px;
    margin-bottom: 5px; /* Giảm khoảng cách dưới */
    padding: 0; /* Xóa padding nếu có */
}

.table {
    margin-top: 0; /* Xóa margin trên của bảng */
    padding-top: 0; /* Xóa padding nếu có */
}

/* Giảm khoảng cách từ các phần tử <br /> */
h2#top5 + br {
    margin-bottom: 0px; /* Giảm khoảng cách sau <h2> */
}

h2#top5 + br + br {
    margin-bottom: 0px; /* Giảm khoảng cách giữa các <br /> */
}


</style>
            <div class="section active">
                <div class="admin-control">
                    <!-- <div class="admin-control-left">
                        <select name="the-loai-tk" id="the-loai-tk" onchange="">
                            <option>Tất cả</option>
                            <option>Cà phê</option>
                            <option>Trà trái cây</option>
                            <option>Trà sữa</option>
                            <option>Đá xay</option>
                            <option>Bánh ngọt</option>
                            <option>Đã xóa</option>
                        </select>
                    </div> -->
                    <div class="admin-control-center">
                        <form action="" class="form-search">
                            <span class="search-btn"><i class="fa-light fa-magnifying-glass" onclick="reloadPage()"></i></span>
                            <input id="form-search-tk" type="text" class="form-search-input" placeholder="Tìm kiếm tên khách hàng" oninput="">
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
                <!-- <div class="order-statistical" id="order-statistical">
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
                </div> -->
                <div class="table">
                    <table width="100%">
                        <thead>
                            <tr>
                                <td>STT</td>
                                <td>Tên khách hàng</td>
                                <td>Số lượng đơn</td>
                                <td>Tổng tiền</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody id="showTk">
                            <tbody id="showTk">
                                <tr>
                                <td>1</td>
                                <td><p>Nguyễn Văn A</p></td>
                                <td>20</td>
                                <td>1.000.000&nbsp;₫</td>
                                <td><button class="btn-detail product-order-detail" data-id="1" onclick="window.location.href='userBill.html'"><i class="fa-regular fa-eye"></i> Chi tiết</button></td>
                                </tr>      
                                
                                <tr>
                                <td>2</td>
                                <td><p>Nguyễn Thị Bưởi</p></td>
                                <td>12</td>
                                <td>600.000&nbsp;₫</td>
                                <td><button class="btn-detail product-order-detail" data-id="1" onclick="window.location.href='userBill.html'"><i class="fa-regular fa-eye"></i> Chi tiết</button></td>
                                </tr>  
                                
                                <tr>
                                <td>3</td>
                                <td><p>Trần Văn B</p></td>
                                <td>4</td>
                                <td>200.000&nbsp;₫</td>
                                <td><button class="btn-detail product-order-detail" data-id="1" onclick="window.location.href='userBill.html'"><i class="fa-regular fa-eye"></i> Chi tiết</button></td>
                                </tr>  

                                <tr>
                                <td>4</td>
                                <td><p>Nguyễn Văn Tèo</p></td>
                                <td>8</td>
                                <td>400.000&nbsp;₫</td>
                                <td><button class="btn-detail product-order-detail" data-id="1" onclick="window.location.href='userBill.html'"><i class="fa-regular fa-eye"></i> Chi tiết</button></td>
                                </tr>  

                                <tr>
                                <td>5</td>
                                <td><p>Nguyễn Văn C</p></td>
                                <td>2</td>
                                <td>100.000&nbsp;₫</td>
                                <td><button class="btn-detail product-order-detail" data-id="1" onclick="window.location.href='userBill.html'"><i class="fa-regular fa-eye"></i> Chi tiết</button></td>
                                </tr>  

                                <tr>
                                    <td>6</td>
                                    <td><p>Nguyễn Hoàng Phúc</p></td>
                                    <td>5</td>
                                    <td>250.000&nbsp;₫</td>
                                    <td><button class="btn-detail product-order-detail" data-id="1" onclick="window.location.href='userBill.html'"><i class="fa-regular fa-eye"></i> Chi tiết</button></td>
                                </tr>  
                                </tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="page-nav">
                <ul class="page-nav-list">
                    <li class="page-nav-item active">
                        <a href="statisticCustomer.html">1</a>
                    </li>
                    <li class="page-nav-item">
                        <a href="statisticCustomer2.html">2</a>
                    </li>
                    <li class="page-nav-item">
                        <a href="statisticCustomer3.html">3</a>
                    </li>
                </ul>
            </div>
            
            <h2 id="top5">TOP5 Khách hàng mua nhiều nhất</h2>
            <br/>
            <br/>
            <div class="table">
                <table width="100%">
                    <thead>
                        <tr>
                            <td>STT</td>
                            <td>Tên khách hàng</td>
                            <td>Số lượng đơn</td>
                            <td>Tổng tiền</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody id="showTk">
                        <tbody id="showTk">
                            <tr>
                            <td>1</td>
                            <td><p>Nguyễn Văn A</p></td>
                            <td>30</td>
                            <td>1.000.000&nbsp;₫</td>
                            <td><button class="btn-detail product-order-detail" data-id="1" onclick="window.location.href='userBill.html'"><i class="fa-regular fa-eye"></i> Chi tiết</button></td>
                            </tr>      
                            
                            <tr>
                            <td>2</td>
                            <td><p>Nguyễn Văn Tèo</p></td>
                            <td>12</td>
                            <td>800.000&nbsp;₫</td>
                            <td><button class="btn-detail product-order-detail" data-id="1" onclick="window.location.href='userBill.html'"><i class="fa-regular fa-eye"></i> Chi tiết</button></a></td>
                            </tr>   

                            <tr>
                            <td>3</td>
                            <td><p>Nguyễn Thị Bưởi</p></td>
                            <td>10</td>
                            <td>500.000&nbsp;₫</td>
                            <td><button class="btn-detail product-order-detail" data-id="1" onclick="window.location.href='userBill.html'"><i class="fa-regular fa-eye"></i> Chi tiết</button></a></td>
                            </tr>   

                            <tr>
                            <td>4</td>
                            <td><p>Nguyễn Văn C</p></td>
                            <td>8</td>
                            <td>400.000&nbsp;₫</td>
                            <td><button class="btn-detail product-order-detail" data-id="1" onclick="window.location.href='userBill.html'"><i class="fa-regular fa-eye"></i> Chi tiết</button></a></td>
                            </tr> 
                            
                            <tr>
                            <td>5</td>
                            <td><p>Nguyễn Hoàng Phúc</p></td>
                            <td>5</td>
                            <td>200.000&nbsp;₫</td>
                            <td><button class="btn-detail product-order-detail" data-id="1" onclick="window.location.href='userBill.html'"><i class="fa-regular fa-eye"></i> Chi tiết</button></a></td>
                            </tr> 
                            </tbody>
                    </tbody>
                </table>
            </div>
        </div>