<?php
session_start();
require 'functions/connect.php';
require 'functions/queryBuilder.php';
$qb = new QueryBuilder(new Connection());

// Checks if all the required signup fields are filled in
if ( !isset($_POST['FirstName'], $_POST['LastName'], $_POST['Mail'], $_POST['username'], $_POST['password'], $_POST['passwordConfirm']) ) {
	//Could not get the data that should have been sent.
    // Sets the error message and redirects to the login page
    $_SESSION['error'] = TRUE;
    $_SESSION['errorMessage'] = 'Niet alle velden zijn ingevuld';
    header ('Location: '. $_SERVER['HTTP_REFERER']);
}

// Tries to find the username in the database
$user = $qb->selectCol('pud', 'loginUser', 'loginUser = "'  . $_POST["username"] . '"');

// Sets the method which is used on the login page
$_SESSION['method'] = $_POST["method"];

// If the username is already in the database, redirect to the login page
if ($user == !NULL){
    // Sets the error message and redirects to the login page
    // echo "Gebruikersnaam bestaat al";
    $_SESSION['error'] = TRUE;
    $_SESSION['errorMessage'] = 'Gebruikersnaam bestaat al';
    header ('Location: '. $_SERVER['HTTP_REFERER']);
} else {
    // If the username is not in the database, check if the passwords match and if so, insert the user data into the database
    if ($_POST['password'] == $_POST['passwordConfirm']){
        try {
            $insertArr = ['firstName' => $_POST['FirstName'], 'lastName' => $_POST['LastName'], 'mail' => $_POST['Mail']];
            $insertUser = $qb->insert('user', $insertArr);
            echo "New record in user created successfully.";
            } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            }
        try {
            // Hashes the password and inserts the users password, username and id into the database
            $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $insertArr = ['loginUser' => $_POST['username'], 'loginPass' => $passwordHash, 'user_id' => $user_id];
            $insertPUD = $qb->insert('pud', $insertArr);
            echo "New record in pud created successfully.";
            } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            }
        // header ('Location: /');
    } else {
        // Sets the error message and redirects to the login page
        // echo "Wachtwoorden komen niet overeen";
        $_SESSION['error'] = TRUE;
        $_SESSION['errorMessage'] = 'Wachtwoorden komen niet overeen';
        header ('Location: '. $_SERVER['HTTP_REFERER']);
    }
}