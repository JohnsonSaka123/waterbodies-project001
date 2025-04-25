<?php
// Start session to store messages
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if (!isset($_FILES['image'])) {
            throw new Exception('No file uploaded');
        }

        $targetDir = "uploads/";
        if (!is_dir($targetDir)) {
            if (!mkdir($targetDir, 0755, true)) {
                throw new Exception('Failed to create upload directory');
            }
        }

        // Validate image
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $fileType = mime_content_type($_FILES['image']['tmp_name']);

        if (!in_array($fileType, $allowedTypes)) {
            throw new Exception('Invalid file type. Only JPG, PNG, and GIF are allowed.');
        }

        // Generate unique filename
        $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
        $targetPath = $targetDir . $fileName;

        if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
            throw new Exception('Failed to move uploaded file');
        }

        // Save to database
        $conn = new mysqli("localhost", "root", "", "upload_image");
        if ($conn->connect_error) {
            throw new Exception("Database connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO images (filename, file_size, file_type) VALUES (?, ?, ?)");
        if (!$stmt) {
            throw new Exception("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("sis", $fileName, $_FILES['image']['size'], $fileType);
        if (!$stmt->execute()) {
            throw new Exception("Execute failed: " . $stmt->error);
        }

        $_SESSION['message'] = "File uploaded successfully: " . $fileName;
    } catch (Exception $e) {
        $_SESSION['error'] = "Error: " . $e->getMessage();
    }

    // Redirect back to the same page
    header("Location: profile.php");
    exit();
}
