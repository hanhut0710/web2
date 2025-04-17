<?php
class Address {
    private $id;
    private $user_id;
    private $address_line;
    private $ward;
    private $district;
    private $city;
    private $default;  // Mặc định 1 cho địa chỉ chính, 0 cho địa chỉ khác

    // Constructor để khởi tạo đối tượng với các giá trị ban đầu
    public function __construct($id = null, $user_id = null, $address_line = null, $ward = null, $district = null, $city = null, $default = 1) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->address_line = $address_line;
        $this->ward = $ward;
        $this->district = $district;
        $this->city = $city;
        $this->default = $default;
    }

    // Getter và setter cho thuộc tính id
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    // Getter và setter cho thuộc tính user_id
    public function getUserId() {
        return $this->user_id;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    // Getter và setter cho thuộc tính address_line
    public function getAddressLine() {
        return $this->address_line;
    }

    public function setAddressLine($address_line) {
        $this->address_line = $address_line;
    }

    // Getter và setter cho thuộc tính ward
    public function getWard() {
        return $this->ward;
    }

    public function setWard($ward) {
        $this->ward = $ward;
    }

    // Getter và setter cho thuộc tính district
    public function getDistrict() {
        return $this->district;
    }

    public function setDistrict($district) {
        $this->district = $district;
    }

    // Getter và setter cho thuộc tính city
    public function getCity() {
        return $this->city;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    // Getter và setter cho thuộc tính default
    public function getDefault() {
        return $this->default;
    }

    public function setDefault($default) {
        $this->default = $default;
    }

    // Phương thức để lấy thông tin địa chỉ từ cơ sở dữ liệu dựa trên user_id
    public function getAddressByUserId($user_id, $con) {
        $stmt = $con->prepare("SELECT * FROM address WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $address = $result->fetch_assoc();
            $this->setId($address['id']);
            $this->setUserId($address['user_id']);
            $this->setAddressLine($address['address_line']);
            $this->setWard($address['ward']);
            $this->setDistrict($address['district']);
            $this->setCity($address['city']);
            $this->setDefault($address['default']);
            return true;
        }
        return false;
    }

    // Phương thức để lưu địa chỉ mới vào cơ sở dữ liệu
    public function saveAddress($con) {
        $stmt = $con->prepare("INSERT INTO address (user_id, address_line, ward, district, city, `default`) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issssi", $this->user_id, $this->address_line, $this->ward, $this->district, $this->city, $this->default);
        if ($stmt->execute()) {
            $this->id = $stmt->insert_id;  // Lưu id của địa chỉ mới
            return true;
        }
        else {
            // Lấy thông tin lỗi khi query thất bại
            echo "Error: " . $stmt->error;
        }
        return false;
    }

    // Phương thức để cập nhật thông tin địa chỉ
    public function updateAddress($con) {
        $stmt = $con->prepare("UPDATE address SET address_line = ?, ward = ?, district = ?, city = ?, `default` = ? WHERE id = ?");
        $stmt->bind_param("ssssii", $this->address_line, $this->ward, $this->district, $this->city, $this->default, $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Phương thức để xóa địa chỉ
    public function deleteAddress($con) {
        $stmt = $con->prepare("DELETE FROM address WHERE id = ?");
        $stmt->bind_param("i", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
