// Select DOM Items
const menuBtn = document.querySelector('.menu-btn');
const menu = document.querySelector('.menu');
const menuNav = document.querySelector('.menu-nav');
const menuBranding = document.querySelector('.menu-branding');
const navItems = document.querySelectorAll('.nav-item');

// Set Initial State Of Menu
let showMenu = false;

menuBtn.addEventListener('click', toggleMenu);

function toggleMenu() {
  if (!showMenu) {
    menuBtn.classList.add('close');
    menu.classList.add('show');
    menuNav.classList.add('show');
    menuBranding.classList.add('show');
    navItems.forEach(item => item.classList.add('show'));
   
    // Set Menu State
    showMenu = true;
  } else {
    menuBtn.classList.remove('close');
    menu.classList.remove('show');
    menuNav.classList.remove('show');
    menuBranding.classList.remove('show');
    navItems.forEach(item => item.classList.remove('show'));
    // Set Menu State
    showMenu = false;
  }
}
function myFunction(){
  menuBtn.classList.remove('close');
    menu.classList.remove('show');
    menuNav.classList.remove('show');
    menuBranding.classList.remove('show');
    navItems.forEach(item => item.classList.remove('show'));
    // Set Menu State
    showMenu = false;
}
function showProject(s1,h1,h2,h3,h4){
  document.getElementById(s1).className = "show";
  document.getElementById(h1).className = "hide";
  document.getElementById(h2).className = "hide";
  document.getElementById(h3).className = "hide";
  document.getElementById(h4).className = "hide";
  showTab(s1+"1",h1+'1',h2+'1',h3+'1',h4+'1');
}

function showTab(s1,h1,h2,h3,h4){
  document.getElementById(s1).className = "activeBar";
  document.getElementById(h1).className = "not_activeBar";
  document.getElementById(h2).className = "not_activeBar";
  document.getElementById(h3).className = "not_activeBar";
  document.getElementById(h4).className = "not_activeBar";
}

// LOADER

window.addEventListener('load',function(){
  document.querySelector('.preloader').style.display="none";
})