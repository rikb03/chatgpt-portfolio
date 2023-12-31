<?php
require 'functions/errorMessage.php';
require 'functions/connect.php';
require 'functions/queryBuilder.php';
$qb = new QueryBuilder(new Connection());
session_start();

// Get the password of the specified user from the database and store it as $loginPass
$pud = $qb->selectCol('pud', 'loginPass, user_id', 'loginUser = "'  . $_POST["username"] . '"');
print("<pre>".print_r($pud,true)."</pre>");
if ($pud == NULL){
    // echo "Gebruikersnaam bestaat niet";
    errorMessage('Gebruikersnaam is niet correct');
} else {
    $userid = $pud[0]['user_id'];
    $loginPass = $pud[0]['loginPass'];
    $userMail =$qb->selectCol('user', 'mail', 'id = "' . $userid . '"');
    $mail = $userMail[0]['mail'];
    if ($mail != $_POST['mail']){
        // echo "Mail is niet correct";
        errorMessage('Mail is niet correct');
    }
}

/*  Check if the old password is correct and if the new password is different from the old password
    If both are true update the password in the database and destroy the session
*/
if (!password_verify($_POST['newPassword'], $loginPass)) {
    // echo "Wachtwoord klopt";
    $newPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
    $updateArr = ['loginPass' => $newPassword];
    $update = $qb->update('pud', $updateArr, 'loginUser = "'  . $_POST["username"] . '"');
    // echo "Wachtwoord is veranderd";
    session_destroy();
    $_SESSION['error'] = FALSE;
    header("Location: /login");
} else {
    // echo "Het nieuwe wachtwoord mag niet hetzelfde zijn als het oude wachtwoord";
    errorMessage('Het nieuwe wachtwoord mag niet hetzelfde zijn als het oude wachtwoord');
}