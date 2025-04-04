<?php

class Right {
    private $id;
    private $right_name;
    private $acc_id;
    private $con;

    // Constructor để khởi tạo đối tượng
    public function __construct($id = null, $right_name = null, $acc_id = null, $con) {
        $this->id = $id;
        $this->right_name = $right_name;
        $this->acc_id = $acc_id;
        $this->con = $con; // Đây là đối tượng kết nối tới cơ sở dữ liệu
    }

    // Getter và Setter cho các thuộc tính
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getRightName() {
        return $this->right_name;
    }

    public function setRightName($right_name) {
        $this->right_name = $right_name;
    }

    public function getAccId() {
        return $this->acc_id;
    }

    public function setAccId($acc_id) {
        $this->acc_id = $acc_id;
    }

    // Phương thức để lưu quyền vào cơ sở dữ liệu
    public function save() {
        if ($this->id === null) {
            // Nếu không có id thì thực hiện INSERT
            $stmt = $this->con->prepare("INSERT INTO `right` (right_name, acc_id) VALUES (?, ?)");
            $stmt->bind_param("si", $this->right_name, $this->acc_id);
            return $stmt->execute();
        } else {
            // Nếu có id thì thực hiện UPDATE
            $stmt = $this->con->prepare("UPDATE `right` SET right_name = ?, acc_id = ? WHERE id = ?");
            $stmt->bind_param("sii", $this->right_name, $this->acc_id, $this->id);
            return $stmt->execute();
        }
    }

    // Phương thức để lấy quyền của một tài khoản
    public static function getByAccId($acc_id, $con) {
        $stmt = $con->prepare("SELECT * FROM `right` WHERE acc_id = ?");
        $stmt->bind_param("i", $acc_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $rights = [];
        
        while ($row = $result->fetch_assoc()) {
            $rights[] = new Right($row['id'], $row['right_name'], $row['acc_id'], $con);
        }

        return $rights;
    }

    // Phương thức để xóa quyền của tài khoản
    public function delete() {
        if ($this->id !== null) {
            $stmt = $this->con->prepare("DELETE FROM `right` WHERE id = ?");
            $stmt->bind_param("i", $this->id);
            return $stmt->execute();
        }
        return false;
    }
}

?>