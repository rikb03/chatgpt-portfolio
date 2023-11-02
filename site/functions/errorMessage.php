<?php
// Sets the error message for login/signup/passwordchange and redirects to the previous page
function errorMessage($message, $location = NULL){
    $location = $location ?? $_SERVER['HTTP_REFERER'];
    $_SESSION['method'] = $_POST["method"];
    $_SESSION['error'] = TRUE;
    $_SESSION['errorMessage'] = $message;
    header ('Location: '. $location);
    exit();
}