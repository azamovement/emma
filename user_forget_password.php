<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $confirm_email = $_POST['confirm_email'];

    if ($email !== $confirm_email) {
        echo "Emails do not match.";
    } else {
        $sql = "SELECT user_id FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($user_id);
            $stmt->fetch();

            $token = bin2hex(random_bytes(50));

            $sql = "INSERT INTO password_resets (user_id, token) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("is", $user_id, $token);
            $stmt->execute();
            $reset_link = "http://yourwebsite.com/user_reset_password.php?token=$token";
            $subject = "Password Reset Request";
            $message = "Click the following link to reset your password: $reset_link";
            $headers = "From: mu@brokers.com";

            mail($email, $subject, $message, $headers);
            echo "A password reset link has been sent to your email.";
        } else {
            echo "Email does not exist.";
        }
    }

    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forget Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input[type="email"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
    <script>
        function validateForm() {
            var email = document.getElementById('email').value;
            var confirmEmail = document.getElementById('confirm_email').value;
            if (email !== confirmEmail) {
                alert("Emails do not match.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <form action="user_forget_password.php" method="POST" onsubmit="return validateForm()">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"placehlder="enter your email" required>
        
        <label for="confirm_email">Confirm Email:</label>
        <input type="email" id="confirm_email" name="confirm_email" placehlder="confirm email" required>
        
        <input type="submit" value="Request New Password">
    </form>
</body>
</html>
