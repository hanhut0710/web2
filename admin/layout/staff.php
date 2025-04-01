<div class="admin-control">
                    <div class="admin-control-left">
                        <select name="tim-kiem-nhan-vien" id="tim-kiem-nhan-vien" onchange="">
                            <option value="3">Tất cả</option>
                            <option value="2">Manager</option>
                            <option value="1">Admin</option>
                            <option value="0">Staff</option>
                        </select>
                    </div>
                    <div class="admin-control-center">
                        <form action="" class="form-search">
                            <span class="search-btn"><i class="fa-light fa-magnifying-glass"></i></span>
                            <input id="form-search-order" type="text" class="form-search-input" placeholder="Tìm kiếm mã nhân viên..." oninput="">
                        </form>
                    </div>
                     <button id="btn-add-user" class="btn-control-large" onclick="openCreateAccount()"><i class="fa-light fa-plus"></i> <span>Thêm nhân viên</span></button>
                </div>
                <div class="table">
                    <table width="100%">
                        <thead>
                            <tr>
                                <td>Mã nhân viên</td>
                                <td>Tên nhân viên</td>
                                <td>Số điện thoại</td>
                                <td>Chức vụ</td>

                                <td>Thao tác</td>
                            </tr>
                        </thead>
                        <tbody id="showStaff">
                        </tbody>
                    </table>
                </div>