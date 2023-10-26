<?php

require 'functions/db.php';
$db = new db();
session_start();

// Get the password of the specified user from the database and store it as $loginPass
$sql = "SELECT loginPass FROM pud WHERE loginUser = :username";
$results = $db->SQLReturnResultWithParams($sql, ":username", $_POST['username']);
$loginPass = $results[0]['loginPass'];

/*  Check if the old password is correct and if the new password is different from the old password
    If both are true update the password in the database and destroy the session
*/
if (password_verify($_POST['oldPassword'], $loginPass) && $_POST['oldPassword'] != $_POST['newPassword']) {
    $sql = "UPDATE pud SET loginPass = :newPassword WHERE loginUser = :username";
    $newPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
    $conn = $db->SQLConnectDB();
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':newPassword', $newPassword);
    $stmt->bindParam(':username', $_POST['username']);
    $stmt->execute();
    session_destroy();
    header("Location: /login");
} else {
    header("Location: /changepassword");
}