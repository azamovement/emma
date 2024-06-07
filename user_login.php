<?php
include 'config.php';
session_start();

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT user_id, first_name, last_name, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $firstname, $lastname, $hashed_password);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['user_name'] = $firstname . ' ' . $lastname;
            header('Location: user_dashboard.php');
            exit();
        } else {
            $error_message = "Email or password is incorrect.";
        }
    } else {
        $error_message = "Email or password is incorrect.";
    }

    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        color: white;
        text-align: center;
    }

    h1 {
        color: #007bff;
        font-weight: bolder;
        text-align: center;
    }
    form {
        background-color: rgba(255, 255, 255, 0.6);
        padding: 20px;
        border-radius: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
        margin: 0 auto;
    }
    .error-message {
        color: red;
        margin-bottom: 15px;
        text-align: center;
    }
    label {
        display: block;
        margin-bottom: 5px;
        color: black;
        font-weight: bold;
        font-size: large;
    }

    input[type="email"],
    input[type="password"],
    input[type="text"],
    input[type="tel"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 10px;
        box-sizing: border-box;
        font-size: large;
        text-align: center;
    }

    input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        border: none;
        border-radius: 10px;
        color: #fff;
        font-size: large;
        font-weight: bold;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }
    .links {
        text-align: center;
        margin-top: 20px;
    }

    .links a {
        color: #007bff;
        text-decoration: none;
        display: block;
        margin-top: 10px;
        font-size: medium;
    }

    .links a:hover {
        text-decoration: underline;
    }
  </style>
</head>
<body>
  <form action="user_login.php" method="POST">
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
    
    <div class="links">
        <a href="user_register.php">Don't have an account? Create account</a>
        <a href="user_forget_password.php">Forget password?</a>
    </div>
  </form>
</body>
</html>
