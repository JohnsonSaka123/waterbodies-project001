<?php
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "my_waterbodies_website"; 
// Connect to your database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get search query
$search = isset($_GET['query']) ? trim($_GET['query']) : '';

if (!empty($search)) {
    // Use prepared statements for security
    $stmt = $conn->prepare("SELECT * FROM your_table WHERE column_name LIKE ?");
    $likeSearch = "%" . $search . "%";
    $stmt->bind_param("s", $likeSearch);
    
    $stmt->execute();
    $result = $stmt->get_result();

    // Display results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p>" . htmlspecialchars($row['column_name']) . "</p>";
        }
    } else {
        echo "<p>No results found.</p>";
    }

    $stmt->close();
}

$conn->close();
?>
