const order = JSON.parse(localStorage.getItem('order_detail'));

function renderOrderDetail(order) {
    if (!order) {
        document.getElementById("order-detail-view").innerHTML = "<p>Không tìm thấy thông tin đơn hàng.</p>";
        return;
    }
    let html = `
        <div class="mb-3"><strong>Mã đơn:</strong> ${order.id}</div>
        <div class="mb-3"><strong>Ngày tạo:</strong> ${order.created_at}</div>
        <div class="mb-3"><strong>Người nhận:</strong> ${order.name}</div>
        <div class="mb-3"><strong>Địa chỉ:</strong> ${order.address}</div>
        <div class="mb-3"><strong>SĐT:</strong> ${order.phone}</div>
        <div class="mb-3"><strong>Email:</strong> ${order.email}</div>
        <div class="mb-3"><strong>Phương thức thanh toán:</strong> ${order.pay_method === 'cash' ? 'Tiền mặt' : order.pay_method}</div>
        <div class="mb-3"><strong>Trạng thái:</strong> ${order.status}</div>
        <hr>
        <h5 class="mt-4">Danh sách sản phẩm</h5>
        <ul class="list-group mb-3">
            ${order.details.map(detail => `
                <li class="list-group-item d-flex align-items-center">
                    <img src="${detail.img_src}" alt="${detail.name}" style="width: 60px; height: 60px; object-fit: cover; margin-right: 15px;">
                    <div>
                        <div><strong>${detail.name}</strong></div>
                        <div>Màu: ${detail.color} | Size: ${detail.size} | SL: ${detail.quanlity}</div>
                        <div>Giá: ${detail.price.toLocaleString()} đ</div>
                    </div>
                </li>
            `).join("")}
        </ul>
        <div class="text-end"><strong>Tổng tiền:</strong> ${order.total_price.toLocaleString()} đ</div>
    `;

    document.getElementById("order-detail-view").innerHTML = html;
}

renderOrderDetail(order);

