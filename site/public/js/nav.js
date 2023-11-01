const Template_Home = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");

Template_Home.addEventListener("click", mobileMenu);

function mobileMenu() {
    Template_Home.classList.toggle("active");
    navMenu.classList.toggle("active");
}

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