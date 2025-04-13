    <div id="notification" class="notification hidden">
        <i class="fa-solid"></i>
        <span id="notification-message"></span>
        <button id="notification-close" onclick="closeNotification()">×</button>
    </div>
    <script>
        // function loadHome(data){
        //     let homeHTML = "";
        //     homeHTML = `
        //         <h1 class="page-title">Trang quản lý cửa hàng</h1>
        //             <div class="cards">
        //                 <div class="card-single">
        //                     <div class="box">
        //                         <h2 id="amount-user">${data.home.customers}</h2>
        //                         <div class="on-box">
        //                             <img src="../assets/img/admin/s1.png" alt="" style=" width: 200px;">
        //                             <h3>Khách hàng</h3>
        //                             <p>Khách hàng mục tiêu là một nhóm đối tượng khách hàng trong phân khúc thị trường mục
        //                                 tiêu mà doanh nghiệp bạn đang hướng tới.</p>
        //                         </div>
        //                     </div>
        //                 </div>
        //                 <div class="card-single">
        //                     <div class="box">
        //                         <div class="on-box">
        //                             <img src="assets/img/admin/s2.png" alt="" style=" width: 200px;">
        //                             <h2 id="amount-product">${data.home.products}</h2>
        //                             <h3>Sản phẩm</h3>
        //                             <p>Sản phẩm là bất cứ cái gì có thể đưa vào thị trường để tạo sự chú ý, mua sắm, sử dụng
        //                                 hay tiêu dùng nhằm thỏa mãn một nhu cầu hay ước muốn. Nó có thể là những vật thể,
        //                                 dịch vụ, con người, địa điểm, tổ chức hoặc một ý tưởng. </p>
        //                         </div>
        //                     </div>
        //                 </div>
        //                 <div class="card-single">
        //                     <div class="box">
        //                         <h2 id="doanh-thu">${data.home.sale}₫</h2>
        //                         <div class="on-box">
        //                             <img src="assets/img/admin/s3.png" alt="" style=" width: 200px;">
        //                             <h3>Doanh thu</h3>
        //                             <p>Doanh thu của doanh nghiệp là toàn bộ số tiền sẽ thu được do tiêu thụ sản phẩm, cung
        //                                 cấp dịch vụ với sản lượng.</p>
        //                         </div>
        //                     </div>
        //                 </div>
        //             </div>`;
        //     document.querySelector('.section.active').innerHTML = homeHTML;
        // }

        // function loadProducts(data){
        //     let productHTML = "";
        //     productHTML = `
        //         <div class="admin-control">
        //             <div class="admin-control-left">
        //                 <select name="the-loai" id="the-loai" onchange="showProduct()">
        //                     <option>Tất cả</option>
        //                     <option>Cà phê</option>
        //                     <option>Trà trái cây</option>
        //                     <option>Trà sữa</option>
        //                     <option>Đá xay</option>
        //                     <option>Bánh ngọt</option>
        //                     <option>Đã xóa</option>
        //                 </select>
        //             </div>
        //             <div class="admin-control-center">
        //                 <form action="" class="form-search">
        //                     <span class="search-btn"><i class="fa-light fa-magnifying-glass"></i></span>
        //                     <input id="form-search-product" type="text" class="form-search-input" placeholder="Tìm kiếm tên món..." oninput="showProduct()">
        //                 </form>
        //             </div>
        //             <div class="admin-control-right">
        //                 <button class="btn-control-large" id="btn-cancel-product" onclick="cancelSearchProduct()"><i class="fa-light fa-rotate-right"></i> Làm mới</button>
        //                 <button class="btn-control-large" id="btn-add-product"><i class="fa-light fa-plus"></i> Thêm món mới</button>                  
        //             </div>
        //         </div>
        //         <div id="show-product"></div>
        //         <div class="page-nav">
        //             <ul class="page-nav-list">
        //             </ul>
        //         </div>      
        //     `;

        //     document.querySelector('.section.active').innerHTML = productHTML;
        //     let productsHTML = "";
        //     data.product.forEach(item => {
        //         productsHTML += `<div class="list">
        //             <div class="list-left">
        //                 <img src="../${item.img_src}" alt="">
        //                 <div class="list-info">
        //                     <h4>${item.product_name}</h4>
        //                     <p class="list-note">Bạc sỉu chính là "Ly sữa trắng kèm một chút cà phê". Thức uống này rất phù hợp những ai vừa muốn trải nghiệm chút vị đắng của cà phê vừa muốn thưởng thức vị ngọt béo ngậy từ sữa.</p>
        //                     <span class="list-category">${item.category_name}</span>
        //                 </div>
        //             </div>
        //             <div class="list-right">
        //                 <div class="list-price">
        //                     <span class="list-current-price">${item.price}₫</span>
        //                 </div>
        //                 <div class="list-control">
        //                     <div class="list-tool">
        //                         <button class="btn-edit" onclick="location.href='editProduct.html'"><i class="fa-light fa-pen-to-square"></i></button>
        //                         <button class="btn-delete" onclick="deleteProduct(this)"><i class="fa-regular fa-trash"></i></button>
        //                     </div>
        //                 </div>
        //             </div>
        //         </div>`
        //     });
        //     console.log(productsHTML);
        //     document.getElementById("show-product").innerHTML = productsHTML;

        // }

        // function loadCustomer(data){
        //     let customerHTML = "";
        //     customerHTML = `
        //         <div class="admin-control">
        //             <div class="admin-control-left">
        //                 <select name="tinh-trang-user" id="tinh-trang-user" onchange="showUser()">
        //                     <option value="2">Tất cả</option>
        //                     <option value="1">Hoạt động</option>
        //                     <option value="0">Bị khóa</option>
        //                 </select>
        //             </div>
        //             <div class="admin-control-center">
        //                 <form action="" class="form-search">
        //                     <span class="search-btn"><i class="fa-light fa-magnifying-glass"></i></span>
        //                     <input id="form-search-user" type="text" class="form-search-input" placeholder="Tìm kiếm khách hàng..." oninput="showUser()">
        //                 </form>
        //             </div>
        //             <div class="admin-control-right">
        //                 <form action="" class="fillter-date">
        //                     <div>
        //                         <label for="time-start">Từ</label>
        //                         <input type="date" class="form-control-date" id="time-start-user" onchange="showUser()">
        //                     </div>
        //                     <div>
        //                         <label for="time-end">Đến</label>
        //                         <input type="date" class="form-control-date" id="time-end-user" onchange="showUser()">
        //                     </div>
        //                 </form>      
        //                 <button class="btn-reset-order" onclick="cancelSearchUser()"><i class="fa-light fa-arrow-rotate-right"></i></button>     
        //                 <button id="btn-add-user" class="btn-control-large" onclick="openCreateAccount()"><i class="fa-light fa-plus"></i> <span>Thêm khách hàng</span></button>          
        //             </div>
        //         </div>
        //         <div class="table">
        //             <table width="100%">
        //                 <thead>
        //                     <tr>
        //                         <td>STT</td>
        //                         <td>Họ và tên</td>
        //                         <td>Liên hệ</td>
        //                         <td>Địa chỉ</td>
        //                         <td>Ngày tham gia</td>
        //                         <td>Tình trạng</td>
        //                         <td></td>
        //                     </tr>
        //                 </thead>
        //                 <tbody id="show-user">
        //                 </tbody>
        //             </table>
        //         </div>
        //     `;
        //     document.querySelector('.section.active').innerHTML = customerHTML;
        //     let customersHTML = "";
        //     data.customer.forEach(item => {
        //         customersHTML += `
        //             <tr>
        //                 <td>${item.id}</td>
        //                 <td>${item.full_name}</td>
        //                 <td>${item.phone}</td>
        //                 <td>273 An Dương Vương, Phường 3, Quận 5</td>
        //                 <td>sgu123@gmail.com</td>
        //                 <td><input type="checkbox" class="status-checkbox" id="status-checkbox-1" checked></td>
        //                 <td class="control control-table">
        //                 <button class="btn-edit" id="edit-account" onclick="editAccount()"><i class="fa-light fa-pen-to-square"></i></button>
        //                 <button class="btn-delete" id="delete-account" onclick="confirmDelete()"><i class="fa-regular fa-trash"></i></button>
        //                 </td>
        //             </tr>
        //         `;
        //     })
        //     document.getElementById('show-user').innerHTML =  customersHTML;
        // }

        // function loadOrder(data){
        //     let orderHTML = "";
        //     orderHTML = `
        //         <div class="admin-control">
        //             <div class="admin-control-left">
        //                 <select name="tinh-trang" id="tinh-trang" onchange="">
        //                     <option value="4">Tất cả</option>
        //                     <option value="1">Đã xử lý</option>
        //                     <option value="0">Chưa xử lý</option>
        //                     <option value="2">Đã giao hàng</option>
        //                     <option value="3">Đã hủy đơn</option>
        //                     <option value="5">Địa chỉ giao hàng theo quận </option>
        //                 </select>
        //             </div>
        //             <div class="admin-control-center">
        //                 <form action="" class="form-search">
        //                     <span class="search-btn"><i class="fa-light fa-magnifying-glass"></i></span>
        //                     <input id="form-search-order" type="text" class="form-search-input" placeholder="Tìm kiếm mã đơn, khách hàng..." oninput="findOrder()">
        //                 </form>
        //             </div>
        //             <div class="admin-control-right">
        //                 <form action="" class="fillter-date">
        //                     <div>
        //                         <label for="time-start">Từ</label>
        //                         <input type="date" class="form-control-date" id="time-start" onchange="findOrder()">
        //                     </div>
        //                     <div>
        //                         <label for="time-end">Đến</label>
        //                         <input type="date" class="form-control-date" id="time-end" onchange="findOrder()">
        //                     </div>
        //                 </form>      
        //                 <button class="btn-reset-order" onclick="cancelSearchOrder()"><i class="fa-light fa-arrow-rotate-right"></i></button>               
        //             </div>
        //         </div>
        //         <div class="table">
        //             <table width="100%">
        //                 <thead>
        //                     <tr>
        //                         <td>Mã đơn</td>
        //                         <td>Khách hàng</td>
        //                         <td>Địa chỉ</td>
        //                         <td>Ngày đặt</td>
        //                         <td>Tổng tiền</td>
        //                         <td>Trạng thái</td>
        //                         <td>Thao tác</td>
        //                     </tr>
        //                 </thead>
        //                 <tbody id="showOrder">
        //                 </tbody>
        //             </table>
        //         </div>
        //     `;

        //     document.querySelector('.section.active').innerHTML = orderHTML;
        //     let ordersHTML = "";
        //     data.order.forEach(item => {
        //         ordersHTML += `
        //             <tr>
        //                         <td>${item.id}</td>
        //                         <td>${item.full_name}</td>
        //                         <td>273 An Dương Vương, phường 3, quận 5, TPHCM</td>
        //                         <td>${item.created_at}</td>
        //                         <td>${item.total_price}₫</td>
        //                         <td>
        //                             <span class="status-no-complete">Chưa xử lý</span>
        //                         </td>
        //                         <td class="control">
        //                             <button class="btn-detail" id="" onclick="location.href='orderDetails.html'"><i
        //                                     class="fa-regular fa-eye"></i> Chi tiết</button>
        //                         </td>
        //                     </tr>
        //         `;
        //     });

        //     document.getElementById('showOrder').innerHTML = ordersHTML;

        // }
        // function loadStaff(data){
        //     let staffHTML = "";
        //     staffHTML = `
        //         <div class="admin-control">
        //             <div class="admin-control-left">
        //                 <select name="tim-kiem-nhan-vien" id="tim-kiem-nhan-vien" onchange="">
        //                     <option value="3">Tất cả</option>
        //                     <option value="2">Manager</option>
        //                     <option value="1">Admin</option>
        //                     <option value="0">Staff</option>
        //                 </select>
        //             </div>
        //             <div class="admin-control-center">
        //                 <form action="" class="form-search">
        //                     <span class="search-btn"><i class="fa-light fa-magnifying-glass"></i></span>
        //                     <input id="form-search-order" type="text" class="form-search-input" placeholder="Tìm kiếm mã nhân viên..." oninput="">
        //                 </form>
        //             </div>
        //              <button id="btn-add-user" class="btn-control-large" onclick="openCreateAccount()"><i class="fa-light fa-plus"></i> <span>Thêm nhân viên</span></button>
        //         </div>
        //         <div class="table">
        //             <table width="100%">
        //                 <thead>
        //                     <tr>
        //                         <td>Mã nhân viên</td>
        //                         <td>Tên nhân viên</td>
        //                         <td>Số điện thoại</td>
        //                         <td>Chức vụ</td>

        //                         <td>Thao tác</td>
        //                     </tr>
        //                 </thead>
        //                 <tbody id="showStaff">
        //                 </tbody>
        //             </table>
        //         </div>
        // //     `;
        // //     document.querySelector('.section.active').innerHTML = staffHTML;
        // //     let staffsHTML = "";
        // //     data.staff.forEach(item => {
        //         let role = (item.role == 2) ? "Manager" : (item.role == 1) ? "Admin" : staff;
        //         staffsHTML += `
        //              <tr>
        //                         <td>${item.id}</td>
        //                         <td>${item.full_name}</td>
        //                         <td>${item.phone}</td>
        //                         <td>${role}</td>
        //                         <td class="control control-table">
        //                         <button class="btn-edit" id="edit-account" onclick="editAccount()"><i class="fa-light fa-pen-to-square"></i></button>
        //                         <button class="btn-delete" id="delete-account" onclick="confirmDelete()"><i class="fa-regular fa-trash"></i></button>
        //                         </td>
        //                     </tr>                
        //         `;
        //     })
        //     document.getElementById('showStaff').innerHTML = staffsHTML;
        // }

        // document.addEventListener("DOMContentLoaded", function(){
        //     fetch("./backend/log.php?mode=home")
        //     .then(response => response.json())
        //     .then(data => {
        //         if(data.home){
        //             loadHome(data);
        //         }
        //     });
        // })
        // document.addEventListener("DOMContentLoaded", function(){
        //     document.querySelectorAll('.sidebar-list-item.tab-content').forEach(function(item){
        //         item.addEventListener('click', function(){
        //             event.preventDefault();
        //             let mode = this.getAttribute("data-mode");
        //             console.log(mode);

        //             if(mode){
        //                 fetch("./backend/log.php?mode=" + mode)
        //                 .then(response => response.json())
        //                 .then(data => {
        //                     switch(mode){
        //                         case 'home':
        //                             loadHome(data);
        //                             break;
        //                             case "":
        //                         case "product":
        //                             loadProducts(data);
        //                             break;
        //                         case "customer":
        //                             loadCustomer(data)
        //                             break;
        //                         case "order":
        //                             loadOrder(data);
        //                             break;
        //                         case "staff":
        //                             loadStaff(data);
        //                             break;
                                    

        //                     }
        //                 })
        //             }
        //         })
        //     })
        // })
        function showNotification(message, type) {
            const notification = document.getElementById('notification');
            const notificationMessage = document.getElementById('notification-message');
            const icon = notification.querySelector('i');

            if(type === 'success') {
                icon.className = 'fa-solid fa-check-circle';
            } else if (type === 'error') {
                icon.className = 'fa-solid fa-exclamation-circle';
            }

            notificationMessage.textContent = message;

            notification.classList.remove('hidden', 'error');
            if (type === 'error') {
                notification.classList.add('error');
            }

            notification.classList.remove('hidden');

            setTimeout(() => {
                notification.classList.add('hidden');
            }, 3000);
        }

        function closeNotification() {
            const notification = document.getElementById('notification');
            notification.classList.add('hidden');
        }

        let sidebar_tab = document.querySelectorAll(".sidebar-list-item.tab-content");
        sidebar_tab.forEach(item => {
            item.addEventListener('click', function() {
                
                sidebar_tab.forEach(tab => tab.classList.remove('active'))
                item.classList.add('active');
            })
        })

        
    </script>
</body>
</html>