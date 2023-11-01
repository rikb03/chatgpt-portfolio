<?php
require 'functions/connect.php';
require 'functions/querybuilder.php';

$qb = new querybuilder(new Connection());
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo "<script type='text/javascript'>toggleLoginLink();</script>";
}