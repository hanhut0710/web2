document.addEventListener("DOMContentLoaded", function () {
    fetch('./handle/get_cart.php')
        .then(res => {
            if (!res.ok) {
                throw new Error(`HTTP error! status: ${res.status}`);
            }
            return res.json();
        })
        .then(data => {
            const cartBody = document.querySelector('tbody');
            cartBody.innerHTML = ''; // Xoá nội dung cũ

            if (data.status === 'success') {
                if (data.data.length === 0) {
                    // Nếu giỏ hàng trống
                    cartBody.innerHTML = `
                        <tr>
                            <td colspan="4" style="text-align: center; padding: 40px 0;">
                                <img src="img/icon/empty-cart-svgrepo-com.svg" alt="Giỏ hàng trống" width="200">
                                <p style="margin-top: 10px; font-size: 18px;">Giỏ hàng của bạn đang trống</p>
                            </td>
                        </tr>`;
                    return;
                }

                // Nếu có sản phẩm
                data.data.forEach(item => {
                    const total = item.price * item.quanlity;

                    cartBody.innerHTML += `
                    <tr>
                        <td class="product__cart__item">
                            <div class="product__cart__item__pic">
                                <img src="${item.image}" alt="" width="70">
                            </div>
                            <div class="product__cart__item__text">
                                <h6>${item.product_name}</h6>
                                <h5>${parseInt(item.price).toLocaleString()} đ</h5>
                            </div>
                        </td>
                        <td class="quantity__item">
                            <div class="quantity">
                                <div class="pro-qty-2">
                                    <input type="text" value="${item.quanlity}">
                                </div>
                            </div>
                        </td>
                        <td class="cart__price">${parseInt(total).toLocaleString()} đ</td>
                        <td class="cart__close"><i class="fa fa-close"></i></td>
                    </tr>`;
                });
            } else {
                alert(data.message || 'Có lỗi xảy ra khi lấy giỏ hàng.');
            }
        })
        .catch(err => {
            console.error('Lỗi fetch giỏ hàng:', err);
        });
});
