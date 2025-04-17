<?php
include(__DIR__ . '/connect.php');
function getCartItemCount() {
    global $con;

    if (session_status() == PHP_SESSION_NONE) session_start();

    $user_id = $_SESSION['user_id'] ?? $_SESSION['guest_id'] ?? null;
    if (!$user_id) return 0;

    $stmt = $con->prepare("SELECT SUM(quantity) AS total FROM cart WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    return $row['total'] ?? 0;
}
?>
