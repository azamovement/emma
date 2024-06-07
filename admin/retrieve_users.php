
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>manage user</title>
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

td a {
    text-decoration: none;
}

td a button {
    padding: 5px 10px;
    border-radius: 4px;
}

td a button.delete {
    background-color: #ff4444; 
    color: white;
    cursor: pointer;
}

td a button.update {
    background-color: #00C851; 
    color: white;
    cursor:pointer; 
}


    </style>
</head>
<body>    
</body>
</html>

<?php  
include 'config.php';
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Users</h2>";
    echo "<table border='1'>
            <tr>
                <th>No</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Email</th>
                <th>Action</th>
            </tr>";
    $serial_number = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>$serial_number</td>
                <td>" . $row['first_name'] . "</td>
                <td>" . $row['last_name'] . "</td>
                <td>" . $row['phone_number'] . "</td>
                <td>" . $row['address'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>
                    <a href='update_users.php?id=" . $row['user_id'] . "'><button class='update'>Update</button></a>
                    <a href='delete_users.php?id=" . $row['user_id'] . "'><button class='delete'>Delete</button></a>
                </td>
            </tr>";
        $serial_number++;
    }
    echo "</table>";
} else {
    echo "No users found.";
}

$conn->close();
?>
