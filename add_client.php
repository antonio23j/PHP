<?php
session_start();

ini_set('display_errors', 1); // hide php notices and errors

if ($_SESSION['admin_level'] != "admin") {
    header('Location: login.php');
    exit;
}

include 'sql.php';

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $training_plan = $_POST['training_plan'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO clients (name, email, phone,password,training_plan) VALUES (?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sssss", $name, $email, $phone, $hashed_password, $training_plan);
    $stmt->execute();
    $stmt->close();
    header('Location: superadmin.php'); // Redirect to the admin page after adding
    exit;
}

if (isset($_POST['delete'])) {
    $id = $_POST['id_client'];

    $sql = "DELETE FROM clients WHERE id_client=$id";
    $mysqli->query($sql);
    
    header('Location: superadmin.php'); // Redirect to the admin page after deletion
    exit;
}

if (isset($_POST['edit'])) {
    $id = $_POST['id_client'];

    $sql = "SELECT * FROM clients WHERE id_client=$id";
    $result = $mysqli->query($sql);
    $record = $result->fetch_assoc();

    $name = $record['name'];
    $email = $record['email'];
    $phone = $record['phone'];
}
?>

<html>

<head>
    <title>Edit Client</title>
    <link rel="stylesheet" type="text/css" href="style.css" media="screen">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&family=Poppins:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
</head>

<body>

    <header id="top">


        <h1> Edit Client </h1>

        <div class="clear"></div>

    </header>

    <section id="edit_client" class="control">

        <div class="main">

            <form method="post" action="superadmin.php">
                <input type="hidden" name="id_client" value="<?=  $record['id_client']?>">
                <input type="text" name="name" placeholder="Name" value="<?=  $record['name']?>">
                <input type="email" name="email" placeholder="Email" value="<?=  $record['email']?>">
                <input type="text" name="phone" placeholder="Phone" value="<?=  $record['phone']?>">
                <select name="training_plan">
       				<option value="basic">basic</option>
        			<option value="premium">premium</option>
       				<option value="super">super</option>
   				 </select>
                <button type="submit" name="update">Update Client</button>
            </form>

            <div class="clear"></div>

        </div>

        <div class="clear"></div>

    </section>

</body>

</html>

