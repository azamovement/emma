<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image with Description</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .image-container {
            flex: 1;
            text-align: center;
        }
        .image-container img {
            max-width: 100%;
            height: auto;
        }
        .text-container {
            flex: 2;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        .full-width {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="full-width">
        <?php include('nav-header.php'); ?>
    </div>
    <h1>ABOUT US</h1>
    <pre>
        this system has been developed by the team of 2022
        as a class of 2025
        the names of the group participant are 
        EMMANUEL DAVID MWAISAKA
        AZGARD RAPHAEL CHAULA 
        MWAZANI RASHID
        LEAH
        MAARIFA MOLLEL
    </pre>
    <div class="container">
        <div class="image-container">
            <img src="photos/try.jpg" alt="logo">
        </div>
        <div class="text-container">
            <h2>About us</h2>
            <p>Product brokerage system is the web based system tha facilitates the buying process of the various products from different suppliers all around the world</p>
        </div>
    </div>
    <div class="full-width">
        <?php include('footer.php'); ?>
    </div>
</body>
</html>
