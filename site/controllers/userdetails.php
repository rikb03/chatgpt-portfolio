<?php

require 'views/userdetails.view.php';
require 'functions/errorMessage.php';
require 'functions/connect.php';
require 'functions/queryBuilder.php';
require 'controllers/details.php';

//start code om één gebruiker op te halen

$query = "SELECT id, CONCAT(firstname, ' ', lastName) AS Naam, profilePic AS Profielfoto, description AS Beschrijving, id AS ID FROM user WHERE username = '" . $_SESSION['username'] . "'";
$result = $conn->query($query);

// Controleren op geslaagde uitvoering van de query
if (!$result) {
    die("Query failed: " . $conn->error);
}

// Verwerken van de resultaten
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Hier kun je de resultaten gebruiken
        echo "ID: " . $row["id"] . "<br>";
        echo "Naam: " . $row["Naam"] . "<br>";
        echo "Profielfoto: " . $row["Profielfoto"] . "<br>";
        echo "Beschrijving: " . $row["Beschrijving"] . "<br>";
    }
} else {
    echo "Geen resultaten gevonden.";
}







//einde code om één gebruiker op te halen


var_dump($result);
var_dump($_SESSION);

if (empty($_SESSION["naam"])) {
    header("location: index.php");
}

if ($_SESSION['error']) {
    // If there is an error, show the error message
    echo '<script type="text/javascript">error("*'.$_SESSION['errorMessage'].'");</script>';
    session_destroy();
}
?>