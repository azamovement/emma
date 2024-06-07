<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
    }
    
    th {
        background-color: #007bff;
        color: white;
        text-align: left;
    }
    </style>
</head>
<body>
    
</body>
</html>
<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: user_login.php');
    exit();
}
$user_id = $_SESSION['user_id'];
$sql = "SELECT first_name, last_name, phone_number, address, email FROM users WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($firstname, $lastname, $phone, $address, $email);
$stmt->fetch();
$stmt->close();
$conn->close();
?>

<h2>My Profile</h2>
<table>
  <tr>
    <th>First Name</th>
    <td><?php echo htmlspecialchars($firstname); ?></td>
  </tr>
  <tr>
    <th>Last Name</th>
    <td><?php echo htmlspecialchars($lastname); ?></td>
  </tr>
  <tr>
    <th>Phone</th>
    <td><?php echo htmlspecialchars($phone); ?></td>
  </tr>
  <tr>
    <th>Address</th>
    <td><?php echo htmlspecialchars($address); ?></td>
  </tr>
  <tr>
    <th>Email</th>
    <td><?php echo htmlspecialchars($email); ?></td>
  </tr>
</table>
