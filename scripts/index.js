function toggleMenu() {
  const navMenu = document.getElementById("nav-menu");
  navMenu.classList.toggle("active");
}

function closeMenu(){
  const navMenu = document.getElementById("nav-menu");
  navMenu.classList.remove("active");
}