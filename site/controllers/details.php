<?php
require "functions/db.php";
require 'functions/connect.php';
require 'functions/queryBuilder.php';
$qb = new QueryBuilder(new Connection());
session_start();
$id = $_GET["id"];
$queryPersonal = "SELECT id, concat(firstname, ' ', lastName) AS Naam, profilePic AS Profielfoto, description AS Beschrijving, id AS ID FROM user WHERE id = ". $id;
$querySchool = "SELECT schoolName AS Naam, schoolCourse AS Opleiding, schoolCity AS Stad, schoolAddress AS Adres, schoolPhone AS Telefoon, schoolReference AS Referentie FROM education WHERE user_id = ". $id;
$queryCertificates = "SELECT certificateName AS Diploma, YEAR(certificateDateStart) AS Begonnen, YEAR(certificateDateFinished) AS Gestopt  FROM certificate WHERE education_user_id = ". $id;
$queryJobs = "SELECT employerName AS Bedrijf, employerCity AS Stad, employerAddress AS Adres, employerMail AS Mail, employerPhone AS Telefoon FROM employer WHERE user_id = ". $id;
$queryHobbies = "SELECT hobbyName AS Hobby FROM hobby WHERE user_id = ". $id;
$personalData = $qb->customQuery($queryPersonal);
$schoolData = $qb->customQuery($querySchool);
$certificateData = $qb->customQuery($queryCertificates);
$jobData = $qb->customQuery($queryJobs);
$hobbyData = $qb->customQuery($queryHobbies);
require 'views/details.view.php';

// TO DO: SQL Code verbeteren, zorgen dat er geen dubbele results komen
?>