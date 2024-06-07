<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url("photos/mainpage.jpg");
            margin: 0;
            padding: 0;
            background-repeat:no-repeat;
            background-size:cover;
            background-position:center;
        }
        header{
            text-align: center;
        }
        .doreen{
            background-color: black;
            margin: 200px;
            padding: 0.3em 0;
        

        }

        .container {
            width: 80%;
            margin: 0 auto;
        }
        .navbar {
            background-color: #333;
            padding: 1em 0;
        }

        .navbar .logo {
            color: #fff;
            text-decoration: none;
            font-size: 1.5em;
        }

        .navbar .nav-links {
            list-style: none;
            float: right;
        }

        .navbar .nav-links li {
            display: inline;
        }

        .hero {
            background: url('hero-bg.jpg') no-repeat center center/cover;
            color: #fff;
            padding: 100px 0;
            text-align: center;
        }

        .hero h1 {
            font-size: 3em;
        }

        .hero p {
            font-size: 1.2em;
            margin: 20px 0;
        }

        .hero .btn {
            background-color: #007BFF;
            padding: 3px 30px;
            border-radius: 5px;
            text-decoration: none;
            color: #fff;
            font-size: 1em;
        }
       
        .footer {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>
<body>

    <?php include('nav-header.php') ?>
    <header>
    <img style="float:right" src="photos/try.jpg" alt="logo"  "width="70" height="80"> 
    <h1  style="color:blue;">WELCOME TO MU PRODUCT BROKERAGE SYSTEM</h1>
    </header>
    
    <section>
    <section class="hero">
        <div class="container">
            <section class="doreen">
            <p  style="color:blue;" text-align="center;"> <b> GET YOUR BEST PRODUCT</b> </p>
            <br>
          <section>
        </div>
</section>
   
   <?php include('footer.php'); ?>
</body>
</html>
