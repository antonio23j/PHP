<?php

ini_set('display_errors', 0); // hide PHP notices and errors

include 'sql.php';

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $plan = $_POST['plan'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($name) || empty($email) || empty($phone) || empty($plan) || empty($password) || empty($confirm_password)) {
        $error_message = '<h3 class="error">All fields are required.</h3>';
    } elseif ($password !== $confirm_password) {
        $error_message = '<h3 class="error">Passwords do not match.</h3>';
    } else {
        // Encrypt the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and execute the SQL query
        $stmt = $mysqli->prepare("INSERT INTO clients (name, email, phone, training_plan, password) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $email, $phone, $plan, $hashed_password);

        if ($stmt->execute()) {
            $_SESSION['client_id'] = $name; 
            header("Location: login.php");
            exit();
        } else {
            $error_message = '<h3 class="error">Error: Failed to register client.</h3>';
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Registration</title>
    <link rel="stylesheet" type="text/css" href="style.css" media="screen">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&family=Poppins:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
</head>
<body>

<header id="top">
    <div class="main">
        <a href="login.php" class="login">Login</a>
    </div>
    <h1> Client Registration </h1>
</header>

<section id="form">
    <form class="control" method="post">
        <input type="hidden" name="register" value="yes" />

        <?php if(isset($error_message)) { echo $error_message; } ?>
        <?php if(isset($success_message)) { echo $success_message; } ?>

        <p>Client Registration</p>
        <span class="sub-label">Please fill out the form to register as a client.</span>

        <div class="element">
            <input type="text" placeholder="Name" name="name" required>
            <input type="email" placeholder="Email" name="email" required>
            <input type="tel" placeholder="Phone" name="phone" required>
            <select name="plan" required>
                <option value="">Select Gym Plan</option>
                <option value="basic">Basic</option>
                <option value="premium">Premium</option>
                <option value="super">Super</option>
            </select>
            <input type="password" placeholder="Password" name="password" required>
            <input type="password" placeholder="Confirm Password" name="confirm_password" required>
        </div>

        <button type="submit">REGISTER</button>
    </form>

</section>

</body>
</html>
