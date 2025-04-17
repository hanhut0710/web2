document.getElementById("changePasswordForm").addEventListener("submit", function(e) {
    e.preventDefault(); // Ngăn reload trang

    const formData = new FormData(this);

    fetch("/web2/handle/changePassword.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(result => {
        const responseText = result.trim();
        alert(responseText); // Hiển thị thông báo

        // Xử lý các trường hợp cụ thể
        if (responseText.includes("thành công")) {
            // Thành công → chuyển hướng
            window.location.href = "/web2/index.php";
        } else if (responseText.includes("Mật khẩu hiện tại không đúng")) {
            // Sai mật khẩu cũ
            console.warn("Sai mật khẩu cũ.");
        } else if (responseText.includes("Mật khẩu mới và xác nhận không khớp")) {
            // Nhập sai xác nhận mật khẩu
            console.warn("Mật khẩu mới không khớp.");
        } else if (responseText.includes("Thiếu dữ liệu")) {
            // Không gửi đủ thông tin
            console.warn("Bạn cần nhập đầy đủ thông tin.");
        } else {
            // Trường hợp khác (lỗi cập nhật, lỗi server, ...)
            console.warn("Có lỗi xảy ra.");
        }
    })
    .catch(error => {
        console.error("Lỗi fetch:", error);
        alert("Lỗi mạng hoặc máy chủ không phản hồi.");
    });
});