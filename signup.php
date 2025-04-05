<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup | Waterbodies</title>
  <link rel="stylesheet" href="./styles/signup.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
  <main class="sign-up_container">
      <section class="sign-up_section">
        <h1>Create Your Account</h1>
        <p>Welcome ! Please enter your details</p>
        <button type="submit" class="google-sign_up">
          <img src="./images/7123025_logo_google_g_icon.png" alt="google-icon">
          Sign up with Google
        </button>

        <form action="" method="POST">
          <div action="" method="" enctype="multipart/form-data">
            <p>Upload your profile picture</p>
            <label for="imageUpload">
                <img id="imagePreview" src="./images/avatar.png" alt="Click Here To Upload Image" width="110" height="80" style="cursor: pointer; border: 2px dashed #ccc; display: inline-block;"/>
            </label>
            <input type="file" name="image" id="imageUpload" accept="image/*" style="display: none;" required>
        </div>
        
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" placeholder="Enter your name" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input  type="email" id="email" required placeholder="Enter your email">
          </div>
          <div class="form-group">
            <label for="psswrd">Password</label>
            <input type="password" id="psswrd" required>
          </div>
          <div class="form-group">
            <label for="psswrd">Retype Password</label>
            <input type="password" id="psswrd" required>
          </div>
          <div class="term-section">
            <input type="checkbox" name="" id="terms">
            <p>I accepted all terms & conditions</p>
          </div>
        </form>

        <input type="submit" class="sign-up_btn" value="Sign Up"> 
        <p class="already">Already have an account?<a href="./login.php"><u>Sign in</u></a></p>
      </section>

      <section class="sign-up_background">
        <div class="slideshow">
          <img src="./images/beautiful-park_1127-3054.jpg" alt="beautiful-park">
          <img src="./images/lagoons.jpg" alt="">
          <img src="./images/lakes-1.jpg" alt="">
        </div>
        
      </section>
  </main>
  <script>
    // Show preview when an image is selected
    document.getElementById('imageUpload').addEventListener('change', function(event) {
                var reader = new FileReader();
                reader.onload = function() {
                    document.getElementById('imagePreview').src = reader.result;
                }
                reader.readAsDataURL(event.target.files[0]);
            });

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
  </script>
</body>
</html>