// JavaScript for the profile dropdown menu
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

function toggleNav() {
  const navMenu = document.getElementById("nav-menu");
  navMenu.classList.toggle("active");
}

function closeNav() {
  const navMenu = document.getElementById("nav-menu");
  navMenu.classList.remove("active");
}

// Event listeners for cards
const card1 = document.getElementById("card-1");
const card2 = document.getElementById("card-2");
const card3 = document.getElementById("card-3");
const card4 = document.getElementById("card-4");

if (card1) {
  card1.addEventListener("click", () => {
    window.location.href = "./rivers.php";
  });
}

if (card2) {
  card2.addEventListener("click", () => {
    window.location.href = "../lakes.php";
  });
}

if (card3) {
  card3.addEventListener("click", () => {
    window.location.href = "../lagoons.php";
  });
}

if (card4) {
  card4.addEventListener("click", () => {
    window.location.href = "../Waterfalls.php";
  });
}

// Search functionality
document.addEventListener("DOMContentLoaded", function () {
  const searchInput = document.querySelector("input[name='query']");
  
  if (searchInput) {
    searchInput.addEventListener("keyup", function () {
      const query = this.value.trim();
      
      if (query.length > 2) { // Start searching after 3 characters
        fetch(`search.php?query=${query}`)
          .then(response => response.text())
          .then(data => {
            document.getElementById("search-results").innerHTML = data;
          });
      } else {
        document.getElementById("search-results").innerHTML = ''; // Clear results if query is too short
      }
    });
  }
});