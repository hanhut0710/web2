<?php
class FunctionModel {
    private $con;
    private $func_name;
    // Constructor nhận kết nối cơ sở dữ liệu
    public function __construct($db_connection) {
        $this->con = $db_connection;
    }

    // Thêm mới một chức năng
    public function create($func_name) {
        // Chuẩn bị câu lệnh SQL
        $stmt = $this->con->prepare("INSERT INTO `functions` (func_name) VALUES (?)");
        $stmt->bind_param("s", $func_name);
        // Thực thi câu lệnh
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Lấy chức năng theo id
    public function getById($id) {
        $stmt = $this->con->prepare("SELECT * FROM `functions` WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Cập nhật chức năng
    public function update($id, $func_name) {
        $stmt = $this->con->prepare("UPDATE `functions` SET func_name = ? WHERE id = ?");
        $stmt->bind_param("si", $func_name, $id);

        // Thực thi câu lệnh
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Xóa chức năng
    public function delete($id) {
        $stmt = $this->con->prepare("DELETE FROM `functions` WHERE id = ?");
        $stmt->bind_param("i", $id);
        // Thực thi câu lệnh
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // Lấy tất cả các chức năng
    public function getAll() {
        $stmt = $this->con->prepare("SELECT * FROM `functions`");
        $stmt->execute();

        $result = $stmt->get_result();
        $data = array();

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
}
?>
