<?php
$servername = "localhost";
$username = "root";
$password = "Phoenix@4583";
$dbname = "my_waterbodies_website";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
