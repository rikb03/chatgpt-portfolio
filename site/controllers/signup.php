<?php

require 'functions/db.php';
$db = new db();

// Checks if all the required signup fields are filled in
if ( !isset($_POST['FirstName'], $_POST['LastName'], $_POST['Mail'], $_POST['username'], $_POST['password'], $_POST['passwordConfirm']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the username and password fields!');
}

// Tries to find the username in the database
$sql = "SELECT loginUser FROM pud WHERE loginUser = :username";
$user = $db->SQLReturnResultWithParams($sql, ':username', $_POST['username']);

// If the username is already in the database, redirect to the login page
if ($user == !null){
    // echo "Gebruikersnaam bestaat al";
    header ('Location: /login');
} else {
    // If the username is not in the database, check if the passwords match and if so, insert the user data into the database
    if ($_POST['password'] == $_POST['passwordConfirm']){
        try {
            // Inserts the user data into the database and gets the user id
            $sql = "INSERT INTO user (firstName, lastName, mail) VALUES (:firstName, :lastName, :mail)";
            $conn = $db->SQLConnectDB();
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':firstName', $_POST['FirstName']);
            $stmt->bindParam(':lastName', $_POST['LastName']);
            $stmt->bindParam(':mail', $_POST['Mail']);
            $stmt->execute();
            $user_id = $conn->lastInsertId();
            } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            }
        try {
            // Hashes the password and inserts the users password, username and id into the database
            $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $sql = "INSERT INTO pud (loginUser, loginPass, user_id) VALUES (:loginUser, :loginPass, :user_id)";
            $conn = $db->SQLConnectDB();
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':loginUser', $_POST['username']);
            $stmt->bindParam(':loginPass', $passwordHash);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();
            } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            }
        header ('Location: /');
    } else {
        // echo "Wachtwoorden komen niet overeen";
        header ('Location: /login');
    }
}