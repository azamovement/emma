<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['buying_id'])) {
    $buying_id = $_POST['buying_id'];

    $sql = "UPDATE buying SET status = 'approved' WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $buying_id);

    if ($stmt->execute()) {
        echo "<script>alert('Purchase approved successfully!'); window.location.href='admin_buying.php';</script>";
    } else {
        echo "<script>alert('Error: Could not approve purchase.'); window.location.href='admin_buying.php';</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('Invalid request.'); window.location.href='admin_buying.php';</script>";
}

$conn->close();
?>
