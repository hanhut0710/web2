<div class="section product-all active">
            <div class="admin-control">
                <div class="admin-control-left">
                    <select name="the-loai" id="the-loai">
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
                        <span class="search-btn"><a href="adminProduct1.html"><i class="fa-light fa-magnifying-glass"></i></a></span>
                        <input id="form-search-product" type="text" class="form-search-input" placeholder="Tìm kiếm tên món...">
                    </form>
                </div>
                <div class="admin-control-right">
                    <button class="btn-control-large" id="btn-cancel-product" onclick="location.href='adminProduct1.html'"><i class="fa-light fa-rotate-right"></i> Làm mới</button>
                    <button class="btn-control-large" id="btn-add-product" onclick="location.href='addProduct.html'"><i class="fa-light fa-plus"></i> Thêm món mới</button>
                </div>
            </div>
            <!-- End of admin control -->

            <!-- List product -->
            <div id="show-product">
                 <!-- Bac xiu -->
                 <div class="list">
                    <div class="list-left">
                        <img src="../images/bacxiu.png" alt="">
                        <div class="list-info">
                            <h4>Bạc Xỉu</h4>
                            <p class="list-note">Bạc sỉu chính là "Ly sữa trắng kèm một chút cà phê". Thức uống này rất phù hợp những ai vừa muốn trải nghiệm chút vị đắng của cà phê vừa muốn thưởng thức vị ngọt béo ngậy từ sữa.</p>
                            <span class="list-category">Cà phê</span>
                        </div>
                    </div>
                    <div class="list-right">
                        <div class="list-price">
                            <span class="list-current-price">39.000 ₫</span>
                        </div>
                        <div class="list-control">
                            <div class="list-tool">
                                <button class="btn-edit" onclick="location.href='editProduct.html'"><i class="fa-light fa-pen-to-square"></i></button>
                                <button class="btn-delete" onclick="deleteProduct(this)"><i class="fa-regular fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Cf den da -->
                <div class="list">
                    <div class="list-left">
                        <img src="../images/caphedenda.png" alt="">
                        <div class="list-info">
                            <h4>Cà phê đen đá</h4>
                            <p class="list-note">Như trong mv của Amee , Đen đá nhưng có đường đậm chất hương vị Việt Nam , đậm đà hơn cà phê Laura của Nhật Kim Anh. Uống xong rất tỉnh táo và hùng hục sức khỏe.</p>
                            <span class="list-category">Cà phê</span>
                        </div>
                    </div>
                    <div class="list-right">
                        <div class="list-price">
                            <span class="list-current-price">35.000 ₫</span>
                        </div>
                        <div class="list-control">
                            <div class="list-tool">
                                <button class="btn-edit" onclick="location.href='editProduct.html'"><i class="fa-light fa-pen-to-square"></i></button>
                                <button class="btn-delete" onclick="deleteProduct(this)"><i class="fa-regular fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Cf sua da -->
                <div class="list">
                    <div class="list-left">
                        <img src="../images/caphesuada.png" alt="">
                        <div class="list-info">
                            <h4>Cà phê sữa đá</h4>
                            <p class="list-note">Cà phê sữa đá phổ biển và đậm chất Việt , là thức uống gần như hằng ngày của mỗi người giúp tỉnh táo và còn hỗ trợ cho đường ruột.</p>
                            <span class="list-category">Cà phê</span>
                        </div>
                    </div>
                    <div class="list-right">
                        <div class="list-price">
                            <span class="list-current-price">39.000 ₫</span>
                        </div>
                        <div class="list-control">
                            <div class="list-tool">
                                <button class="btn-edit" onclick="location.href='editProduct.html'"><i class="fa-light fa-pen-to-square"></i></button>
                                <button class="btn-delete" onclick="deleteProduct(this)"><i class="fa-regular fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tra dao cam sa -->
                <div class="list">
                    <div class="list-left">
                        <img src="../images/tradaocamsa.png" alt="">
                        <div class="list-info">
                            <h4>Trà đào cam sả</h4>
                            <p class="list-note">Trà đào cam sả có vị đậm ngọt thanh của đào, vị chua chua dịu nhẹ của cam và hương thơm của sả.</p>
                            <span class="list-category">Trà trái cây</span>
                        </div>
                    </div>
                    <div class="list-right">
                        <div class="list-price">
                            <span class="list-current-price">39.000 ₫</span>
                        </div>
                        <div class="list-control">
                            <div class="list-tool">
                                <button class="btn-edit" onclick="location.href='editProduct.html'"><i class="fa-light fa-pen-to-square"></i></button>
                                <button class="btn-delete" onclick="deleteProduct(this)"><i class="fa-regular fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
               <!-- Tra kombucha -->
               <div class="list">
                <div class="list-left">
                    <img src="../images/trakombucha.png" alt="">
                    <div class="list-info">
                        <h4>Trà kombucha</h4>
                        <p class="list-note">Một món trà mới tại thị trường Việt Nam , trà được lên men từ men Kombucha rất healthy , hỗ trợ giảm cân , tăng cường đề kháng.</p>
                        <span class="list-category">Trà trái cây</span>
                    </div>
                </div>
                <div class="list-right">
                    <div class="list-price">
                        <span class="list-current-price">39.000 ₫</span>
                    </div>
                    <div class="list-control">
                        <div class="list-tool">
                            <button class="btn-edit" onclick="location.href='editProduct.html'"><i class="fa-light fa-pen-to-square"></i></button>
                            <button class="btn-delete" onclick="deleteProduct(this)"><i class="fa-regular fa-trash"></i></button>
                        </div>
                    </div>
                </div>
                </div> 
                <!-- Tra dao kombucha -->
               <div class="list">
                <div class="list-left">
                    <img src="../images/tradaokombucha.png" alt="">
                    <div class="list-info">
                        <h4>Trà đào kombucha</h4>
                        <p class="list-note">Một món trà mới tại thị trường Việt Nam , trà được lên men từ men Kombucha và đào tươi rất healthy , hỗ trợ giảm cân , tăng cường đề kháng.</p>
                        <span class="list-category">Trà trái cây</span>
                    </div>
                </div>
                <div class="list-right">
                    <div class="list-price">
                        <span class="list-current-price">49.000 ₫</span>
                    </div>
                    <div class="list-control">
                        <div class="list-tool">
                            <button class="btn-edit" onclick="location.href='editProduct.html'"><i class="fa-light fa-pen-to-square"></i></button>
                            <button class="btn-delete" onclick="deleteProduct(this)"><i class="fa-regular fa-trash"></i></button>
                        </div>
                    </div>
                </div>
            </div>
             <!-- Hong tra sua tran chau -->
             <div class="list">
                <div class="list-left">
                    <img src="../images/hongtrasuatranchau.png" alt="">
                    <div class="list-info">
                        <h4>Hồng trà sữa trân châu</h4>
                        <p class="list-note">Là món rất quen thuộc và phổ biến với giới trẻ. Nhưng hương vị của nó không hề đơn giản khi được sử dụng lá hồng trà nhập khẩu hảo hạng mang tới hương vị không thể quên.</p>
                        <span class="list-category">Trà sữa</span>
                    </div>
                </div>
                <div class="list-right">
                    <div class="list-price">
                        <span class="list-current-price">49.000 ₫</span>
                    </div>
                    <div class="list-control">
                        <div class="list-tool">
                            <button class="btn-edit" onclick="location.href='editProduct.html'"><i class="fa-light fa-pen-to-square"></i></button>
                            <button class="btn-delete" onclick="deleteProduct(this)"><i class="fa-regular fa-trash"></i></button>
                        </div>
                    </div>
                </div>
            </div>
             </div> 
        </div>

            <!-- page nav  -->
            <div class="page-nav">
                <ul class="page-nav-list">
                    <li class="page-nav-item active">
                        <a href="#">1</a>
                    </li>
                    <li class="page-nav-item">
                        <a href="adminProduct2.html">2</a>
                    </li>
                </ul>
            </div>
        </div>