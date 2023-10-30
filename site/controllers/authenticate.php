<?php

require 'functions/connect.php';
require 'functions/queryBuilder.php';
$qb = new QueryBuilder(new Connection());

session_start();

// Checks if all the required login fields are filled in
if ( !isset($_POST['username'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the username and password fields!');
}

// Gets the user id and password from the database if the username exists
$results = $qb->selectCol('pud', 'user_id, loginPass', 'loginUser = "'  . $_POST["username"] . '"');

$_SESSION['method'] = $_POST["method"];

// Checks if the password matches the password in the database and if so, logs the user in (sets the session variables)
if ($results == !NULL) {
    if (password_verify($_POST['password'], $results[0]['loginPass'])){
        // echo "Wachtwoord klopt";
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['name'] = $_POST['username'];
        $_SESSION['id'] = $results[0]['user_id'];
        // echo 'Wachtwoord correct';
        header ('Location: /');
    } else {
        // Sets the error message and redirects to the login page
        // echo "Wachtwoord of gebruikersnaam klopt niet";
        $_SESSION['error'] = TRUE;
        $_SESSION['errorMessage'] = 'Gebruikersnaam of wachtwoord klopt niet';
        header ('Location: '. $_SERVER['HTTP_REFERER']);
    }
} else {
    // Sets the error message and redirects to the login page
    // echo "Wachtwoord of gebruikersnaam klopt niet";
    $_SESSION['error'] = TRUE;
    $_SESSION['errorMessage'] = 'Gebruikersnaam of wachtwoord klopt niet';
    header ('Location: '. $_SERVER['HTTP_REFERER']);
}