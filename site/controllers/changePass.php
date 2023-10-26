<?php

require 'functions/connect.php';
require 'functions/queryBuilder.php';
$qb = new QueryBuilder(new Connection());

session_start();

// Get the password of the specified user from the database and store it as $loginPass
$results = $qb->selectCol('pud', 'loginPass', 'loginUser = "'  . $_POST["username"] . '"');
$loginPass = $results[0]['loginPass'];

/*  Check if the old password is correct and if the new password is different from the old password
    If both are true update the password in the database and destroy the session
*/
if (password_verify($_POST['oldPassword'], $loginPass) && $_POST['oldPassword'] != $_POST['newPassword']) {
    // echo "Wachtwoord klopt";
    $newPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
    $updateArr = ['loginPass' => $newPassword];
    $update = $qb->update('pud', $updateArr, 'loginUser = "'  . $_POST["username"] . '"');
    // echo "Wachtwoord is veranderd";
    session_destroy();
    header("Location: /login");
} else {
    header("Location: /changepassword");
    // echo "Wachtwoord is niet veranderd";
}