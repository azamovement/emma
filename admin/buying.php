<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buying</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: dodgerblue;
            color: white;
        }

        .action-buttons {
            display: flex;
            justify-content: space-around;
        }

        .approve-button, .delete-button {
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        .approve-button {
            background-color: green;
            color: white;
        }

        .delete-button {
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>
    <h2>Buying</h2>
    <table border="1">
        <thead>
            <tr>
                <th>no</th>
                <th>Full Name</th>
                <th>Product Name</th>
                <th>Product Image</th>
                <th>Buy Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'config.php';
            $sql = "SELECT b.buying_id, u.user_id, u.first_name, u.last_name, p.product_name, p.product_image, b.buy_date, b.status 
        FROM buying b 
        JOIN users u ON b.user_id = u.user_id 
        JOIN products p ON b.product_id = p.product_id";

    

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $serial_number = 1;
                while ($row = $result->fetch_assoc()) {
                    $imagePath = 'photos/' . $row["product_image"];
                    echo "<tr>
                            <td>$serial_number</td>
                            <td>{$row['first_name']} {$row['last_name']}</td>
                            <td>{$row['product_name']}</td>
                            <td><img src='$imagePath' alt='product image' width='100'></td>
                            <td>{$row['buy_date']}</td>
                            <td>{$row['status']}</td>
                            <td class='action-buttons'>
                                <form method='POST' action='admin_approve_buying.php' style='display:inline-block;'>
                                    <input type='hidden' name='buying_id' value='{$row['buying_id']}'>
                                    <button type='submit' class='approve-button'>Approve</button>
                                </form>
                                <form method='POST' action='admin_delete_buying.php' style='display:inline-block;'>
                                    <input type='hidden' name='buying_id' value='{$row['buying_id']}'>
                                    <button type='submit' class='delete-button'>Delete</button>
                                </form>
                            </td>
                        </tr>";
                    $serial_number++;
                }
            } else {
                echo "<tr><td colspan='7'>No buying process found.</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>
