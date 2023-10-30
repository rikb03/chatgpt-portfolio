<?php
session_start();
require 'views/login.view.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    // If the user is already logged in redirect to the homepage(Maybe change this to the profile page)
    header('Location: /');
} elseif ($_SESSION['error'] && $_SESSION['method'] == 'login') {
    // If the user is not logged in, but there is an error, show the error message
    // echo 'Wachtwoord of gebruikersnaam klopt niet';
    echo '<script type="text/javascript">errorLogin("*'.$_SESSION['errorMessage'].'");</script>';
    session_destroy();
} elseif ($_SESSION['error'] && $_SESSION['method'] == 'signup') {
    // If the user is not logged in, but there is an error, show the error message
    // echo 'Wachtwoord of gebruikersnaam klopt niet';
    echo '<script type="text/javascript">errorSignup("*'.$_SESSION['errorMessage'].'");</script>';
    session_destroy();
}
?>