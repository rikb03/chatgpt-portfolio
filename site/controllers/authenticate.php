<?php

require 'functions/db.php';
$db = new db();

session_start();

// Checks if all the required login fields are filled in
if ( !isset($_POST['username'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the username and password fields!');
}

// Gets the user id and password from the database if the username exists
$sql = "SELECT user_id, loginPass FROM pud WHERE loginUser = :username";
$results = $db->SQLReturnResultWithParams($sql, ":username", $_POST['username']);

// Checks if the password matches the password in the database and if so, logs the user in (sets the session variables)
if ($results == !NULL) {
    if (password_verify($_POST['password'], $results[0]['loginPass'])){
        echo "Wachtwoord klopt";
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['name'] = $_POST['username'];
        $_SESSION['id'] = $results[0]['user_id'];
        header ('Location: /');
    } else {
        echo "Wachtwoord of gebruikersnaam klopt niet";
        header ('Location: /login');
    }
} else {
    echo "Wachtwoord of gebruikersnaam klopt niet";
    header ('Location: /login');
}