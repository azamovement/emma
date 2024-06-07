<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .hero {
            background: url('photos/try.jpg') no-repeat center center/cover;
            color: white;
            text-align: center;
            padding: 100px 20px;
        }

        .contact-details, .contact-form, .location-map {
            padding: 40px 20px;
            background-color: white;
            margin: 20px auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 800px;
            text-align: center;
        }

        .contact-form form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .contact-form label {
            margin-top: 10px;
            width: 100%;
            text-align: left;
        }

        .contact-form input, .contact-form textarea, .contact-form button {
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 80%;
            max-width: 400px;
            box-sizing: border-box;
        }

        .contact-form textarea {
            height: 150px;
            resize: vertical;
        }

        .contact-form button {
            margin-top: 20px;
            background-color: #ff6600;
            color: white;
            border: none;
            cursor: pointer;
            width: 50%;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px 0;
        }

        footer ul {
            list-style: none;
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
            padding: 0;
        }

        footer ul li {
            margin: 0 10px;
        }

        footer ul li a {
            color: white;
            text-decoration: none;
        }

        footer .social-media img {
            width: 30px;
            margin: 0 10px;
        }

        footer p {
            margin-top: 2px;
        }

        h1 {
            color: blue;
        }

        p {
            color: black;
        }

        .smallhead {
            font-size: 30px;
        }
    </style>
</head>
<body>

    <?php include 'nav-header.php';
    include 'feedback_form.php' ?>

    <main>
        <section class="hero">
            <h1>Contact Us</h1>
            <p class="smallhead" style="color:blue;">We realy Love to hear From You! Please Send message to our Contact.</p>
        </section>
        

        <section class="contact-details">
            <h2>Contact Information</h2>
            <p><strong>Phone:</strong> +255 692 919 010</p>
            <p><strong>Email:</strong> mu brokerage product@gmail.com</p>
            <p><strong>Address:</strong> 1 Mzumbe, Morogoro, Tanzania</p>
        </section>

        <section class="contact-form">
            <h2>Send Us a Message</h2>
            <form action="feedback_form.php" method="post">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="enter your fullname" required>
                
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="enter your email" required>
                
                <label for="message">Message</label>
                <textarea id="message" name="message" required></textarea>
                
                <button type="submit">Submit</button>
            </form>
        </section>
    </main>

    <?php include 'footer.php'; ?>

</body>
</html>
