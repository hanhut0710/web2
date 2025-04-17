<?php
class User {
    private $id;
    private $fullname;
    private $phone;
    private $acc_id;  // ID của tài khoản (acc_id)
    // Constructor để khởi tạo đối tượng với các giá trị ban đầu
    public function __construct($id = null, $fullname = null, $phone = null, $acc_id = null) {
        $this->id = $id;
        $this->fullname = $fullname;
        $this->phone = $phone;
        $this->acc_id = $acc_id;
    }

    // Getter và setter cho thuộc tính id
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    // Getter và setter cho thuộc tính fullname
    public function getFullname() {
        return $this->fullname;
    }

    public function setFullname($fullname) {
        $this->fullname = $fullname;
    }

    // Getter và setter cho thuộc tính phone
    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    // Getter và setter cho thuộc tính acc_id (id của tài khoản)
    public function getAccId() {
        return $this->acc_id;
    }

    public function setAccId($acc_id) {
        $this->acc_id = $acc_id;
    }

    // Phương thức để lấy thông tin người dùng từ database dựa vào acc_id
    public function getUserInfo($acc_id, $con) {
        $stmt = $con->prepare("SELECT * FROM users WHERE acc_id = ?");
        $stmt->bind_param("i", $acc_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $this->setId($user['id']);
            $this->setFullname($user['full_name']);
            $this->setPhone($user['phone']);
            $this->setAccId($user['acc_id']);
            return true;
        }
        return false;
    }

    public static function addUser($full_name, $phone, $acc_id, $con) {
        // Kiểm tra xem các tham số có hợp lệ không
        if (empty($full_name) || empty($phone) || empty($acc_id)) {
            return false;
        }
    
        // Kiểm tra độ dài số điện thoại (giả sử bạn yêu cầu là 10 ký tự)
        if (strlen($phone) != 10) {
            return false;
        }
    
        // Thêm thông tin người dùng vào bảng users
        $stmt = $con->prepare("INSERT INTO users (full_name, phone, acc_id) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $full_name, $phone, $acc_id);  // s: string, i: integer
    
        if ($stmt->execute()) {
            $user_id = $stmt->insert_id;  // Lấy id người dùng đã chèn
            $user = new User();
            $user->setId($user_id);
            $user->setFullname($full_name);
            $user->setPhone($phone);
            $user->setAccId($acc_id);
            return $user;
        }
        return false;
    }
    
    // Phương thức cập nhật thông tin người dùng
    public function updateUserInfo($fullname, $phone, $acc_id, $con) {
        $stmt = $con->prepare("UPDATE users SET full_name = ?, phone = ? WHERE acc_id = ?");
        $stmt->bind_param("ssi", $fullname, $phone, $acc_id);
        if ($stmt->execute()) {
            $this->setFullname($fullname);
            $this->setPhone($phone);
            return true;
        }
        return false;
    }
}
?>
