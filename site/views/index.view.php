<?php
require "functions/db.php";
$db = new db;
echo "<h1> Welkom </h1>";
$users = $db->SQLReturnResult("SELECT id, concat(firstname, ' ', lastName) AS Naam FROM user");
for($c = 0; $c < 2; $c++){ //Change to first 4 users
    echo "<a href='details?id=".$users[$c]["id"]."'>" . $users[$c]["Naam"] . "<br>";
}
for($c = 4; $c < count($users); $c++){ //Change to every other user
    echo "<a href='details?id=".$users[$c]["id"]."'>" . $users[$c]["Naam"] . "<br>";
}
?>