<?php
session_start();
function isLogin() {
    if (!isset($_SESSION["user"])) {
        echo "<script>
                alert('Bạn cần đăng nhập trước!');
              </script>";
        exit();
    }
}
?>