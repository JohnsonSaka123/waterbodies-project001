<?php
session_start();
include("db_connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Waterbodies | World</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./styles/index.css">
  <link rel="stylesheet" href="./styles/base.css">
</head>
<body>
  <header>
    <h1 class="logo"><a href="./index.php">WaterBodies</a></h1>
    <div class="search-bar">
      <form action="./search.php" method="GET">
        <input type="text" name="query" placeholder="Search..." required>
        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
      </form>
    </div>
    <nav id="nav-menu">
      <ul>
        <li><a href="./homepage.php">Home</a></li>
        <li><a href="#about-section">About</a></li>
        <li><a href="./lakes.php">Lakes</a></li>
        <li><a href="./lagoons.php">Lagoons</a></li>
        <li><a href="./Waterfalls.php">Waterfalls</a></li>
        <li><a href="./rivers.php">Rivers</a></li>
        <li><a href="./feedback.php">Contact</a></li>
      </ul>

      <div class="profile-dropdown">
    <button class="profile-dropdown-btn" aria-haspopup="true" aria-expanded="false" onclick="toggleMenu()">
        <div class="profile-img">
            <i class="fa-solid fa-circle"></i>
        </div>
        <p>
            Hello, <?php
            if(isset($_SESSION['email'])){
              $email=$_SESSION['email'];
              $query=mysqli_query($conn,"SELECT users.* FROM `users` WHERE users.email='$email'");
              while($row=mysqli_fetch_array($query)){
                $username=$row['uName'];
                echo htmlspecialchars($username);
              }
            } else {
              echo "Guest";
             ?>
            <i class="fa-solid fa-angle-down"></i>
        </p>
    </button>

    <ul class="profile-dropdown-list" style="display: none;">
        <li class="profile-dropdown-list-item">
            <a href="./profile.php">
                <i class="fa-regular fa-edit"></i>
                Edit Profile
            </a>
        </li>
        <li class="profile-dropdown-list-item">
            <a href="./inbox.php">
                <i class="fa-regular fa-envelope"></i>
                Inbox
            </a>
        </li>
        <li class="profile-dropdown-list-item">
            <a href="./settings.php">
                <i class="fa-solid fa-sliders"></i>
                Settings
            </a>
        </li>
        <li class="profile-dropdown-list-item">
            <a href="./logout.php">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                Logout
            </a>
        </li>
    </ul>
</div>


    </nav>
    
    <!--Harmburger menu-->
    <div class="harmburger" onclick="toggleMenu()">
      <i class="fa-solid fa-bars"></i>
    </div>
  </header>

  <!--hero section-->

  <main class="hero-section">
    <div class="overlay">
      <h1>Explore the Beauty of World's Major Waterbodies</h1>
      <p>Discover the rivers, lakes, waterfalls, and lagoons that shape World's natural beauty.</p>
      <a href="./about.php" class="btn">Learn More</a>
    </div>
  </main>

  <section id="about-section">
    <h2>Overview</h2>
    <p>Welcome to Waterbodies – your go-to resource for exploring the world's lakes, rivers, oceans, and ponds! Whether you're a nature lover, researcher, or just curious, we’re here to share stunning visuals, insightful stories, and up-to-date information about these incredible aquatic ecosystems. Dive in and discover the beauty and importance of waterbodies across the globe!</p>
  </section>

  <section class="featured-waterbodies">

    <h2>Featured Waterbodies</h2>

    <div class="list-of-waterbodies">
      <div class="card" id="card-1">
          <img src="./images/River-1.jpg" alt="Rivers" class="feature-image">
          <h3 class="feature-title">Rivers</h3>
          <p class="feature-descrip">Rivers are the lifeblood of our planet, weaving through landscapes, nurturing ecosystems, and connecting communities.</p>
          <a href="./rivers.php"><button type="button" class="feature-btn">Learn More</button></a>
        
      </div>
      <div class="card" id="card-2">
          <img src="./images/lakes-1.jpg" alt="Lakes" class="feature-image">
          <h3 class="feature-title">Lakes</h3>
          <p class="feature-descrip">Lakes are nature’s serene mirrors, reflecting the beauty of their surroundings while sustaining diverse ecosystems and human life.</p>
          <button type="button" class="feature-btn">Learn More</button>
      </div>
      <div class="card" id="card-3">
        
          <img src="./images/lagoons.jpg" alt="Lagoons" class="feature-image">
        
        
          <h3 class="feature-title">Lagoons</h3>
          <p class="feature-descrip">Lagoons are calm coastal areas that support diverse marine life,offering tranquil beauty and connect land with sea, creating natural sanctuaries.</p>
          <button type="button" class="feature-btn">Learn More</button>
        
      </div>
      <div class="card" id="card-4">
          <img src="./images/waterfalls.jpg" alt="Waterfalls" class="feature-image">
        
        
          <h3 class="feature-title">Waterfalls</h3>
          <p class="feature-descrip">Waterfalls are nature’s spectacular wonders, cascading down landscapes with breathtaking force and elegance.</p>
          <button type="button" class="feature-btn">Learn More</button>
      </div>
      
    </div>

  </section>

  <section class="footer">
    <div class="footer-1">
      <div class="logo-footer">
        <h1>WaterBodies</h1>
      </div>
      <div class="nav-links_main">
        <ul>
        <li><a href="./homepage.php">Home</a></li>
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

  <script src="./scripts/index.js"></script>
</body>
</html>