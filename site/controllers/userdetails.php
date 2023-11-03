<?php
session_start();
// print("<pre>".print_r($_SESSION,true)."</pre>");
require 'functions/errorMessage.php';
require 'functions/connect.php';
require 'functions/queryBuilder.php';
$qb = new QueryBuilder(new Connection());

if (!isset($_SESSION['loggedin'])) {
    $_POST['method'] = 'edit';
    errorMessage("You are not logged in", 'login');
}
//start code om één gebruiker op te halen

$currentUser = $qb->select('user', 'id='.$_SESSION['userid']);

// Controleer of de gebruikersnaam is opgeslagen in de sessie
// print("<pre>".print_r($currentUser,true)."</pre>");

//einde code om één gebruiker op te halen

require 'views/userdetails.view.php';

if (isset($_SESSION['error']) && $_SESSION['error']) {
    // If there is an error, show the error message based on the method
    switch ($_SESSION['method']) {
        case "upload":
            echo '<script type="text/javascript">error("*'.$_SESSION['errorMessage'].'", "errorUpload");</script>';
            break;
        case "userData":
            echo '<script type="text/javascript">error("*'.$_SESSION['errorMessage'].'", "errorUserData");</script>';
            break;
        case "certificate":
            echo '<script type="text/javascript">error("*'.$_SESSION['errorMessage'].'", "errorCertificate");</script>';
            break;
        case "experience":
            echo '<script type="text/javascript">error("*'.$_SESSION['errorMessage'].'", "errorExperience");</script>';
            break;
        case "hobbies":
            echo '<script type="text/javascript">error("*'.$_SESSION['errorMessage'].'", "errorHobbies");</script>';
            break;
        default:
            break;
    }
    unset ($_SESSION['error']);
    unset ($_SESSION['errorMessage']);
    unset ($_SESSION['method']);
}
?>