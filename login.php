<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LogIn | Waterbodies</title>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCHJcWoLfFhCqkjGGwuAYgmVHwxtlzvaU&callback=initMap" async defer></script>
  <link rel="stylesheet" href="./styles/login.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
  <main class="login_container">
      <section class="login_section">
        <h1> Welcome Back !</h1>
        <p>Please Enter Your Credentials</p>
        <button type="submit" class="google-login">
          <img src="./images/7123025_logo_google_g_icon.png" alt="google-icon">
          LogIn with Google
        </button>

        <form action="" method="POST">
        <form action="" method="">
          <div class="form-group">
            <label for="name">Username</label>
            <input  type="text" id="username"  placeholder="Enter your Username" name="name" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input  type="email" id="email"  placeholder="Enter your Email" name="email" required>
          </div>
          <div class="form-group">
            <label for="psswrd">Password</label>
            <input type="password" id="psswrd" placeholder="Password " name="password" required>
          </div>
          <div class="term-section">
            <input type="checkbox" name="check" id="terms" required>
            <p>I accepted all terms & conditions</p>
          </div>
        </form>

        <button type="button" class="sign-up_btn">Log In</button>
        <p class="error" id="error-message"></p>
        <p class="already">Don't have an account?<a href="./signup.php"><u>SignUp</u></a></p>
        <button type="button" class="sign-up_btn" //onclick="checkLogin()">Log In</button>
        <p class="error" id="error-message"></p>
        <p class="already">Don't have an account?<a href="./signup.html"><u>Sign Up</u></a></p>
      </section>
      </section>

      
      <div id="map"><h2>Your Live Location</h2></div>
      <section class="sign-up_background">
        <div class="slideshow">
          <img src="./images/beautiful-park_1127-3054.jpg" alt="beautiful-park">
          <img src="./images/lagoons.jpg" alt="">
          <img src="./images/lakes-1.jpg" alt="">
        </div>
        
      </section>
  </main>

  <script>
    /* function checkLogin() {
        const fixedUsername = "admin";  // Set your fixed username
        const fixedEmail = "ofosum4@gmail.com"; // Set your email
        const fixedPassword = "password123"; // Set your fixed password

        let enteredUsername = document.getElementById("username").value;
        let enteredEmail = document.getElementById("email").value;
        let enteredPassword = document.getElementById("psswrd").value;
        

        if (enteredUsername === fixedUsername && enteredEmail === fixedEmail && enteredPassword === fixedPassword ) {
            window.location.href = "./index.php"; // Redirect to another page after login
        } else {
            document.getElementById("error-message").textContent = "Invalid username or password!";
        }
    }*/

    const images = document.querySelectorAll('.slideshow img');
    let currentIndex = 0;

    function showNextImage() {
      // Hide the current image
      images[currentIndex].classList.remove('active');

      // Move to the next image
      currentIndex = (currentIndex + 1) % images.length;

      // Show the next image
      images[currentIndex].classList.add('active');
    }

    // Change image every 5 seconds
    setInterval(showNextImage, 5000);


    function initMap() {
            if (navigator.geolocation) {
                navigator.geolocation.watchPosition(
                    function (position) {
                        var userLocation = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };

                        var map = new google.maps.Map(document.getElementById("map"), {
                            zoom: 15,
                            center: userLocation
                        });

                        var marker = new google.maps.Marker({
                            position: userLocation,
                            map: map,
                            title: "You are here"
                        });
                    },
                    function () {
                        alert("Geolocation failed!");
                    }
                );
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }


  </script>
</body>
</html>