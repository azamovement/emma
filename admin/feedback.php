<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
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

        .actions {
            display: flex;
            gap: 10px;
        }

        .reply-link {
            background-color: green;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
        }

        .reply-link:hover, button:hover {
            background-color: dodgerblue;
        }
        .delete{
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
    include 'config.php';

    $sql = "SELECT * FROM feedback";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Feedback</h2>";
        echo "<table border='1'>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Feedback</th>
                    <th>Action</th>
                </tr>";
        $serial_number = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>$serial_number</td>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['message'] . "</td>
                    <td>
                        <div class='actions'>
                            <a href='mailto:" . $row['email'] . "?subject=Reply%20to%20Your%20Feedback' class='reply-link'>Reply</a>
                            <form action='delete_feedback.php' method='POST' style='display:inline;'>
                                <input type='hidden' name='id' value='" . $row['feedback_id'] . "'>
                                <button type='submit' class='delete'>Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>";
            $serial_number++;
        }
        echo "</table>";
    } else {
        echo "No feedback found.";
    }

    $conn->close();
    ?>
</body>
</html>
