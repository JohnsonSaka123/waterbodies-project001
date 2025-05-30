<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rivers</title>
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

  <section id="hero-section_rivers">
    <h2>Rivers</h2>
    <p>Rivers are bodies of water or natural freshwater stream that flow and usually empty into a larger body of water, such as an ocean, lake, or another river. From their tranquil beginnings to their powerful flow, rivers tell stories of nature's resilience and beauty. Let us cherish and protect these vital waterways for generations to come. A river may run dry before reaching the end of its course if it runs out of water, or only flow during certain seasons.</p>
  </section>

  <section class="featured-rivers">

    <h2>Featured Rivers Of The World:</h2>

    <div class="list-of-rivers">
      <div class="card" id="card-1">
          <img src="./images/The-Nile-Egypt.jpg" alt="Rivers" class="feature-image">
          <h3 class="feature-title">River Nile</h3>
          <p class="feature-descrip">The Nile is the longest river in Africa , World's biggest and among the most magnificent rivers. It is located in northern Africa, stretching 4,132 kilometers, though this has been contested by research suggesting that the Amazon River is slightly longer.
          </p>
          <a href="./river_nile.php"><button type="button" class="feature-btn">Learn More</button></a>
      </div>

      <div class="card" id="card-2">
          <img src="./images/The-Amazon-River-South-America.jpg" alt="Lakes" class="feature-image">
          <h3 class="feature-title">Amazon River</h3>
          <p class="feature-descrip">The Amazon River in South America is the largest river by discharge volume of water in the world, and the longest or second-longest river system in the world, a title which is disputed with the Nile.The Amazon was initially known by Europeans as the Marañón.</p>
          <button type="button" class="feature-btn">Learn More</button>
      </div>

      <div class="card" id="card-3">
          <img src="./images/Mississippi-River-North-America.jpg" alt="Lagoons" class="feature-image">        
          <h3 class="feature-title">Mississipi River</h3>
          <p class="feature-descrip">The Mississippi River is the primary river of the largest drainage basin in the United States. From its traditional source of Lake Itasca in northern Minnesota, it flows generally south for 2,340 miles to the Mississippi River Delta in the Gulf of Mexico.</p>
          <button type="button" class="feature-btn">Learn More</button>
      </div>

      <div class="card" id="card-4">
          <img src="./images/danube-river.jpeg" alt="Waterfalls" class="feature-image">        
          <h3 class="feature-title">The Danube River</h3>
          <p class="feature-descrip">The Danube is the second-longest river in Europe, after the Volga in Russia. It flows through Central and Southeastern Europe, from the Black Forest south into the Black Sea. A large and historically important river, it was once a frontier of the Roman Empire.</p>
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