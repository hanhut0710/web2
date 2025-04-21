document.addEventListener("DOMContentLoaded", function () {
    fetchOrders();

    const tabNavItems = document.querySelectorAll(".custom-tab-nav-item");
    const tabContents = document.querySelectorAll(".custom-tab-content-item");

    tabNavItems.forEach(item => {
        item.addEventListener("click", function (e) {
            e.preventDefault();

            tabNavItems.forEach(nav => nav.classList.remove("custom-tab-nav-item--active"));
            tabContents.forEach(content => content.classList.remove("custom-tab-content-item--active"));

            item.classList.add("custom-tab-nav-item--active");
            const targetId = item.getAttribute("data-target");
            const targetContent = document.querySelector(targetId);
            if (targetContent) {
                targetContent.classList.add("custom-tab-content-item--active");
            }
        });
    });
});

function fetchOrders() {
    fetch('./handle/get_order.php')
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                renderOrders(data.data);
            } else {
                console.error('Lỗi khi lấy đơn hàng:', data.message);
            }
        })
        .catch(error => console.error('Fetch error:', error));
}

function renderOrders(orders) {
    const tabContainers = {
        all: document.getElementById("order-tab-all"),
        pendingConfirm: document.getElementById("order-tab-pending-confirm"),
        pendingPick: document.getElementById("order-tab-pending-pick"),
        process: document.getElementById("order-tab-process"),
        done: document.getElementById("order-tab-done"),
        cancel: document.getElementById("order-tab-cancel")
    };

    for (const tab in tabContainers) {
        tabContainers[tab].innerHTML = "";
    }

    if (orders.length === 0) {
        for (const tab in tabContainers) {
            tabContainers[tab].innerHTML = `
                <div class="no-orders">
                    <div class="no-orders-thumb"></div>
                    <div class="no-orders-title">Chưa có đơn hàng</div>
                </div>`;
        }
        return;
    }

    orders.forEach(order => {
        const firstProduct = order.details[0];
        const orderHTML = `
            <div class="order-wrapper">
                <div class="order-card compact">
                    <div class="order-product-info">
                        <img src="${firstProduct.img_src}" alt="${firstProduct.name}" class="order-product-thumb">
                        <div class="order-product-details">
                            <div class="order-product-name">${firstProduct.name}</div>
                            <div class="order-product-color">Màu: ${firstProduct.color}</div>
                        </div>
                    </div>
                    <div class="order-summary">
                        <strong>Tổng tiền:</strong> ${order.total_price.toLocaleString()} đ
                    </div>
                </div>
            </div>
        `;
        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = orderHTML;
        const orderWrapper = tempDiv.querySelector('.order-wrapper');
        const card = orderWrapper.querySelector('.order-card');

        card.addEventListener('click', () => {
            localStorage.setItem('order_detail', JSON.stringify(order));
            window.location.href = `order_detail.php`;
        });
        tabContainers.all.appendChild(orderWrapper);

        const status = order.status.toLowerCase();
        if (status.includes("chờ xác nhận")) {
            tabContainers.pendingConfirm.appendChild(orderWrapper.cloneNode(true));
        } else if (status.includes("chờ lấy")) {
            tabContainers.pendingPick.appendChild(orderWrapper.cloneNode(true));
        } else if (status.includes("đang giao")) {
            tabContainers.process.appendChild(orderWrapper.cloneNode(true));
        } else if (status.includes("đã giao")) {
            tabContainers.done.appendChild(orderWrapper.cloneNode(true));
        } else if (status.includes("hủy") || status.includes("đã hủy")) {
            tabContainers.cancel.appendChild(orderWrapper.cloneNode(true));
        }
    });

    for (const tab in tabContainers) {
        if (tabContainers[tab].innerHTML.trim() === "") {
            tabContainers[tab].innerHTML = `
                <div class="no-orders">
                    <div class="no-orders-thumb"></div>
                    <div class="no-orders-title">Chưa có đơn hàng</div>
                </div>`;
        }
    }
}
