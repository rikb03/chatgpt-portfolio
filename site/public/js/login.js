const Template_Home = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");

Template_Home.addEventListener("click", mobileMenu);

function mobileMenu() {
    Template_Home.classList.toggle("active");
    navMenu.classList.toggle("active");
}

function showLoginForm() {
    document.getElementById('loginForm').style.display = '';
    document.getElementById('signUpForm').style.display = 'none';
}
function showSignUpForm() {
    document.getElementById('loginForm').style.display = 'none';
    document.getElementById('signUpForm').style.display = '';
}