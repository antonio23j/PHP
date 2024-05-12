<?php
session_start();

$mysqli = new mysqli("127.0.0.1","root", "root","palestra");


if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

$error_message = "";


if (isset($_POST['client_login']) && $_POST['client_login'] == 'yes') {
    $email = $_POST['email'];
    $password = $_POST['password'];

if (empty($email) || empty($password)) {
    $error_message = '<h3 class="error">Email and password are required</h3>';
} else {
    // Check if the user is an admin
    $stmt = $mysqli->prepare("SELECT id_admin, password, level FROM admins WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // If the user is found in admins table, verify the password
        $stmt->bind_result($admin_id, $admin_password, $admin_level);
        $stmt->fetch();

        if ($admin_password == $password) {
            $_SESSION['admin_id'] = $admin_id;
            $_SESSION['admin_level'] = $admin_level;
            header('Location: superadmin.php');
            exit;
        } else {
            $error_message = '<h3 class="error">Incorrect password</h3>';
        }
    } else {
        // If not found in admins table, check clients table
        $stmt = $mysqli->prepare("SELECT id_client, name, password FROM clients WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // If found in clients table, verify the password
            $stmt->bind_result($client_id,$client_name, $hashed_password);
            $stmt->fetch();

            if (password_verify($password, $hashed_password)) {
                $_SESSION['client_id'] = $client_id;
                header('Location: logged_in.php');
                exit;
            } else {
                $error_message = '<h3 class="error">Incorrect password</h3>';
            }
        }
        else {
            // Email not found in clients table
            $error_message = '<h3 class="error">Email not found</h3>';
        }
    }

    $stmt->close();
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

        <h1>Login </h1>

        <div class="clear"></div>


    </header>

    <section id="form" class="control">

    <?php if (!empty($error_message)) echo $error_message; ?>
    

        <form method="post">

            <input type="hidden" name="client_login" value="yes" />
            

                <p>Login</p>

            <div class="element">

                <input type="email" placeholder="Email" name="email">

                <input type="password" placeholder="Password" name="password">

            </div>

            <button type="submit">LOGIN</button>

        </form>

        <div class="center-a">
            <form action="clientRegister.php">
                 <button type="submit" class="register-link">Register</button>
             </form>
        </div>

    </section>
</body>
</html>