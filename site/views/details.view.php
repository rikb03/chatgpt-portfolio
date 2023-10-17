<?php
require 'functions/db.php';
echo "<h1> Profile </h1>";
$id = $_GET["id"];
$db = new db;
$query = "SELECT user.id, concat(firstName, ' ', lastName) AS Naam, description AS Beschrijving FROM user WHERE id = :id";
$result = $db->SQLReturnResultWithParams($query, ":id", $id);
foreach($result as $user){
    echo $user["Naam"] . "<br>" . $user["Beschrijving"];
}
?>