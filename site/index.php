<?php
require 'functions/routes.php';
routing();

require 'functions/db.php';
$db = new db();
$sql = "SELECT * FROM user";
// $sql = "INSERT into user (firstname, lastname, mail) values ('test2', 'gebruiker', 'test2@mail.com')";
$db->execSQL($sql);
print("<pre>".print_r($results,true)."</pre>"); 
