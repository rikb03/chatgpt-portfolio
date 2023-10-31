<?php
echo "<h1> Alleen een admin hoort dit te kunnen zien </h1>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../public/styles/admin.css" type="text/css">
</head>
<body>

<div class="container">
    <header>
        <nav class="navbar">
            <div class="local">
                <h2>Profile App</h2>
            </div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Login</a>
                </li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>
    <main>
        <div class="users">
            <h1>Admin</h1>
            <section>
                <h3>Users list</h3>
                <input type="text" placeholder=" Search " name="search" class="search">
                <div class="list-container">
                <ul class="horizontal-list">
                    <li>
                        <img src="avatar.png" alt="avatar">
                        <h2>Voornaam Achternaam</h2>
                        <a href="#"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, repellendus.</p></a>
                    </li>
                    <li>
                        <img src="avatar.png" alt="avatar">
                        <h2>Voornaam Achternaam</h2>
                        <a href="#"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, repellendus.</p></a>
                    </li>
                    <li>
                        <img src="avatar.png" alt="avatar">
                        <h2>Voornaam Achternaam</h2>
                        <a href="#"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, repellendus.</p></a>
                    </li>
                    <li>
                        <img src="avatar.png" alt="avatar">
                        <h2>Voornaam Achternaam</h2>
                        <a href="#"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, repellendus.</p></a>
                    </li>
                    <li>
                        <img src="avatar.png" alt="avatar">
                        <h2>Voornaam Achternaam</h2>
                        <a href="#"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, repellendus.</p></a>
                    </li>
                    <li>
                        <img src="avatar.png" alt="avatar">
                        <h2>Voornaam Achternaam</h2>
                        <a href="#"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, repellendus.</p></a>
                    </li>
                    <li>
                        <img src="avatar.png" alt="avatar">
                        <h2>Voornaam Achternaam</h2>
                        <a href="#"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, repellendus.</p></a>
                    </li>
                    <li>
                        <img src="avatar.png" alt="avatar">
                        <h2>Voornaam Achternaam</h2>
                        <a href="#"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, repellendus.</p></a>
                    </li>
                </ul>
                </div>
            </section>
        </div>
    </main>
</div>
<script>
    const Template_Home = document.querySelector(".hamburger");
    const navMenu = document.querySelector(".nav-menu");

    Template_Home.addEventListener("click", mobileMenu);

    function mobileMenu() {
        Template_Home.classList.toggle("active");
        navMenu.classList.toggle("active");
    }
</script>
</body>
</html>

