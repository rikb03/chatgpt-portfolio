<?php
session_start();
require 'functions/errorMessage.php';
require 'functions/connect.php';
require 'functions/queryBuilder.php';
$qb = new QueryBuilder(new Connection());

// Checks if all the required signup fields are filled in
if ( !isset($_POST['FirstName'], $_POST['LastName'], $_POST['Mail'], $_POST['username'], $_POST['password'], $_POST['passwordConfirm']) ) {
    // echo "Niet alle velden zijn ingevuld";
    errorMessage('Niet alle velden zijn ingevuld');
}

// Tries to find the username in the database
$user = $qb->selectCol('pud', 'loginUser', 'loginUser = "'  . $_POST["username"] . '"');

// If the username is already in the database, redirect to the login page
if ($user == !NULL){
    // echo "Gebruikersnaam bestaat al";
    errorMessage('Gebruikersnaam bestaat al');
} else {
    // If the username is not in the database, check if the passwords match and if so, insert the user data into the database
    if ($_POST['password'] == $_POST['passwordConfirm']){
        try {
            $insertArr = ['firstName' => $_POST['FirstName'], 'lastName' => $_POST['LastName'], 'mail' => $_POST['Mail']];
            $user_id = $qb->insert('user', $insertArr);
            } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            }
        try {
            // Hashes the password and inserts the users password, username and id into the database
            $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $insertArr = ['loginUser' => $_POST['username'], 'loginPass' => $passwordHash, 'user_id' => $user_id];
            $insertPUD = $qb->insert('pud', $insertArr);
            } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            }
        $_SESSION['error'] = FALSE;
        header ('Location: /');
    } else {
        // echo "Wachtwoorden komen niet overeen";
        errorMessage('Wachtwoorden komen niet overeen');
    }
}