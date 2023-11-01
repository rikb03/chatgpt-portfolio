<?php
require "functions/db.php";
require 'functions/connect.php';
require 'functions/queryBuilder.php';
$qb = new QueryBuilder(new Connection());
$query = "SELECT id, concat(firstname, ' ', lastName) AS Naam, profilePic AS Profielfoto, description AS Beschrijving, id AS ID FROM user";
$users = $qb->customQuery($query);
require 'views/index.view.php';
?>