<?php
$username = "root";
$password = "";
$servername = "localhost";
$dbname = "users";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    //echo "Connected successfully to the database '$dbname'!";
}



?>