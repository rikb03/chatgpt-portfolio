<?php
require 'functions/db.php';
echo "<head><link rel='stylesheet' href='../public/styles/mainstyle.css'></head>";
require 'functions/connect.php';
require 'functions/querybuilder.php';
require '../views/partials/nav.php';
echo "<h1> Edit User </h1>";
$id = $_GET["id"];
$db = new db;
$query = "SELECT user.id, concat(firstName, ' ', lastName) AS Naam, description AS Beschrijving FROM user WHERE id = :id";
$result = $db->SQLReturnResultWithParams($query, ":id", $id);
foreach($result as $user){
    echo $user["Naam"] . "<br>" . $user["Beschrijving"];
}
?>