<?php
require 'functions/connect.php';
require 'functions/queryBuilder.php';
$qb = new queryBuilder(new Connection());
$currentUser = $qb->select('user');
$query = "SELECT id, concat(firstname, ' ', lastName) AS Naam, profilePic AS Profielfoto, description AS Beschrijving, id AS ID FROM user";
$users = $qb->customQuery($query);

require 'views/admin.view.php';
?>