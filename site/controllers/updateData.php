<?php
session_start();
require 'functions/errorMessage.php';
require 'functions/connect.php';
require 'functions/queryBuilder.php';
$qb = new QueryBuilder(new Connection());

if (!isset($_SESSION['loggedin'])) {
    http_response_code(401);
    header('Location: /');
    exit();
}

// Remove empty values from $_POST
foreach($_POST as $key=>$value){
    if(is_null($value) || $value == '')
        unset($_POST[$key]);
}

print("<pre>".print_r($_POST,true)."</pre>");

switch ($_POST['method']) {
    case "userData":
        unset ($_POST['method']);
        $succes = $qb->update('user', $_POST, 'id='.$_SESSION['userid']);
        echo $succes;
        if ($succes != 1) {errorMessage("Something went wrong", 'edit');
        } else {header('Location: /edit');}
      break;
    case "certificate":
      break;
    case "experience":
      break;
    case "hobbies":

      break;
    default:

  }