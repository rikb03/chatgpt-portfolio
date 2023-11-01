<?php
// Sets the error message for login/signup/passwordchange and redirects to the previous page
function errorMessage($message){
    $_SESSION['method'] = $_POST["method"];
    $_SESSION['error'] = TRUE;
    $_SESSION['errorMessage'] = $message;
    header ('Location: '. $_SERVER['HTTP_REFERER']);
    exit();
}