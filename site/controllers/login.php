<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    // If the user is already logged in redirect to the homepage(Maybe change this to the profile page)
    unset($_SESSION['error']);
    unset($_SESSION['method']);
    header('Location: /');
    exit();
} else {
    // If the user is not logged in show the login page
    require 'views/login.view.php';
    if ($_SESSION['error'] && $_SESSION['method'] == 'login') {
        // If the user is not logged in, but there is an error, show the error message
        // echo 'Wachtwoord of gebruikersnaam klopt niet';
        echo '<script type="text/javascript">error("*'.$_SESSION['errorMessage'].'");</script>';
        session_destroy();
    } elseif ($_SESSION['error'] && $_SESSION['method'] == 'signup') {
        // If the user is not logged in, but there is an error, show the error message
        // echo 'Wachtwoord of gebruikersnaam klopt niet';
        echo '<script type="text/javascript">showSignUpForm(); error("*'.$_SESSION['errorMessage'].'");</script>';
        session_destroy();
    }
}
?>