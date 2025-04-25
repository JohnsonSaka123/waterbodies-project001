<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="./styles/newprofile.css">
</head>

<body>
    <div class="profile-container">

        <!-- <?php
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
        ?> -->

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
            <!-- <?php if (isset($_GET['status'])): ?>
                <div class="upload-status" style="margin-top: 10px; padding: 5px; 
            background-color: <?php echo $_GET['status'] === 'success' ? '#4CAF50' : '#f44336'; ?>; 
            color: white; border-radius: 4px;">
                    <?php
                    echo htmlspecialchars($_GET['message'] ??
                        ($_GET['status'] === 'success' ? 'Upload successful!' : 'Upload failed'));
                    ?>
                </div>
            <?php endif; ?> -->

        </form>


        <h1>User Profile</h1>

        <table>
            <tr>
                <th>Username</th>
                <!-- <td><?php echo htmlspecialchars($user['fname'] . ' ' . htmlspecialchars($user['lname'])); ?></td> -->
            </tr>
            <tr>
                <th>Email</th>
                <!-- <td><?php echo htmlspecialchars($user['email']); ?></td> -->
            </tr>
            <tr>
                <th>Date Of Birth</th>
                <!-- <td><?php echo htmlspecialchars($user['dob']); ?></td> -->
            </tr>
            <tr>
                <th>Country</th>
                <!-- <td><?php echo htmlspecialchars($user['country']); ?></td> -->
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