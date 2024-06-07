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

    // Start a transaction
    $conn->begin_transaction();

    try {
        // Insert into buying table
        $insert_sql = "INSERT INTO buying (user_id, product_id, buy_date, status) VALUES (?, ?, NOW(), 'pending')";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("ii", $user_id, $product_id);

        if ($insert_stmt->execute()) {
            // Delete from products table
            $delete_sql = "DELETE FROM products WHERE product_id = ?";
            $delete_stmt = $conn->prepare($delete_sql);
            $delete_stmt->bind_param("i", $product_id);
            $delete_stmt->execute();

            // Commit transaction
            $conn->commit();

            echo "<script>alert('Purchase successful!'); window.location.href='buy_product.php';</script>";
        } else {
            // Rollback transaction
            $conn->rollback();
            echo "<script>alert('Error: Could not process purchase.'); window.location.href='buy_product.php';</script>";
        }

        $insert_stmt->close();
        $delete_stmt->close();
    } catch (Exception $e) {
        // Rollback transaction
        $conn->rollback();
        echo "<script>alert('Error: Could not process purchase.'); window.location.href='buy_product.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href='buy_product.php';</script>";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Product</title>
    <style>
body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            margin: 0 auto 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        input[type="file"] {
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
            background-color: #5cb85c;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ccc;
        }

        th {
            background-color: #f2f2f2;
        }

        .action-link {
            color: #d9534f;
            text-decoration: none;
        }

        .action-link:hover {
            text-decoration: underline;
        }
        .mwaisaka{
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Choose The Best Product</h2>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'config.php';
                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $count = 1;
                    while($row = $result->fetch_assoc()) {
                        $imagePath = 'photos/' . $row["product_image"];
                        echo '<tr>';
                        echo '<td>' . $count . '</td>';
                        echo '<td><img src="' . $imagePath . '" alt="product image" width="100"></td>';
                        echo '<td>' . $row["product_name"] . '</td>';
                        echo '<td>$' . $row["price"] . '</td>';
                        echo '<td><button onclick="buyProduct(' . $row["product_id"] . ')">Buy</button></td>';
                        echo '</tr>';
                        $count++;
                    }
                } else {
                    echo '<tr><td colspan="5">No products available.</td></tr>';
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function buyProduct(productId) {
            if (confirm('Are you sure you want to buy this product?')) {
                var form = document.createElement("form");
                form.method = "POST";
                form.action = "buy_product.php";

                var input = document.createElement("input");
                input.type = "hidden";
                input.name = "product_id";
                input.value = productId;

                form.appendChild(input);
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
</body>
</html>
