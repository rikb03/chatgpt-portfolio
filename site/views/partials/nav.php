<head>
    <link rel="icon" href="../views/partials/favicon.png">
</head>
<header>
    <nav class="navbar">
        <div class="local">
            <h2><a href="/" class="nav-link"><img style="    margin-top: 40px;
    height: 80px;
    width: 120px;" src="../views/partials/img.png" alt="Beschrijvende tekst">
                </a></h2>

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
// Checks if the session is started, if not, start it
if (session_status() != 2) {
    session_start();
}
// If the user is logged in, change the login link to a logout link
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
    echo "<script type='text/javascript'>toggleLoginLink('" . $_SESSION['naam'] . "');</script>";
}
?>
