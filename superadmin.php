<?php
session_start();

ini_set('display_errors', 1); // hide php notices and errors

if ($_SESSION['admin_level'] != "admin") {

    header('Location: login.php');
    exit;
}

// connect to database

include 'sql.php';

if ($mysqli -> connect_errno) {
	
	echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
	exit();

}

if (isset($_POST['update'])) {
    $id = $_POST['id_client'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
	$training_plan = $_POST['training_plan'];

    $sql = "UPDATE clients SET name='$name', email='$email', phone='$phone', training_plan='$training_plan' WHERE id_client=$id";
    $mysqli->query($sql);
}

?>

<html>
<head>
<title>Super Admin</title>
<link rel="stylesheet" type="text/css" href="style.css" media="screen">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&family=Poppins:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
</head>
<body>

<header id="top">
	<div>
	<h1> Klientet e Regjistruar ne Palester </h1>
	
	<div class="clear"></div>

</header>

<section id="clients_table">

<div class="main">

	<table>
		
		<thead>
			<tr>
				<th>Emri</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Training Plan</th>
				<th>Data Fillimit</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		
		<tbody>
		
			<?php
			
				$sql = "SELECT * FROM clients";
				$result = $mysqli->query($sql);
				
				while( $record = $result->fetch_array() ) {
					
					?>
						
						<tr>
							<td><?=$record['name']?></td>
							<td><?=$record['email']?></td>
							<td><?=$record['phone']?></td>
							<td><?=$record['training_plan']?></td>
							<td><?=$record['start_date']?></td>
							<td>
                                <form method="post" action="add_client.php">
                                    <input type="hidden" name="id_client" value="<?= $record['id_client'] ?>">
                                    <input type="submit" name="edit" value="Edit">
                                </form>
                            </td>
                            <td>
                                <form method="post" action="add_client.php">
                                    <input type="hidden" name="id_client" value="<?= $record['id_client'] ?>">
                                    <input type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure you want to delete this client?')">
                                </form>
                            </td>
						</tr>
						
					
					<?php
					
				}
			
			?>
		
		</tbody>
	
	</table>

	<div class="addClient">
	<form method="post" action="add_client.php">
                <input type="text" name="name" placeholder="Name">
                <input type="email" name="email" placeholder="Email">
                <input type="text" name="phone" placeholder="Phone">
				<input type="password" name="password" placeholder="Password">
				<select name="training_plan">
       				<option value="basic">basic</option>
        			<option value="premium">premium</option>
       				<option value="super">super</option>
   				 </select>
                <button type="submit" name="add">Add Client</button>
            </form>
	</div>
	<a href="index.html" class="logout">Logout</a>
	
	<div class="clear"></div>
	
	</div>
	
	<div class="clear"></div>

</section>


</body>

</html>