<?php

require 'views/userdetails.view.php';
require 'functions/errorMessage.php';
require 'functions/connect.php';
require 'functions/queryBuilder.php';

$qb = new QueryBuilder(new Connection());

//start code om één gebruiker op te halen


// Controleer of de gebruikersnaam is opgeslagen in de sessie






//einde code om één gebruiker op te halen



//if (empty($_SESSION["naam"])) {
//    header("location: index.php");
//}

if (empty($_SESSION['loggedin'])) {
    // If there is an error, show the error message
    echo '<script type="text/javascript">error("*'.$_SESSION['errorMessage'].'");</script>';
    session_destroy();
}
?>