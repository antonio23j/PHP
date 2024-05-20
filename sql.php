<?php
$mysqli = new mysqli("172.17.0.1", "root", "antonio", "palestra");
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
