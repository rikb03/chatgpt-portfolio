<?php
require "functions/db.php";
echo "<head><link rel='stylesheet' href='styles/mainstyle.css'></head>";
require 'views/partials/nav.php';
$db = new db;
echo "<main><h1> Welkom </h1> <p> Dit zijn onze mensen </p>";
$users = $db->SQLReturnResult("SELECT id, concat(firstname, ' ', lastName) AS Naam, profilePic AS pfp FROM user");
for($c = 0; $c < 2; $c++){ //Change to first 4 users
    echo "<div><a href='details?id=".$users[$c]["id"]."'><img class='mainUsers' src='".$users[$c]["pfp"]."'></a><br>". $users[$c]["Naam"] . "</div>";
}
for($c = 4; $c < count($users); $c++){ //Change to every other user
    echo "<a href='details?id=".$users[$c]["id"]."'><img class='subUsers' src='".$users[$c]["pfp"]."'></a><br>". $users[$c]["Naam"] . "<br>";
}
echo "</main>";
?>