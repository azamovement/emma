<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
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
    <h2 class="mwaisaka">Add Product</h2>
    <form action="admin_add_product.php" method="post" enctype="multipart/form-data">
        <label for="productname">Product Name:</label>
        <input type="text" id="productname" name="productname" required><br><br>
        <label for="productimage">Select image to upload:</label>
        <input type="file" name="productimage" id="productimage" required><br><br>
       <label for="productimage">enter price :</label>
        <input type="text" id="price" name="price" required><br><br>
        <input type="submit" value="Upload Product" name="submit">
    </form>
</body>
</html>
