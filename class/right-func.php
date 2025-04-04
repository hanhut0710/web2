<?php 
class RightFunc {
    private $id;
    private $right_id;
    private $func_id;
    private $action;
    private $con;

    // Constructor để khởi tạo đối tượng
    public function __construct($id = null, $right_id = null, $func_id = null, $action = null, $con) {
        $this->id = $id;
        $this->right_id = $right_id;
        $this->func_id = $func_id;
        $this->action = $action;
        $this->con = $con; // Đây là đối tượng kết nối tới cơ sở dữ liệu
    }

    // Getter và Setter cho các thuộc tính
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getRightId() {
        return $this->right_id;
    }

    public function setRightId($right_id) {
        $this->right_id = $right_id;
    }

    public function getFuncId() {
        return $this->func_id;
    }

    public function setFuncId($func_id) {
        $this->func_id = $func_id;
    }

    public function getAction() {
        return $this->action;
    }

    public function setAction($action) {
        $this->action = $action;
    }

    // Phương thức để lưu quyền chức năng vào cơ sở dữ liệu
    public function save() {
        if ($this->id === null) {
            // Nếu không có id thì thực hiện INSERT
            $stmt = $this->con->prepare("INSERT INTO `right_func` (right_id, func_id, action) VALUES (?, ?, ?)");
            $stmt->bind_param("iis", $this->right_id, $this->func_id, $this->action);
            return $stmt->execute();
        } else {
            // Nếu có id thì thực hiện UPDATE
            $stmt = $this->con->prepare("UPDATE `right_func` SET right_id = ?, func_id = ?, action = ? WHERE id = ?");
            $stmt->bind_param("iisi", $this->right_id, $this->func_id, $this->action, $this->id);
            return $stmt->execute();
        }
    }

    // Phương thức để lấy quyền chức năng theo right_id
    public static function getByRightId($right_id, $con) {
        $stmt = $con->prepare("SELECT * FROM `right_func` WHERE right_id = ?");
        $stmt->bind_param("i", $right_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $rightFuncs = [];
        
        while ($row = $result->fetch_assoc()) {
            $rightFuncs[] = new RightFunc($row['id'], $row['right_id'], $row['func_id'], $row['action'], $con);
        }

        return $rightFuncs;
    }

    // Phương thức để xóa quyền chức năng
    public function delete() {
        if ($this->id !== null) {
            $stmt = $this->con->prepare("DELETE FROM `right_func` WHERE id = ?");
            $stmt->bind_param("i", $this->id);
            return $stmt->execute();
        }
        return false;
    }

    // Phương thức để lấy quyền chức năng theo func_id
    public static function getByFuncId($func_id, $con) {
        $stmt = $con->prepare("SELECT * FROM `right_func` WHERE func_id = ?");
        $stmt->bind_param("i", $func_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $rightFuncs = [];
        
        while ($row = $result->fetch_assoc()) {
            $rightFuncs[] = new RightFunc($row['id'], $row['right_id'], $row['func_id'], $row['action'], $con);
        }

        return $rightFuncs;
    }
}

?>