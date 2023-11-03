<?php
require 'functions/connect.php';
require 'functions/queryBuilder.php';
$qb = new queryBuilder(new Connection());
$currentUser = $qb->select('user');

require 'views/admin.view.php';
?>