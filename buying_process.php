<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: user_login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    $user_id = $_SESSION['user_id'];
    $product_id = $_POST['product_id'];

    $sql = "INSERT INTO buying (user_id, product_id, buy_date) VALUES (?, ?, NOW())";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ii", $user_id, $product_id);

        if ($stmt->execute()) {
            echo "<script>alert('Purchase successful!'); window.location.href='purchases.php';</script>";
        } else {
            echo "<script>alert('Error: Could not process purchase.'); window.location.href='buy_product.php';</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Error: Could not prepare statement.'); window.location.href='buy_product.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href='buy_product.php';</script>";
}

$conn->close();
?>

