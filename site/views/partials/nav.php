<header>
    <nav class="navbar">
        <div class="local">
            <h2><a href="/" class="nav-link">Profile App</a></h2>
        </div>
        <ul class="nav-menu" id="nav-ul">
            <li class="nav-item">
                <a href="/" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
                <a id="LoginLink" href="/login" class="nav-link">Login</a>
            </li>
        </ul>
        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </nav>
    <script src="../public/js/nav.js"></script> 
</header>

<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
    echo "<script type='text/javascript'>toggleLoginLink('".$_SESSION['naam']."');</script>";
}