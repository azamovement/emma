<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
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
        }

        h1 {
            text-align: center;
            color: #333;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
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
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: dodgerblue;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: blue;
        }
        .links {
            text-align: center;
            margin-top: 10px;
        }

        .links a {
            color: dodgerblue;
            text-decoration: none;
            display: block;
            margin: 5px 0;
        }

        .links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <form action="register.php" method="POST">
        <h1>Register</h1>
        <?php if (!empty($error_message)): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <label for="firs_tname">First Name</label>
        <input type="text" id="firstname" name="firstname" placeholder="Your first name" required />

        <label for="last_name">Last Name</label>
        <input type="text" id="lastname" name="lastname" placeholder="Your last name" required />

        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone" placeholder="Your phone number" required />

        <label for="address">Physical Address</label>
        <input type="text" id="address" name="address" placeholder="Your address" required />

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Your email" required />

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Create a password" required />

        <input type="submit" value="Register" />

        <div class="links">
            <a href="user_login.php">Already have an account? Login here</a>
        </div>
    </form>
</body>
</html>
