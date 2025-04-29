<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lakes</title>
  <link rel="stylesheet" href="./styles/lakesccc.css">
  <link rel="stylesheet" href="./styles/base.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <header>
    <h1 class="logo"><a href="homepage.php">WaterBodies</a></h1>
    <nav id="nav-menu">
      <ul>
        <li><a href="./homepage.php">Home</a></li>
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

  <section id="hero-section_lakes">
    <h2>Lakes</h2>
    <p>There are millions of lakes in the world. They are found on every continent and in every kind of environment in the mountains and deserts, on plains,and near seashores. Lakes are very greatly in size. Some measures only a few square meters and are small enough to fit in your backyard.</p>
  </section>

  <section class="featured-lakes">

    <h2>Featured Rivers Of The World:</h2>

    <div class="list-of-lakes">
      <div class="card" id="card-1">
          <img src="./images/lakes/moraine_lake4.jpg" alt="Rivers" class="feature-image">
          <h3 class="feature-title">Lake Moraine</h3>
          <p class="feature-descrip">Moraine Lake is a snow and glacially fed lake in Banff National Park, 14 kilometres outside the village of Lake Louise, Alberta, Canada.
          </p>
          <a href="./lake_moraine.php"><button type="button" class="feature-btn">Learn More</button></a>
      </div>

      <div class="card" id="card-2">
          <img src="./images/lakes/Lake_Como4.jpeg" alt="Lakes" class="feature-image">
          <h3 class="feature-title">Lake Como</h3>
          <p class="feature-descrip">Lake Como, in Northern Italy’s Lombardy region, is an upscale resort area known for its dramatic scenery, set against the foothills of the Alps.</p>
          <button type="button" class="feature-btn">Learn More</button>
      </div>

      <div class="card" id="card-3">
          <img src="./images/lakes/lake_ohrid5.jpeg" alt="Lagoons" class="feature-image">        
          <h3 class="feature-title">Lake Ohrid</h3>
          <p class="feature-descrip">Lake Ohrid is a lake which straddles the mountainous border between the southwestern part of North Macedonia and eastern Albania.</p>
          <button type="button" class="feature-btn">Learn More</button>
      </div>

      <div class="card" id="card-4">
          <img src="./images/lakes/Lake_Garda6.jpeg" alt="Waterfalls" class="feature-image">        
          <h3 class="feature-title">Lake Garda</h3>
          <p class="feature-descrip"> Lake Garda, in northern Italy, is known for its crystal clear water. At the south end, the town of Sirmione is dominated by the Rocca Scaligera.</p>
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
  
</body>
</html>