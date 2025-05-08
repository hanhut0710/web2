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
        $stmt = $con->prepare("SELECT * FROM accounts WHERE username = ? AND status = 1");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            // Kiểm tra mật khẩu
            if (password_verify($password, $user['password'])){
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
    public function register($username, $password, $fullname, $phone,$email, $con) {
        if (empty($username) || empty($password) || empty($fullname) || empty($phone) ||empty($email)) {
            return ['status' => 'error', 'message' => 'Vui lòng điền đầy đủ thông tin!'];
        }
        // Kiểm tra username đã tồn tại
        $stmt = $con->prepare("SELECT * FROM accounts WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $resultName = $stmt->get_result();
        if ($resultName->num_rows > 0) {
            return ['status' => 'error', 'message' => 'Tên đăng nhập đã tồn tại!'];
        }
        // Mã hóa mật khẩu
        $stmt = $con->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s" , $email);
        $stmt->execute();
        $resultEmail = $stmt->get_result();
        if($resultEmail->num_rows > 0) return ['status' => 'error','message' => 'Email đã tồn tại!'];

        $stmt = $con->prepare("SELECT * FROM users WHERE phone = ?");
        $stmt->bind_param("i", $phone);
        $stmt->execute();
        $resultPhone = $stmt->get_result();
        if($resultPhone->num_rows > 0) return ['status' => 'error', 'message' => 'Số điện thoại đã tồn tại!'];
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    
        // Thêm vào bảng accounts
        $stmt = $con->prepare("INSERT INTO accounts (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $hashedPassword);
    
        if ($stmt->execute()) {
            $account_id = $stmt->insert_id;
            // Thêm vào bảng users
            if (User::addUser($fullname, $phone, $email, $account_id, $con)) {
                return ['status' => 'success', 'message' => 'Đăng ký thành công!'];
            } else {
                return ['status' => 'error', 'message' => 'Lỗi khi lưu thông tin người dùng!'];
            }
        } else {
            return ['status' => 'error', 'message' => 'Lỗi khi đăng ký! Câu lệnh SQL không thành công.'];
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
