<?php
session_start();
// If the user is already logged in redirect to the homepage(Maybe change this to the profile page)
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    header('Location: /');
}
require 'views/login.view.php';
?>