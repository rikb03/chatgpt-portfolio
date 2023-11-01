<?php
session_start();
require 'views/passwordchange.view.php';
if ($_SESSION['error']) {
    // If there is an error, show the error message
    echo '<script type="text/javascript">error("*'.$_SESSION['errorMessage'].'");</script>';
    session_destroy();
}
?>