<?php

require 'functions/db.php';
$db = new db();

$sql = "SELECT loginPass FROM pud WHERE loginUser = :username";

$results = $db->SQLReturnResultWithParams($sql, ":username", $_POST['username']);
$loginPass = $results[0]['loginPass'];

// Check if the old password is correct and if the new password is different from the old password
if (password_verify($_POST['oldPassword'], $loginPass) && $_POST['oldPassword'] != $_POST['newPassword']) {
    $sql = "UPDATE pud SET loginPass = :newPassword WHERE loginUser = :username";
    $newPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
    $conn = $db->SQLConnectDB();
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':newPassword', $newPassword);
    $stmt->bindParam(':username', $_POST['username']);
    $stmt->execute();
    header("Location: /login");
} else {
    header("Location: /changepassword");
}