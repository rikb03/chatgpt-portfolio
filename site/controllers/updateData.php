<?php
session_start();
require 'functions/errorMessage.php';
require 'functions/connect.php';
require 'functions/queryBuilder.php';
$qb = new QueryBuilder(new Connection());
require 'functions/updateData.php';
$edit = new updateData();

if (!isset($_SESSION['loggedin'])) {
    http_response_code(401);
    header('Location: /');
    exit();
}

// Change empty values in $_POST to NULL
foreach($_POST as $key=>$value){
    if(is_null($value) || $value == '')
        $_POST[$key] = "NULL";
}

switch ($_POST['method']) {
    case "userData":
      $edit->update('user', $_POST, $_SESSION['userid']);
      break;
    case "certificate":
      break;
    case "experience":
      break;
    case "hobbies":

      break;
    default:

  }