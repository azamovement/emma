<?php
session_start();

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // admin logIn credentials or information
    $admin_email = 'emmanuel.davidy30@gmail.com'; // we should hush this email
    $admin_password = 'mwaisaka123'; // we should hush this password
    if ($email === $admin_email && $password === $admin_password) {
        $_SESSION['admin_id'] = 1;
        $_SESSION['admin_name'] = 'Admin';
        header('Location: admin_dashboard.php');
        exit();
    } else {
        $error_message = "Email or password is incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <link rel="stylesheet" href="../style.css">
  
</head>
<body>
  <form action="admin_login.php" method="POST">
    <?php
    if (!empty($error_message)) {
        echo '<div class="error-message">' . $error_message . '</div>';
    }
    ?>
    <label for="email">Email:</label><br />
    <input type="email" id="email" name="email" placeholder="Type your email" required /><br /><br />
    
    <label for="password">Password:</label><br />
    <input type="password" id="password" name="password" placeholder="Enter password" required /><br /><br />
    
    <input type="submit" name="submit" value="Login" />
  </form>
</body>
</html>
