<?php
session_start();
include("db_connect.php");

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header('Location: ssss.php'); // Redirect to login page
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "my_waterbodies_website"; 

try {
    $pdo = new PDO("mysql:servername=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get user data from database
    $userId = $_SESSION['user']['id']; // Assuming user ID is stored in session
    $stmt = $pdo->prepare("SELECT fname, lname, email, dob, country FROM users WHERE id = ?");
    $stmt->execute([$userId]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        die("User not found");
    }
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }

        .profile-container {
            max-width: 600px;
            height: 80vh;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
        }

        h1 {
            color: #333;
            text-align: center;

        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            margin-top: 250px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .action-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
        }

        .btn-change {
            background-color: #4560b6;
            color: white;
        }

        .btn-home {
            background-color: #4caf50;
            color: white;
        }

        .btn-delete {
            background-color: #f44336;
            color: white;
        }

        .btn:hover {
            opacity: 0.8;
        }

        /* Upload styles */
        .upload {
            position: relative;
            width: 40px;
            height: 10px;
        }

        .round {
            position: absolute;
            top: 265px;
            left: 345px;
            background: #fff;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px solid #4CAF50;
            cursor: pointer;
        }

        .fa-camera {
            color: #4caf50;
            font-size: 20px;
        }

        .profile-img {
            width: 200px;
            height: 30vh;
            border-radius: 50%;
            object-fit: cover;
            cursor: pointer;
            vertical-align: middle;
            margin-top: 90px;
            border: 2px solid #fff;
            margin-left: 200px;
        }
    </style>
</head>

<body>
    <div class="profile-container">

        <?php
        // Enable error reporting for debugging (remove in production)
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        // Database connection with error handling
        try {
            $conn = new mysqli("localhost", "root", "", "upload_image");
            if ($conn->connect_error) {
                throw new Exception("Database connection failed: " . $conn->connect_error);
            }

            // Fetch the latest uploaded image with error handling
            $defaultImage = 'default.jpg';
            $image = $defaultImage;

            $query = "SELECT filename FROM images ORDER BY id DESC LIMIT 1";
            if ($result = $conn->query($query)) {
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $image = htmlspecialchars($row['filename']);

                    // Verify the image file actually exists
                    $imagePath = 'uploads/' . $image;
                    if (!file_exists($imagePath)) {
                        error_log("Image file not found: " . $imagePath);
                        $image = $defaultImage;
                    }
                }
                $result->close();
            } else {
                throw new Exception("Query failed: " . $conn->error);
            }

            $conn->close();
        } catch (Exception $e) {
            // Log the error and fall back to default image
            error_log($e->getMessage());
            $image = $defaultImage;
        }
        ?>

        <form id="uploadForm" action="upload.php" method="POST" enctype="multipart/form-data">
            <div class="upload">
                <!-- Profile Image with Fallback -->
                <img id="profileImage"
                    src="uploads/<?php echo $image; ?>"
                    onerror="this.src='uploads/<?php echo $defaultImage; ?>'"
                    alt="Profile Image"
                    class="profile-img"
                    onclick="toggleDropdown()">

                <!-- Camera Icon for Upload -->
                <div class="round" onclick="document.getElementById('imageUpload').click()">
                    <i class="fa fa-camera"></i>
                    <input type="file" id="imageUpload" name="image" accept="image/*" style="display: none;"
                        onchange="document.getElementById('uploadForm').submit()">
                </div>
            </div>
            <?php if (isset($_GET['status'])): ?>
                <div class="upload-status" style="margin-top: 10px; padding: 5px; 
            background-color: <?php echo $_GET['status'] === 'success' ? '#4CAF50' : '#f44336'; ?>; 
            color: white; border-radius: 4px;">
                    <?php
                    echo htmlspecialchars($_GET['message'] ??
                        ($_GET['status'] === 'success' ? 'Upload successful!' : 'Upload failed'));
                    ?>
                </div>
            <?php endif; ?>

        </form>


        <h1>User Profile</h1>

        <table>
            <tr>
                <th>Username</th>
                <td><?php echo htmlspecialchars($user['fname'] . ' ' . htmlspecialchars($user['lname'])); ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo htmlspecialchars($user['email']); ?></td>
            </tr>
            <tr>
                <th>Date Of Birth</th>
                <td><?php echo htmlspecialchars($user['dob']); ?></td>
            </tr>
            <tr>
                <th>Country</th>
                <td><?php echo htmlspecialchars($user['country']); ?></td>
            </tr>
        </table>

        <div class="action-buttons">
            <a href="change_password.php" class="btn btn-change">
                <i class="fas fa-key"></i> Change Password
            </a>
            <a href="Home.php" class="btn btn-home">
                <i class="fas fa-home"></i> Home
            </a>
            <a href="delete_account.php" class="btn btn-delete">
                <i class="fas fa-trash-alt"></i> Delete Account
            </a>
        </div>
    </div>
</body>

</html>