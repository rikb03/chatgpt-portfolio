<?php
require 'functions/errorMessage.php';
require 'functions/connect.php';
require 'functions/queryBuilder.php';
$qb = new QueryBuilder(new Connection());
session_start();

// Checks if all the required login fields are filled in
if ( !isset($_POST['username'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	errorMessage('Please fill both the username and password fields!');
}

// Gets the user id and password from the database if the username exists
$results = $qb->selectCol('pud', 'user_id, loginPass', 'loginUser = "'  . $_POST["username"] . '"');
$is_admin = $qb->selectCol('user', 'is_admin', 'id = ' . $results[0]['user_id']);
$_SESSION['method'] = $_POST["method"];

// Checks if the password matches the password in the database and if so, logs the user in (sets the session variables)
if ($results == !NULL) {
    if (password_verify($_POST['password'], $results[0]['loginPass'])){
        // echo "Wachtwoord klopt";
        session_regenerate_id();
        $naam = $qb->selectCol('user', 'firstName', 'id = ' . $results[0]['user_id']);
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['naam'] = $naam[0]['firstName'];
        $_SESSION['userid'] = $results[0]['user_id'];
        $_SESSION['isAdmin'] = $is_admin[0]['is_admin'];
        // echo 'Wachtwoord correct';
        $_SESSION['error'] = FALSE;
        header ('Location: /login');
    } else {
        // Sets the error message and redirects to the login page
        // echo "Wachtwoord of gebruikersnaam klopt niet";
        errorMessage('Gebruikersnaam of wachtwoord klopt niet');
    }
} else {
    // Sets the error message and redirects to the login page
    // echo "Wachtwoord of gebruikersnaam klopt niet";
    errorMessage('Gebruikersnaam of wachtwoord klopt niet');
}