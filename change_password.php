<?php
session_start();

ini_set('display_errors', 0); // hide PHP notices and errors

$mysqli = new mysqli("172.17.0.1", "root", "antonio", "palestra");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

if (!isset($_SESSION['client_id'])) {
    header('Location: login.php');
    exit;
}

if (isset($_POST['change_password'])) {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Fetch the current logged-in user's ID from the session
    $client_id = $_SESSION['client_id'];

    // Check if the old password matches the one in the database
    $stmt = $mysqli->prepare("SELECT password FROM clients WHERE id_client=?");
    $stmt->bind_param("i", $client_id);
    $stmt->execute();
    $stmt->bind_result($stored_password);
    $stmt->fetch();
    $stmt->close();

    if ($old_password !== $stored_password) {
        $error_message = '<h3 class="error">Incorrect old password</h3>';
    } elseif ($new_password !== $confirm_password) {
        $error_message = '<h3 class="error">New password and confirmation do not match</h3>';
    } else {
        // Update the password in the database
        $stmt = $mysqli->prepare("UPDATE clients SET password=? WHERE id_client=?");
        $stmt->bind_param("si", $new_password, $client_id);
        $stmt->execute();
        $stmt->close();

        // Redirect to logged_in.php after successful password change
        header('Location: logged_in.php');
        exit;
    }
}

?>

<html>

<head>
    <title>Change Password</title>
    <link rel="stylesheet" type="text/css" href="style.css">
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

        <h1> Change Password </h1>

        <div class="clear"></div>

    </header>

    <section id="form" class="control">

        <form method="post">

            <input type="hidden" name="change_password" value="yes" />

            <?php

            if ($error_message) {
                echo $error_message;
            } else {

            ?>

                <p>Change Password</p>

            <?php

            }

            ?>

            <div class="element">

                <input type="password" placeholder="Old Password" name="old_password">

                <input type="password" placeholder="New Password" name="new_password">

                <input type="password" placeholder="Confirm New Password" name="confirm_password">

            </div>

            <button type="submit">Change Password</button>

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

    </section>

</body>

</html>
