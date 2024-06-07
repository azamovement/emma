<?php
include 'config.php';

$user_id = $firstname = $lastname = $phone = $address = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $email = $_POST['email'];

    $sql = "UPDATE users SET first_name=?, last_name=?, phone_number=?, address=?, email=? WHERE user_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $firstname, $lastname, $phone, $address, $email, $id);

    if ($stmt->execute()) {
        header('Location: admin_dashboard.php');
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE user_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $firstname = $row['first_name'];
        $lastname = $row['last_name'];
        $phone = $row['phone_number'];
        $address = $row['address'];
        $email = $row['email'];
    } else {
        echo "User not found.";
        exit();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        input[type="email"] {
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
            color: black;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: blue;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Update User Information</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="firstname">First Name</label>
            <input type="text" id="firstname" name="firstname" value="<?php echo $firstname; ?>" required />

            <label for="lastname">Last Name</label>
            <input type="text" id="lastname" name="lastname" value="<?php echo $lastname; ?>" required />

            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" value="<?php echo $phone; ?>" required />

            <label for="address">Address</label>
            <input type="text" id="address" name="address" value="<?php echo $address; ?>" required />

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required />

            <input type="submit" value="Update">
        </form>
    </div>
</body>
</html>
