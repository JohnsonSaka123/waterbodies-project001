<?php
include 'db_connect.php';

if(isset($_POST['signUp'])){
    $image = $_POST['image'];
    $fname = $_POST['fName'];
    $lname = $_POST['lName'];
    $uname = $_POST['uName'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $country = $_POST['country'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    
    $checkEmail="SELECT * From users where email='$email'";
    $checkUsername="SELECT * From users where uname='$uname'";
    $result=$conn->query($checkEmail);
    $result=$conn->query($checkUsername);
    if($result->num_rows>0){
        echo "Username & Email Already Exist !";
       
    }
    else{
        $insertQuery = "INSERT INTO users (image,fName,lName,uName, email,date,country, password) 
        VALUES ('$image', '$fname','$lname','$uname', '$email', '$date','$country', '$password')";
        if ($conn->query($insertQuery) == TRUE) {
            echo "New record created successfully";
            header("location: ssss.php");
        } else {
            echo "Error: ".$conn->error;
        }
        
        $conn->close();
    }
}

if (isset($_POST['signIn'])) {
    $email = $_POST['email'];
    $password = $_POST['password']; // Get the plain text password

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify the password
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['email'] = $row['email'];
            header("location: homepage.php");
            exit();
        } else {
            echo "Not Found, Incorrect Email or Password";
        }
    } else {
        echo "Not Found, Incorrect Email or Password";
    }
}


?>
