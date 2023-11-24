// This is used in the nav bar to toggle the hamburger menu and to change the login link to a logout link if the user is logged in
// Selects the hamburger menu and the nav menu classes
const Template_Home = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");

// Listens for a click on the hamburger menu and toggles the nav menu class
Template_Home.addEventListener("click", mobileMenu);

// Sets the nav menu and hamburger class to active
function mobileMenu() {
    Template_Home.classList.toggle("active");
    navMenu.classList.toggle("active");
}

// If the user is logged in, change the login link to a logout link in the hamburger menu
function toggleLoginLink(naam){
    const loginLink = document.getElementById("LoginLink");

    if (loginLink.textContent === "Login"){
        loginLink.textContent = "Logout";
        loginLink.href = "/logout";
        const li = document.createElement("li");
        li.classList.add("nav-item");
        li.innerHTML = '<a id="name" href="/edit" class="nav-link">' + naam + '</a>';
        document.getElementById('nav-ul').appendChild(li);
    }
}