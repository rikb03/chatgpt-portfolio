<?php
session_start();
// print("<pre>".print_r($_SESSION,true)."</pre>");
require 'views/passwordchange.view.php';
if ($_SESSION['error'] && $_SESSION['method'] == 'passwordchange') {
    // If there is an error, show the error message
    echo '<script type="text/javascript">error("*'.$_SESSION['errorMessage'].'");</script>';
    session_destroy();
}
?>