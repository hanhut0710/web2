document.addEventListener("DOMContentLoaded", function () {
    let btnCheckoout = document.getElementById("checkoutBtn");
    btnCheckoout.classList.add('disable-link');
    btnCheckoout.addEventListener("click" , function(event){
        event.preventDefault();

    })
    let product = [];
    function updateCartTotal(){
        const cartItems = document.querySelectorAll('tbody tr');
        let total = 0 ;
        cartItems.forEach(row =>{
            const priceText = row.querySelector('.cart__price').innerText;
            const price = parseInt(priceText.replace(/\D/g, ''));
            total += price;
        });
        const formattedTotal = total.toLocaleString() + ' đ';
        document.querySelector('.cart__total ul li:nth-child(1) span').innerText = formattedTotal;
        document.querySelector('.cart__total ul li:nth-child(2) span').innerText = formattedTotal;
    }
    function upadateCartPrice(row , newQuantity, price){
        const totalPrice = price * newQuantity;
        const totalCell = row.querySelector('.cart__price');
        totalCell.innerText =totalPrice.toLocaleString() + ' đ';
    }
    fetch('./handle/get_cart.php')
        .then(res => {
            if (!res.ok) {
                throw new Error(`HTTP error! status: ${res.status}`);
            }
            return res.json();
        })
        .then(data => {
            product = data.data;
            const cartBody = document.querySelector('tbody');
            cartBody.innerHTML = ''; // Xoá nội dung cũ
            if (data.status === 'success') {
                if (data.data.length === 0) {
                    // Nếu giỏ hàng trống
                    updateCartTotal();
                    cartBody.innerHTML = `
                        <tr>
                            <td colspan="4" style="text-align: center; padding: 40px 0;">
                                <img src="img/icon/empty-cart-svgrepo-com.svg" alt="Giỏ hàng trống" width="200">
                                <p style="margin-top: 10px; font-size: 18px;">Giỏ hàng của bạn đang trống</p>
                            </td>
                        </tr>`;
                        btnCheckoout.addEventListener("click", function(event){
                            event.preventDefault();
                            alert("Giỏ hàng không có sản phẩm");
                        })
                    return;
                    
                }
                
                // Nếu có sản phẩm
                data.data.forEach(item => {
                    btnCheckoout.classList.remove('disable-link');
                    btnCheckoout.addEventListener("click", function(event){
                        event.preventDefault();
                        location.href ="./checkout.php";
                    });
                    console.log(item );
                    const total = item.price * item.quantity;
                    cartBody.innerHTML += `
                    <tr>
                        <td class="product__cart__item">
                            <div class="product__cart__item__pic">
                                <img src="${item.img_src}" alt="" width ="150px">
                            </div>
                            <div class="product__cart__item__text">
                                <h6>${item.product_name}</h6>
                                <h5>Color: ${item.color}</h5>
                            </div>
                        </td>
                        <td class="quantity__item">
                            <div class="quantity">
                                <div class="pro-qty-2">
                                    <span class="arrow left-arrow"></span>
                                    <input type="text" value="${item.quantity}">
                                    <span class="arrow right-arrow"></span>
                                </div>
                            </div>
                        </td>
                        <td class="cart__price">${parseInt(total).toLocaleString()} đ</td>
                        <td class="cart__close"><i class="fa fa-close" data-id=${item.id}></i></td>
                    </tr>`;
                });
                document.querySelectorAll('.pro-qty-2').forEach(qtyBox => {
                    const input = qtyBox.querySelector('input');
                    const decBtn = qtyBox.querySelector('.arrow.left-arrow'); // <- Sửa ở đây
                    console.log( "decBTN: "+decBtn)
                    const updateDecVisibility = () => {
                        if (parseInt(input.value) <= 1) {
                            decBtn.style.display = 'none';
                        } else {
                            decBtn.style.display = 'inline-block';
                        }
                    };
                    updateDecVisibility();
                    qtyBox.querySelectorAll('.arrow').forEach(btn => {
                        btn.addEventListener('click', () => {
                            let currentVal = parseInt(input.value);
                            if (btn.classList.contains('right-arrow')) {
                                input.value = currentVal + 1;
                            } else if (btn.classList.contains('left-arrow') && currentVal > 1) {
                                input.value = currentVal - 1;
                            }
                            updateDecVisibility();
                            const cartItemId = btn.closest('tr').querySelector('.cart__close i').dataset.id;
                                const newQuantity = parseInt(input.value);
                                fetch('./handle/cart_update_quantity.php', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                    },
                                    body: JSON.stringify({
                                        id: cartItemId,
                                        quantity: newQuantity
                                    })
                                })
                                .then(res => res.json())
                                .then(response => {
                                    if (response.status === 'success') {
                                        console.log('Cập nhật số lượng thành công');
                                        const findProduct = product.find(item => item.id == cartItemId);
                                        console.log( " findProduct: " + findProduct);
                                        const price = findProduct.price;
                                        const row = btn.closest('tr');
                                        upadateCartPrice(row , newQuantity, price);
                                        updateCartTotal();
                                    } else {
                                        alert(response.message || 'Cập nhật số lượng thất bại');
                                    }
                                })
                                .catch(err => {
                                    console.error('Lỗi cập nhật số lượng:', err);
                                });

                        });
                    });
                });
                document.querySelectorAll('.cart__close i').forEach(closeBtn => {
                    closeBtn.addEventListener('click', () => {
                        const isConfirmed = confirm("Bạn có chắc chắn muốn xoá sản phẩm này khỏi giỏ hàng không?");
                        if (isConfirmed) {
                            // Tìm hàng (tr) chứa nút đó và xóa nó khỏi giao diện (hoặc gọi API xóa)
                            const row = closeBtn.closest('tr');
                            const cartItemId = closeBtn.dataset.id; // Lấy ID từ thuộc tính data-id
                            fetch(`./handle/cart_del_product.php?id=${cartItemId}`, {
                                method: "POST"
                            })
                            .then(res => res.json())
                            .then(response => {
                                if (response.status === 'success') {
                                    row.remove();
                                    updateCartTotal();
                                    location.reload();
                                    console.log("Đã xoá sản phẩm khỏi giỏ hàng");
                                } else {
                                    alert(response.message || "Xoá sản phẩm thất bại");
                                }
                            })
                            .catch(err => {
                                console.error("Lỗi khi gọi API xoá:", err);
                            });                
                        }
                    });
                });
                updateCartTotal();
            } else {
                alert(data.message || 'Có lỗi xảy ra khi lấy giỏ hàng.');
            }
        })
        .catch(err => {
            console.error('Lỗi fetch giỏ hàng:', err);
        });
});
