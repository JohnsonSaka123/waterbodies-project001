<?php
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "my_waterbodies_website"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get form data
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $rating = (int)$_POST['rating'];
    $feedback = trim($_POST['feedback']);

    // Validate form data
    if (empty($name) || empty($email) || empty($feedback) || $rating < 1 || $rating > 5) {
        echo "Please fill in all fields and provide a valid rating (1-5).";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Please enter a valid email address.";
    } else {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO feedback (name, email, rating, feedback) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $name, $email, $rating, $feedback); // "ssis" indicates string, string, integer, string

        // Execute the statement
        if ($stmt->execute()) {
            // Show confirmation dialog using JavaScript
            echo "<script>
                    if (confirm('Feedback submitted successfully! Do you want to go to the feedback page?')) {
                        window.location.href = 'feedback.php';
                    } else {
                        window.location.href = 'index.php'; // Redirect to another page if user cancels
                    }
                  </script>";
        } else {
            echo "Error: " . $stmt->error; // Log this error instead in production
        }

        // Close the statement
        $stmt->close();
    }
}

// Close the connection
$conn->close();
?>