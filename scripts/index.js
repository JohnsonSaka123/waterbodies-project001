function toggleMenu() {
  const navMenu = document.getElementById("nav-menu");
  navMenu.classList.toggle("active");
}

function closeMenu(){
  const navMenu = document.getElementById("nav-menu");
  navMenu.classList.remove("active");
}


const card1 = document.getElementById("card-1");
const card2 = document.getElementById("card-2");
const card3 = document.getElementById("card-3");
const card4 = document.getElementById("card-4");

card1.addEventListener("click" , ()=> {

  window.location.href = "../rivers.php";

});

card2.addEventListener("click" , ()=> {

  window.location.href = "../lakes.php";

});


card3.addEventListener("click" , ()=> {

  window.location.href = "../lagoons.php";

});

card4.addEventListener("click" , ()=> {

  window.location.href = "../Waterfalls.php";

});

document.addEventListener("DOMContentLoaded", function () {
  const searchInput = document.querySelector("input[name='query']");
  
  searchInput.addEventListener("keyup", function () {
      const query = this.value.trim();
      
      if (query.length > 2) { // Start searching after 3 characters
          fetch(`search.php?query=${query}`)
              .then(response => response.text())
              .then(data => {
                  document.getElementById("search-results").innerHTML = data;
              });
      }
  });
});
