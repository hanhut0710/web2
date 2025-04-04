<?php
class Cart {
    private $id;
    private $user_id;
    private $product_id;
    private $quantity;

    // Constructor để khởi tạo đối tượng với các giá trị ban đầu
    public function __construct($id = null, $user_id = null, $product_id = null, $quantity = 0) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
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

    // Getter và setter cho thuộc tính product_id
    public function getProductId() {
        return $this->product_id;
    }

    public function setProductId($product_id) {
        $this->product_id = $product_id;
    }

    // Getter và setter cho thuộc tính quantity
    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    // Phương thức để lấy giỏ hàng của người dùng từ cơ sở dữ liệu
    public function getCartByUserId($user_id, $con) {
        $stmt = $con->prepare("SELECT * FROM cart WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        $cartItems = [];
        while ($row = $result->fetch_assoc()) {
            $cartItems[] = $row;
        }

        return $cartItems;
    }

    // Phương thức để thêm sản phẩm vào giỏ hàng
    public function addProductToCart($con) {
        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
        $stmt = $con->prepare("SELECT * FROM cart WHERE user_id = ? AND product_id = ?");
        $stmt->bind_param("ii", $this->user_id, $this->product_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Nếu sản phẩm đã có trong giỏ, cập nhật số lượng
            $stmt = $con->prepare("UPDATE cart SET quanlity = quanlity + ? WHERE user_id = ? AND product_id = ?");
            $stmt->bind_param("iii", $this->quantity, $this->user_id, $this->product_id);
            $stmt->execute();
        } else {
            // Nếu sản phẩm chưa có trong giỏ, thêm mới
            $stmt = $con->prepare("INSERT INTO cart (user_id, product_id, quanlity) VALUES (?, ?, ?)");
            $stmt->bind_param("iii", $this->user_id, $this->product_id, $this->quantity);
            $stmt->execute();
        }
    }

    // Phương thức để cập nhật số lượng sản phẩm trong giỏ hàng
    public function updateProductQuantity($con) {
        $stmt = $con->prepare("UPDATE cart SET quanlity = ? WHERE user_id = ? AND product_id = ?");
        $stmt->bind_param("iii", $this->quantity, $this->user_id, $this->product_id);
        return $stmt->execute();
    }

    // Phương thức để xóa sản phẩm khỏi giỏ hàng
    public function removeProductFromCart($con) {
        $stmt = $con->prepare("DELETE FROM cart WHERE user_id = ? AND product_id = ?");
        $stmt->bind_param("ii", $this->user_id, $this->product_id);
        return $stmt->execute();
    }

    // Phương thức để xóa tất cả sản phẩm trong giỏ hàng
    public function clearCart($con) {
        $stmt = $con->prepare("DELETE FROM cart WHERE user_id = ?");
        $stmt->bind_param("i", $this->user_id);
        return $stmt->execute();
    }
}
?>
