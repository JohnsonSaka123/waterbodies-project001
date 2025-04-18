<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>River Nile</title>
  <link rel="stylesheet" href="./styles/river_nile.css">
  <link rel="stylesheet" href="./styles/base.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <header>
    <h1 class="logo"><a href="index.php">WaterBodies</a></h1>
    <nav id="nav-menu">
      <ul>
        <li><a href="./index.php">Home</a></li>
        <li><a href="./about.php">About</a></li>
        <li><a href="./lakes.php">Lakes</a></li>
        <li><a href="./lagoons.php">Lagoons</a></li>
        <li><a href="./Waterfalls.php">Waterfalls</a></li>
        <li><a href="./rivers.php">Rivers</a></li>
        <li><a href="./contact.php">Contact</a></li>
      </ul>
    </nav>
    <!--Harmburger menu-->
    <div class="harmburger" onclick="toggleMenu()">
      <i class="fa-solid fa-bars"></i>
    </div>
  </header>

  <!--hero section-->

  <main class="hero-section">
    <div class="overlay">
      <h1>The Nile (Egypt)</h1>
      <p>The Nile is a major north-flowing river in northeastern Africa. It flows into the Mediterranean Sea. The Nile is the longest river in Africa. It has historically been considered the longest river in the world, though this has been contested by research suggesting that the Amazon River is slightly longer. Wikipedia
        Sources: Blue Nile River, White Nile, Atbarah
        Length: 6,650 km
        Mouth: Mediterranean Sea
        Cities: Cairo, Khartoum, Jinja, Juba
        Countries: Egypt, Sudan
        Discharge: 2,830 m³/s.</p>
    </div>
  </main>

  <section class="video-section">
    <section class="video-section_2">
      <h2>The Nile River</h2>
    <div class="video-container">
      <video id="video" poster="" " controls>
          <source src="./videos/The Nile River.mp4" type="video/mp4">
          Your browser does not support the video tag.
      </video>
    </div>
    </section>

  <section class="video-section_1">
    <h2>The Nile River, Explained In 3 Minutes</h2>
  <div class="video-container">
    <video id="video" poster=""  controls>
        <source src="./videos/The Nile River Explained in under 3 Minutes.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>
</section>

  </section>



  <section class="footer">
    <div class="footer-1">
      <div class="logo-footer">
        <h1>WaterBodies</h1>
      </div>
      <div class="nav-links_main">
        <ul>
        <li><a href="./index.php">Home</a></li>
        <li><a href="./about.php">About</a></li>
        <li><a href="./contact.php">Contact</a></li>
        <li><a href="./rivers.php">Rivers</a></li>
        <li><a href="./lakes.php">Lakes</a></li>
        <li><a href="./lagoons.php">Lagoons</a></li>
        <li><a href="./Waterfalls.php">Waterfalls</a></li>
        </ul>
      </div>

      <div class="policy-section">
      <ul>
        <li><a href="#">Privacy Policy</a></li>
        <li><a href="#">Terms of Service</a></li>
      </ul>
      </div>
    </div>

    <div class="footer-2">
      <p>&copy; 2025 Group 8 || Waterbodies. All right reserved</p>
    </div>
    
  </section>
  <script>
    function togglePlay() {
        var video = document.getElementById("video");
        var playButton = document.getElementById("playButton");

        if (video.paused) {
            video.play();
            playButton.style.display = "none"; // Hide play button when playing
        } else {
            video.pause();
            playButton.style.display = "flex"; // Show play button when paused
        }
    }
</script>
  <script src="./scripts/index.js"></script>
</body>
</html>