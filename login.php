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

                <p>Client Login</p>

            <div class="element">

                <input type="email" placeholder="Email" name="email">

                <input type="password" placeholder="Password" name="password">

            </div>

            <button type="submit">LOGIN</button>

        </form>

    </section>

    <?php
session_start();

$mysqli = new mysqli("172.17.0.1", "root", "antonio", "palestra");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

if (isset($_POST['client_login']) && $_POST['client_login'] == 'yes') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $error_message = '<h3 class="error">Email and password are required</h3>';
    } else {
        // Prepare SQL statement
        $stmt = $mysqli->prepare("SELECT id_client, name, password FROM clients WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 0) {
            $error_message = '<h3 class="error">Incorrect email or password</h3>';
        } else {
            // Bind result variables
            $stmt->bind_result($client_id, $client_name, $hashed_password);
            $stmt->fetch();

            // Verify password
            if (password_verify($password, $hashed_password)) {
                $_SESSION['client_id'] = $client_id;
                header('Location: logged_in.php');
                exit;
            } else {
                $error_message = '<h3 class="error">Incorrect email or password</h3>';
            }
        }

        $stmt->close();
    }
}


?>
      
