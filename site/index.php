<?php
require 'functions/routes.php';
<<<<<<< HEAD
routing();

require 'functions/db.php';
$db = new db();
$sql = "SELECT * FROM user";
// $sql = "INSERT into user (firstname, lastname, mail) values ('test2', 'gebruiker', 'test2@mail.com')";
$db->SQLSelect($sql);
print("<pre>".print_r($results,true)."</pre>"); 
=======
routing();
>>>>>>> 82dbae88ee4e74eb3b7748d206c650e4064433c8
