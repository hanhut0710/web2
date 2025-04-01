<style>
        .status-checkbox {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    width: 20px;
    height: 20px;
    border: 2px solid #ccc;
    border-radius: 4px;
    position: relative;
    cursor: pointer;
    background-color: #fff;
    transition: all 0.3s ease;
}

/* Màu xanh khi checkbox được tích */
.status-checkbox:checked {
    border-color: #4CAF50; /* Màu xanh khi checkbox được chọn */
    background-color: #4CAF50;
}

/* Tạo hiệu ứng dấu tích khi checkbox được chọn */
.status-checkbox:checked::before {
    content: '';
    position: absolute;
    left: 5px;
    top: 1px;
    width: 8px;
    height: 12px;
    border: solid white;
    border-width: 0 3px 3px 0;
    transform: rotate(45deg);
}

/* Hiệu ứng hover khi di chuột qua checkbox */
.status-checkbox:hover {
    border-color: #4CAF50;
}
</style>
            <!-- Account  -->
            <div class="section active">
                <div class="admin-control">
                    <div class="admin-control-left">
                        <select name="tinh-trang-user" id="tinh-trang-user" onchange="">
                            <option value="2">Tất cả</option>
                            <option value="1">Hoạt động</option>
                            <option value="0">Bị khóa</option>
                        </select>
                    </div>
                    <div class="admin-control-center">
                        <form action="" class="form-search">
                            <span class="search-btn"><i class="fa-light fa-magnifying-glass" onclick="reloadPage()"></i></span>
                            <input id="form-search-user" type="text" class="form-search-input" placeholder="Tìm kiếm khách hàng..." oninput="">
                        </form>
                    </div>
                    <div class="admin-control-right">
                        <form action="" class="fillter-date">
                            <div>
                                <label for="time-start">Từ</label>
                                <input type="date" class="form-control-date" id="time-start-user" onchange="">
                            </div>
                            <div>
                                <label for="time-end">Đến</label>
                                <input type="date" class="form-control-date" id="time-end-user" onchange="">
                            </div>
                        </form>      
                        <button class="btn-reset-order" onclick="reloadPage()"><i class="fa-light fa-arrow-rotate-right"></i></button>     
                        <button id="btn-add-user" class="btn-control-large" onclick="addAccount()"><i class="fa-light fa-plus"></i> <span>Thêm khách hàng</span></button>          
                    </div>
                </div>
                <div class="table">
                    <table width="100%">
                        <thead>
                            <tr>
                                <td>STT</td>
                                <td>Họ và tên</td>
                                <td>Liên hệ</td>
                                <td>Địa chỉ</td>
                                <td>Email</td>
                                <td>Tình trạng</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody id="show-user">
                            <tr>
                                <td>1</td>
                                <td>Nguyễn Văn A</td>
                                <td>0934123456</td>
                                <td>273 An Dương Vương, Phường 3, Quận 5</td>
                                <td>sgu123@gmail.com</td>
                                <td><input type="checkbox" class="status-checkbox" id="status-checkbox-1" checked></td>
                                <td class="control control-table">
                                <button class="btn-edit" id="edit-account" onclick="editAccount()"><i class="fa-light fa-pen-to-square"></i></button>
                                <button class="btn-delete" id="delete-account" onclick="confirmDelete()"><i class="fa-regular fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Nguyễn Thị Bưởi</td>
                                <td>1234567890</td>
                                <td>273 An Dương Vương, Phường 3, Quận 5</td>
                                <td>sgu123@gmail.com</td>
                                <td><input type="checkbox" class="status-checkbox" id="status-checkbox-2"  checked></td>
                                <td class="control control-table">
                                <button class="btn-edit" id="edit-account" onclick="editAccount()"><i class="fa-light fa-pen-to-square"></i></button>
                                <button class="btn-delete" id="delete-account" onclick="confirmDelete()"><i class="fa-regular fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Nguyễn Văn Tèo</td>
                                <td>9874563210</td>
                                <td>273 An Dương Vương, Phường 3, Quận 5</td>
                                <td>sgu123@gmail.com</td>
                                <td><input type="checkbox" class="status-checkbox" id="status-checkbox-3"></td>
                                <td class="control control-table">
                                <button class="btn-edit" id="edit-account" onclick="editAccount()"><i class="fa-light fa-pen-to-square"></i></button>
                                <button class="btn-delete" id="delete-account" onclick="confirmDelete()"><i class="fa-regular fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Trần Văn B</td>
                                <td>1233214560</td>
                                <td>273 An Dương Vương, Phường 3, Quận 5</td>
                                <td>sgu123@gmail.com</td>
                                <td><input type="checkbox" class="status-checkbox" id="status-checkbox-4" checked></td>
                                <td class="control control-table">
                                <button class="btn-edit" id="edit-account" onclick="editAccount()"><i class="fa-light fa-pen-to-square"></i></button>
                                <button class="btn-delete" id="delete-account" onclick="confirmDelete()"><i class="fa-regular fa-trash"></i></button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div> 
            <div class="page-nav">
                <ul class="page-nav-list">
                    <li class="page-nav-item active">
                        <a href="customer.html">1</a>
                    </li>
                    <li class="page-nav-item">
                        <a href="customer2.html">2</a>
                    </li>
                    <li class="page-nav-item">
                        <a href="customer3.html">3</a>
                    </li>
                </ul>
            </div> 