<?php
session_start();

ini_set('display_errors', 0); // hide PHP notices and errors

// Connect to the database
$mysqli = new mysqli("172.17.0.1", "root", "antonio", "palestra");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

if (isset($_POST['client_login'])) {
    if ($_POST['client_login'] == 'yes') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email) || empty($password)) {
            $error_message = '<h3 class="error">Email and password are required</h3>';
        } else {
            // Prepare and execute the SQL query to check client credentials
            $stmt = $mysqli->prepare("SELECT id_client, name FROM clients WHERE email=? AND password=?");
            $stmt->bind_param("ss", $email, $password);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows == 0) {
                $error_message = '<h3 class="error">Incorrect email or password</h3>';
            } else {
                // Fetch client's name and store it in session
                $stmt->bind_result($client_id, $client_name);
                $stmt->fetch();
                $_SESSION['client_name'] = $client_name;
                // Redirect to logged_in.php after successful login
                header('Location: logged_in.php');
                exit;
            }

            $stmt->close();
        }
    }
}

?>

<html>

<head>
    <title>Client Log In</title>
    <link rel="stylesheet" type="text/css" href="style.css" media="screen">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&family=Poppins:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
</head>

<body>

    <header id="top">

        <div class="main">

            <nav class="main-menu">

                <ul>
                    <li>Ngotot</li>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="http://localhost/palestra_ime/#about">About</a></li>
                    <li><a href="http://localhost/palestra_ime/#service">Service</a></li>
                    <li><a href="http://localhost/palestra_ime/#pricing">Pricing</a></li>
                    <li><a href="http://localhost/palestra_ime/#footer">Help</a></li>
                </ul>

            </nav>

            <div class="clear"></div>
        </div>

        <h1> Client Login </h1>

        <div class="clear"></div>

    </header>

    <section id="form">

        <form class="control" method="post">

            <input type="hidden" name="client_login" value="yes" />

            <?php

            if ($error_message) {
                echo $error_message;
            } else {

            ?>

                <p>Client Login</p>

            <?php

            }

            ?>

            <div class="element">

                <input type="email" placeholder="Email" name="email">

                <input type="password" placeholder="Password" name="password">

            </div>

            <button type="submit">LOGIN</button>

        </form>

    </section>

    <section id="footer">

        <div class="grid grid20-20-20-20-20">

            <div class="column column20">

                <h4>Ngoto</h4>

                <ul class="social">

                    <li><a href="#"><img src="images/img8.png" /></a></li>
                    <li><a href="#"><img src="images/img8.png" /></a></li>
                    <li><a href="#"><img src="images/img8.png" /></a></li>

      
