<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý cửa hàng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #ffffff; /* Đổi nền ngoài khung đăng nhập thành màu trắng */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            position: relative;
        }

        /* Logo fixed ở góc trái */
        .logo {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%); /* Căn giữa logo */
            z-index: 9999; /* Đảm bảo logo luôn nằm trên các phần tử khác */
        }

        .logo img {
            width: 150px;
        }

        .login-container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
            z-index: 1; /* Đảm bảo form đăng nhập nằm trên nền */
        }

        .login-container h2 {
            margin-bottom: 20px;
            color: #333;
            font-size: 24px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            color: #333;
            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            color: #333;
        }

        .form-group input:focus {
            border-color: #ff6445;
            outline: none;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            background-color: #dd9803;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-login:hover {
            background-color: hsl(20, 95%, 42%);
        }

        .login-footer {
            margin-top: 20px;
            font-size: 14px;
        }

        .login-footer a {
            color: #dd9803;
            text-decoration: none;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <!-- Logo -->
    <div class="logo">
        <img src="../images/logo.png" alt="Admin Logo">
    </div>

    <div class="login-container">
        <h2>Quản lý cửa hàng</h2>

        <!-- Login Form -->
        <form action="../admin/admin.html">
            <div class="form-group">
                <label for="username">Tên đăng nhập</label>
                <input type="text" id="username" name="username" placeholder="Nhập tên đăng nhập" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
            </div>
            <button type="submit" class="btn-login">Đăng Nhập</button>
        </form>
        <div class="login-footer">
            <p><a href="../index.html">Quay về trang chủ</a></p>
        </div>
    </div>

</body>

</html>
