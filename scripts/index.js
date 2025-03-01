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

  window.location.href = "../rivers.html";

});

card2.addEventListener("click" , ()=> {

  window.location.href = "../lakes.html";

});


card3.addEventListener("click" , ()=> {

  window.location.href = "../lagoons.html";

});

card4.addEventListener("click" , ()=> {

  window.location.href = "../Waterfalls.html";

});
