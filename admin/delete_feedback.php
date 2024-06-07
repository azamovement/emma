<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['feedback_id'])) {
    $id = $_POST['feedback_id'];


    $sql = "DELETE FROM feedback WHERE feedback_id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            echo "<script>alert('Feedback deleted successfully.'); window.location.href='feedback.php';</script>";
        } else {
            echo "<script>alert('Error: Could not delete feedback.'); window.location.href='feedback.php';</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('Error: Could not prepare statement.'); window.location.href='feedback.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href='feedback.php';</script>";
}

$conn->close();
?>
