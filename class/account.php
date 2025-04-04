<?php
class Account {
    private $id;
    private $username;
    private $password;
    // Constructor để khởi tạo đối tượng với các giá trị ban đầu
    public function __construct($id = null, $username = null, $password = null) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }
    // Getter và setter cho thuộc tính id
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    // Getter và setter cho thuộc tính username
    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    // Getter và setter cho thuộc tính password
    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    // Phương thức đăng nhập (kiểm tra username và password)
    public function login($username, $password, $con) {
        // Truy vấn cơ sở dữ liệu để tìm tài khoản với username tương ứng
        $stmt = $con->prepare("SELECT * FROM accounts WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            // Kiểm tra mật khẩu
            if ($password == $user['password']) {
                // Đặt giá trị cho thuộc tính id, username và password khi đăng nhập thành công
                $this->setId($user['id']);
                $this->setUsername($user['username']);
                $this->setPassword($user['password']);
                return true;
            }
        }
        return false;
    }
    // Phương thức đăng ký
    public function register($username, $password, $con) {
        // Kiểm tra username đã tồn tại chưa
        $stmt = $con->prepare("SELECT * FROM accounts WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return "Tên đăng nhập đã tồn tại!";
        } else {
            // Mã hóa mật khẩu
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            // Lưu tài khoản vào cơ sở dữ liệu
            $stmt = $con->prepare("INSERT INTO accounts (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $hashedPassword);

            if ($stmt->execute()) {
                return "Đăng ký thành công!";
            } else {
                return "Lỗi khi đăng ký!";
            }
        }
    }

    // Đăng xuất: Xóa session
    public function logout() {
        session_start();
        session_destroy();
        return "Đăng xuất thành công!";
    }
}
?>
