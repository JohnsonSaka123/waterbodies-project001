<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: index.php'); // Redirect to login page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group 11</title>
    <link rel="stylesheet" href="Home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

    <nav class="navbar">
        <h2 class="logo">
            <img src="Pictures/festival-logo-A28D3A42CD-seeklogo.com.png" alt="logo" class="logo-icon">
            <span class="h2-nav">in Ghana</span>
        </h2>
        <ul class="nav-links">
            <span class="home_1">
                <i class="fas fa-home"></i>
                <li>Home</li>
            </span>
            <li><a href="Lord.php">Lord</a></li>
            <li><a href="Oliver.php">Oliver</a></li>
            <li><a href="Nick.php"> Nick</a></li>
            <li><a href="Contact.php">Contact</a></li>
        </ul>

        <?php
        // Database connection
        $conn = new mysqli("localhost", "root", "", "upload_image");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch the latest uploaded image
        $result = $conn->query("SELECT filename FROM images ORDER BY id DESC LIMIT 1");
        $image = ($result && $result->num_rows > 0) ? $result->fetch_assoc()['filename'] : 'default.jpg';
        $conn->close();
        ?>

        <div class="profile-dropdown">
            <div class="upload" onclick="toggleDropdown()">
                <img id="profileImage" src="uploads/<?php echo $image; ?>" width="40" height="40" alt="Profile">
                <i class="fas fa-caret-down dropdown-arrow"></i>
            </div>
            <div id="profileDropdown" class="dropdown-content">
                <a href="profile.php"><i class="fas fa-user"></i> Edit Profile</a>
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
    </nav>

    <style>
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background-color: #131313;
            color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1000;
        }

        .logo {
            display: flex;
            align-items: center;
            margin: 0;
        }

        .logo-icon {
            height: 40px;
            margin-right: 10px;
        }

        .nav-links {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-links li {
            margin: 0 15px;
        }

        .nav-links a {
            text-decoration: none;
            color: #fff;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #4caf50;
        }

        .profile-dropdown {
            position: relative;
            display: inline-block;
        }

        .upload {
            display: flex;
            align-items: center;
            cursor: pointer;
            padding: 5px;
            border-radius: 50px;
            transition: background-color 0.3s;
        }

        .upload:hover {
            background-color: #f5f5f5;
        }

        #profileImage {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #4caf50;
        }

        .dropdown-arrow {
            margin-left: 8px;
            color: #666;
            transition: transform 0.3s;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: white;
            min-width: 180px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 10px 0;
            z-index: 1001;
            margin-top: 10px;
        }

        .dropdown-content a {
            color: #333;
            padding: 10px 20px;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s;
        }

        .dropdown-content a:hover {
            background-color: #f5f5f5;
            color: #4caf50;
        }

        .dropdown-content i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .show {
            display: block;
            animation: fadeIn 0.3s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .rotate {
            transform: rotate(180deg);
        }
    </style>

    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById("profileDropdown");
            const arrow = document.querySelector('.dropdown-arrow');

            dropdown.classList.toggle("show");
            arrow.classList.toggle("rotate");
        }

        // Close dropdown when clicking outside
        window.addEventListener('click', function(event) {
            const dropdown = document.getElementById("profileDropdown");
            const profileElement = document.querySelector('.profile-dropdown');

            if (!profileElement.contains(event.target)) {
                dropdown.classList.remove("show");
                document.querySelector('.dropdown-arrow').classList.remove("rotate");
            }
        });
    </script>




    <style>
        .slider-container {
            width: 50%;
            height: 60vh;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            transform: translateY(10px);
            margin-top: 20px;

            /* position: relative; */
            /* display: flex; */

        }

        .slider img {
            width: 50%;
            /* Ensures each image takes up its full container */
            height: 80vh;
            object-fit: cover;
            flex: 0 0 100%;
            /* Ensures each image does not shrink or grow */
        }

        .slider {
            display: flex;
            width: 100%;
            /* Ensure it’s exactly 100% * number of images */
            transition: transform 0.6s ease-in-out;
        }

        .dots {
            position: absolute;
            bottom: 20px;
            left: 60%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
        }

        .dot {
            width: 12px;
            height: 12px;
            background: #ccc;
            border-radius: 50%;
            cursor: pointer;
            transition: background 0.3s;
        }

        .dot.active {
            background: #4caf50;
        }
    </style>

    <section class="welcome">


        <div class="content">
            <div class="search">
                <h1 id="main_header">Hi, Everyone!</h1>

                <div style="max-width: 600px; margin: 20px auto; position: relative;">
                    <div style="display: flex; gap: 8px;">
                        <input type="text" id="festivalSearch" placeholder="Search festival..."
                            style="flex: 1; padding: 10px; font-size: 16px; border: 1px solid #ddd; border-radius: 4px;">
                        <button id="searchButton" style="padding: 0 20px; background: #4caf50; color: white; border: none; border-radius: 4px; cursor: pointer;">
                            Search
                        </button>
                    </div>
                    <div id="searchResults" style="margin-top: 10px; border: 1px solid #eee; border-radius: 4px; max-height: 300px; overflow-y: auto; display: none;"></div>
                    <div id="searchResultsInfo" style="margin-top: 5px; font-size: 14px; color: #666;"></div>
                </div>

                <style>
                    /* Extended zoom animation (10 seconds) */
                    .zoom-highlight {
                        animation: zoomInOut 10s ease-in-out;
                        transform-origin: center;
                        border: 2px solid #4caf50 !important;
                        border-radius: 8px !important;
                        box-shadow: 0 0 15px rgba(76, 175, 80, 0.3) !important;
                    }

                    @keyframes zoomInOut {
                        0% {
                            transform: scale(1);
                        }

                        10% {
                            transform: scale(1.05);
                        }

                        20% {
                            transform: scale(1);
                        }

                        30% {
                            transform: scale(1.05);
                        }

                        40% {
                            transform: scale(1);
                        }

                        50% {
                            transform: scale(1.05);
                        }

                        60% {
                            transform: scale(1);
                        }

                        70% {
                            transform: scale(1.05);
                        }

                        80% {
                            transform: scale(1);
                        }

                        90% {
                            transform: scale(1.05);
                        }

                        100% {
                            transform: scale(1);
                        }
                    }
                </style>

                <script>
                    // List of available festivals with their container classes
                    const festivalData = [{
                            name: "Aboakyer Festival",
                            containerClass: "a"
                        },
                        {
                            name: "Ngmayem Festival",
                            containerClass: "b"
                        },
                        {
                            name: "Damba Festival",
                            containerClass: "c"
                        },
                        {
                            name: "Homowo Festival",
                            containerClass: "f"
                        },
                        {
                            name: "Kundum Festival",
                            containerClass: "g"
                        },
                        {
                            name: "Fetu Afahye Festival",
                            containerClass: "h"
                        },
                        {
                            name: "Asafotu Fiam Festival",
                            containerClass: "d"
                        },
                        {
                            name: "Odambea Festival",
                            containerClass: "e"
                        },
                        {
                            name: "Hogbetsotso Festival",
                            containerClass: "j"
                        }
                    ];

                    // Get DOM elements
                    const searchInput = document.getElementById('festivalSearch');
                    const resultsContainer = document.getElementById('searchResults');
                    const searchButton = document.getElementById('searchButton');
                    const searchResultsInfo = document.getElementById('searchResultsInfo');
                    let lastSelectedFestival = null;
                    let currentZoomElement = null;
                    let zoomTimeout = null;

                    // Function to display search results
                    function displayResults(results, searchTerm = '') {
                        if (results.length === 0) {
                            resultsContainer.innerHTML = '<div style="padding: 10px; color: #666;">No festivals found</div>';
                            resultsContainer.style.display = 'block';
                            searchResultsInfo.textContent = '';
                            return;
                        }

                        resultsContainer.innerHTML = results.map(festival => `
            <div class="result-item" 
                 data-festival="${festival.name}"
                 data-container="${festival.containerClass}"
                 style="padding: 10px; border-bottom: 1px solid #eee; cursor: pointer; transition: all 0.2s;"
                 onmouseover="this.style.background='#f5f5f5'" 
                 onmouseout="this.style.background=this.classList.contains('selected')?'#e6f2ff':'white'">
                ${highlightMatch(festival.name, searchTerm)}
            </div>
        `).join('');

                        resultsContainer.style.display = 'block';
                        searchResultsInfo.innerHTML = `Found ${results.length} matching festival(s). <button id="resetSearch" style="background: none; border: none; color: #4caf50; cursor: pointer; text-decoration: underline;">Reset search</button>`;

                        document.getElementById('resetSearch').addEventListener('click', function() {
                            searchInput.value = '';
                            resultsContainer.style.display = 'none';
                            searchResultsInfo.textContent = '';
                            resetHighlights();
                        });
                    }

                    // Function to highlight matching text
                    function highlightMatch(text, searchTerm) {
                        if (!searchTerm) return text;
                        const regex = new RegExp(`(${escapeRegExp(searchTerm)})`, 'gi');
                        return text.replace(regex, '<span style="background-color: yellow;">$1</span>');
                    }

                    // Helper function to escape regex special characters
                    function escapeRegExp(string) {
                        return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
                    }

                    // Function to select a festival and apply extended zoom effect
                    function selectFestival(festivalName, containerClass) {
                        lastSelectedFestival = festivalName;

                        // Remove previous highlights and zoom effects
                        resetHighlights();

                        // Clear any pending timeout
                        if (zoomTimeout) {
                            clearTimeout(zoomTimeout);
                            zoomTimeout = null;
                        }

                        // Find the festival container
                        const festivalContainer = document.querySelector(`.${containerClass}`);
                        if (festivalContainer) {
                            // Remove any existing zoom class
                            if (currentZoomElement) {
                                currentZoomElement.classList.remove('zoom-highlight');
                            }

                            // Add zoom effect
                            festivalContainer.classList.add('zoom-highlight');
                            currentZoomElement = festivalContainer;

                            // Remove the class after animation completes (10 seconds)
                            zoomTimeout = setTimeout(() => {
                                festivalContainer.classList.remove('zoom-highlight');
                            }, 10000);

                            // Scroll to the festival
                            setTimeout(() => {
                                festivalContainer.scrollIntoView({
                                    behavior: 'smooth',
                                    block: 'center'
                                });
                            }, 100);
                        }

                        // Close the results dropdown
                        resultsContainer.style.display = 'none';
                    }

                    // Function to reset all highlights
                    function resetHighlights() {
                        // Clear any pending timeout
                        if (zoomTimeout) {
                            clearTimeout(zoomTimeout);
                            zoomTimeout = null;
                        }

                        festivalData.forEach(festival => {
                            const container = document.querySelector(`.${festival.containerClass}`);
                            if (container) {
                                container.style.border = '';
                                container.style.borderRadius = '';
                                container.style.padding = '';
                                container.classList.remove('zoom-highlight');
                            }
                        });
                        currentZoomElement = null;
                    }

                    // Function to perform search
                    function performSearch() {
                        const searchTerm = searchInput.value.toLowerCase();

                        if (searchTerm.length === 0) {
                            resultsContainer.style.display = 'none';
                            searchResultsInfo.textContent = '';
                            resetHighlights();
                            return;
                        }

                        const matchedFestivals = festivalData.filter(festival =>
                            festival.name.toLowerCase().includes(searchTerm)
                        );

                        displayResults(matchedFestivals, searchTerm);
                    }

                    // Event listeners
                    let searchTimeout;
                    searchInput.addEventListener('input', function() {
                        clearTimeout(searchTimeout);
                        searchTimeout = setTimeout(performSearch, 300); // Debounce 300ms
                    });

                    searchButton.addEventListener('click', function() {
                        clearTimeout(searchTimeout);
                        performSearch();
                    });

                    // Handle clicking on results
                    resultsContainer.addEventListener('click', function(e) {
                        const item = e.target.closest('.result-item');
                        if (item) {
                            selectFestival(item.dataset.festival, item.dataset.container);
                        }
                    });

                    // Close results when clicking outside
                    document.addEventListener('click', function(e) {
                        if (!searchInput.contains(e.target) && !resultsContainer.contains(e.target) && e.target !== searchButton) {
                            resultsContainer.style.display = 'none';
                        }
                    });

                    // Also search when pressing Enter
                    searchInput.addEventListener('keypress', function(e) {
                        if (e.key === 'Enter') {
                            clearTimeout(searchTimeout);
                            performSearch();
                        }
                    });
                </script>
            </div>
            <div class="video">
                <video autoplay="autoplay" controls="controls" width="600" height="430"
                    src="Pictures/Untitled video - Made with Clipchamp.mp4" type="video/mp4"></video>
                <div class="slider-container">
                    <div class="slider">
                        <img src="Pictures/marquee/three-women-colorful-traditional-dress-dancing-hogbetsotso-festival-ghana-women-colorful-traditional-dress-261372873.jpg" alt="">
                        <img src="Pictures/marquee/marquee-2.jpg" alt="">
                        <img src="Pictures/marquee/marquee 3.jpg" alt="">
                        <img src="Pictures/marquee/marquee 4.jpg" alt="">
                        <img src="Pictures/marquee/marquee 5.jpg" alt="">
                        <img src="Pictures/marquee/marquee-6.jpg" alt="">
                    </div>
                    <div class="dots">
                        <span class="dot active" onclick="changeSlide(0)"></span>
                        <span class="dot" onclick="changeSlide(1)"></span>
                        <span class="dot" onclick="changeSlide(2)"></span>
                        <span class="dot" onclick="changeSlide(3)"></span>
                        <span class="dot" onclick="changeSlide(4)"></span>
                        <span class="dot" onclick="changeSlide(5)"></span>

                    </div>
                </div>
            </div>
            <script>
                const slider = document.querySelector(".slider");
                const slides = document.querySelectorAll(".slider img");
                const dots = document.querySelectorAll(".dot");
                let currentIndex = 0;
                const totalSlides = slides.length;

                function moveSlide(index) {
                    if (index >= totalSlides) {
                        index = 0; // Reset to first image
                    } else if (index < 0) {
                        index = totalSlides - 1; // Go to last image
                    }

                    // Ensure consistent movement
                    slider.style.transition = "transform 0.6s ease-in-out";
                    slider.style.transform = `translateX(-${index * 100}%)`;

                    currentIndex = index;
                    updateDots();
                }

                function updateDots() {
                    dots.forEach((dot, i) => {
                        dot.classList.toggle("active", i === currentIndex);
                    });
                }

                // Auto slide every 3 seconds
                setInterval(() => {
                    moveSlide(currentIndex + 1);
                }, 3000);

                // Click event for dots
                dots.forEach((dot, i) => {
                    dot.addEventListener("click", () => moveSlide(i));
                });
            </script>
            <h3>We are group eleven and we're presenting on festivals in Ghana.</h3>
            <p>Festivals are colorful days of celebration in Ghana, <br>cultural festivals are a vibrant part of life and heritage of hearty Ghanaians. <br> <span class="hidden-text">
                    All year long, festivals and durbars are held in various parts of the country <br>to celebrate the heritage of the people.
                    These festivals and durbars are held in <br>various parts of the country to mark cultural new years,
                    celebrate reunion of families <br>and friends, development purposes and also strengthen the tenets of society. </span>
                <button class="read-more-btn">...Read More</button>
            </p>
            <br>
        </div>

    </section>


    <section class="main">

        <div class="fest_1">

            <div class="a">
                <img src="Pictures/Aboakyir-festival.jpeg" alt="" width="440px" height="300px" class="hidden">
                <p>
                    <strong>Aboakyer (Deer Hunt) Festival:</strong> “Aboakyer” literally,<span class="hidden-text"> means “game hunting”. This popular festival is celebrated on the first Saturday of May by the chiefs and people of Winneba.
                        The festival begins with a competitive hunt between 2 traditional warrior groups in a nearby game reserve, where each tries to catch an antelope live.
                        It is an adventurous event to test the strength, bravery, determination, and intuition of the 2 rival groups.</span>
                    <button class="read-more-btn">...Read More</button>
                </p>

            </div>

            <div class="b">

                <img src="Pictures/Ngmayem-festival.jpg" alt="" width="440px" height="300px" class="hidden">
                <p><strong>Ngmayem Festival: </strong>This is the annual traditional<span class="hidden-text"> harvest and thanksgiving festival of the Krobo people.
                        It is celebrated in September by the people of Manya Krobo in the towns of Odumase-Krobo in the Eastern Region.</span>
                    <button class="read-more-btn">...Read More</button>
                </p>

            </div>

            <div class="c">

                <img src="Pictures/damba-festival.jpg" alt="" width="440px" height="300px" class="hidden">
                <p>
                    <strong>Damba Festival:</strong> Damba is celebrated to<span class="hidden-text"> mark the birth and naming of the Holy prophet, Muhammad, but the main purpose of the celebration is a glorification of the chieftaincy,
                        not specific Islamic motifs.The festival is categorized into three sessions; the Somo Damba, the Naa Damba and the Belkulsi.
                        The Damba festival is celebrated by the chiefs and people of the Northern, Savanna, North East and Upper West Regions of Ghana.
                        This festival is celebrated in the Dagomba lunar month of Damba, corresponding to the third month of the Islamic calendar, Rabia al-Awwal.</span>
                    <button class="read-more-btn">Read More</button>
                </p>

            </div>

        </div>

        <div class="fest_2">

            <div class="f">
                <img src="Pictures/homowo.jpg" alt="" width="440px" height="300px" class="hidden">
                <p>
                    <strong>Homowo Festival:</strong> This is a harvest festival celebrated by<span class="hidden-text"> the people of the Ga Traditional Area, in the Greater Accra Region.
                        It originated from a period of great famine which was eventually followed by a bumper harvest in grain and fish. Thus, the word “Homowo”, literally means “hooting at hunger”.
                        The main highlight of this month-long festival is the special dish prepared from ground corn, steamed and mixed with palm oil and eaten with palmnut soup. </span>
                    <button class="read-more-btn">...Read More</button>
                </p>
            </div>

            <div class="g">
                <img src="Pictures/Kundum-festival.jpg" alt="" width="440px" height="300px" class="hidden">
                <p>
                    <strong>Kundum Festival:</strong> Kundum is celebrated from August<span class="hidden-text"> to November by the Western Region’s coastal tribes, the Ahantas and Nzemas.
                        Beginning in August, the festival moves west from Takoradi to town after town at weekly intervals.
                        Rituals include purification of the stools and prayers to the ancestors for a good harvest. Traditional drumming and dancing feature prominently. </span>
                    <button class="read-more-btn">..Read More</button>
                </p>
            </div>

            <div class="h">
                <img src="Pictures/Fetu-Afahye-festival.jpg" alt="" width="440px" height="300px" class="hidden">
                <p>
                    <strong>Fetu Afahye Festival:</strong> It is celebrated annually<span class="hidden-text"> on the first Saturday of September by communities in the Cape Coast Traditional Area (Fetu).
                        It is characterized by a durbar of chiefs and processions of “Asafo Companies” (traditional warrior groups) and numerous social organisations.
                        Every member of the group is adorned in rich and colourful clothes, thus creating the grandeur of this festival which literally means “adorning of new clothes”.
                        A procession of the “7 Asafo Companies” in their unique costumes depicts a fusion of the “Fante” and European cultures, (typically, Portuguese, Dutch, Swedish and British),
                        which have been sustained over many centuries. Customary rites include the slaughter of a cow to the 77 Deities in the area to obtain their blessings.</span>
                    <button class="read-more-btn">...Read More</button>
                </p>
            </div>

        </div>

        <div class="fest_3">

            <div class="d">

                <img src="Pictures/Asafotu-Fiam-festival.jpg" alt="" width="440px" height="300px" class="hidden">
                <p>
                    <strong>Asafotu-Fiam Festival:</strong> “Asafotufiam” is an <span class="hidden-text">annual warrior’s festival celebrated by the people of Ada, in the Greater Accra Region from the last Thursday of July to the first
                        weekend of August. <br> It commemorates the victories of the warriors in battle and those who fell on the battlefield.
                        To re-enact these historic events, the “warrior” dresses in traditional battle dress and stage a mock battle. This is also a time when the young men are introduced to warfare.
                        The festival also ushers in the harvest cycle, for this special customs and ceremonies are performed.</span>
                    <button class="read-more-btn">...Read More</button>
                </p>

            </div>

            <div class="e">

                <img src="Pictures/odambea-festival.jpg" alt="" width="440px" height="300px" class="hidden">

                <p>
                    <strong>Odambea Festival:</strong>“Odambea” is celebrated on the<span class="hidden-text"> last Saturday of August by the “Nkusukum” chiefs and people of the Saltpond Traditional Area.
                        This event commemorates the migration of the “Nkusukum” people centuries ago from Techiman (500km away) to their present settlement. “Odambea” means “fortified link”,
                        a name resulting from the role played by the “Nkusukum” people in keeping the migrant groups in touch with each other following their exodus from Techiman.
                        A special feature of the festival is the re-enactment of the ancient life styles of the people, which will provide you with a unique opportunity to learn more about how they migrated.</span>
                    <button class="read-more-btn">...Read More</button>
                </p>

            </div>

            <div class="j">
                <img src="Pictures/Hogbetsotso-Festival.jpg" alt="" width="440px" height="300px" class="hidden">
                <p>
                    <strong>Hogbetsotso Festival:</strong> The “Anlo Ewes”, an ethnic group<span class="hidden-text"> on the eastern cost (Volta Region) of Ghana, are believed to have settled in Notsie in
                        Togo when they first migrated from Southern Sudan.
                        Legend has it that they escaped from the tyrannical ruler of Notsie, Ago-Koli, by walking backwards. In order to commemorate the exodus and the bravery of their traditional rulers who led them on the journey, the people created this annual “Festival of the Exodus”. There are many ceremonies associated with the festival, including a peace-making period where all outstanding problems are supposed to be resolved. </span>
                    <button class="read-more-btn">..Read More</button>
                </p>
            </div>

        </div>
        <div class="google-map">
            <h3>Explore Our Locations</h3>
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63557.30417285802!2d-0.7029391891479178!3d5.366301984870348!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfde34e8ffe3e31b%3A0x4a1a58fce2485ac9!2sWinneba!5e0!3m2!1sen!2sgh!4v1741446436838!5m2!1sen!2sgh" width="1340" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>

    <!-- <marquee behavior="" direction="" scrollamount="12">
        <h1>Group members: Lord Akorli, Oliver Arhin, Tawiah Nicholas Tetteh</h1>
    </marquee> -->

    <footer>
        Copyright &copy; 2025 | Powered by Group Eleven(11)
    </footer>

    <script>
        const text = "Hi, Everyone!"; // Text to type
        const speed = 100; // Typing speed (milliseconds)
        const delay = 1000; // Delay before restarting (1 second)
        let index = 0;
        const mainHeader = document.getElementById("main_header");

        // Clear the text initially
        mainHeader.innerHTML = "";

        // Function for auto-typing effect
        function typeEffect() {
            if (index < text.length) {
                mainHeader.innerHTML += text.charAt(index);
                index++;
                setTimeout(typeEffect, speed);
            } else {
                setTimeout(() => {
                    mainHeader.innerHTML = ""; // Clear text
                    index = 0; // Reset index
                    typeEffect(); // Restart typing effect
                }, delay);
            }
        }

        // Start typing when the page loads
        window.onload = typeEffect;

        document.addEventListener("DOMContentLoaded", function() {
            const buttons = document.querySelectorAll(".read-more-btn");

            buttons.forEach(button => {
                button.addEventListener("click", function() {
                    const hiddenText = this.previousElementSibling; // Get the hidden text before the button
                    if (hiddenText.style.display === "none" || hiddenText.style.display === "") {
                        hiddenText.style.display = "inline";
                        this.textContent = "Read Less"; // Change button text
                    } else {
                        hiddenText.style.display = "none";
                        this.textContent = "Read More";
                    }
                });
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            const images = document.querySelectorAll(".hidden");

            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("show");
                    }
                });
            }, {
                threshold: 0.3
            });

            images.forEach(img => observer.observe(img));
        });
    </script>

</body>

</html>