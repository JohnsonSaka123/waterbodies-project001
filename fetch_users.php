<?php
<<<<<<< HEAD
session_destroy();
header("location: login.php");
exit;
=======
include 'db_connect.php';

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["name"] . " - Email: " . $row["email"] . "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
>>>>>>> ce3dc7c4d15b88d1682b9ee1ae9128e1f71f64ae
?>
