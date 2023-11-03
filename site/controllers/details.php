<?php
require "functions/db.php";
require 'functions/connect.php';
require 'functions/queryBuilder.php';
$qb = new QueryBuilder(new Connection());
session_start();
$id = $_GET["id"];

$queryJobs = "SELECT employerName AS Bedrijf, employerCity AS Stad, employerAddress AS Adres, employerMail AS Mail, employerPhone AS Telefoon FROM employer WHERE user_id = ". $id;
$queryHobbies = "SELECT hobbyName AS Hobby FROM hobby WHERE user_id = ". $id;

$jobData = $qb->customQuery($queryJobs);
$hobbyData = $qb->customQuery($queryHobbies);

$personQuery = "SELECT id, concat(firstname, ' ', lastName) AS Naam, profilePic AS Profielfoto, description AS Beschrijving FROM user WHERE id = ". $id;
$dataPerson = $qb->customQuery($personQuery);

$schoolQuery = "SELECT schoolName AS School, schoolCity AS Stad, certificateName AS Diploma,YEAR(certificateDateStart) AS Begonnen,YEAR(certificateDateFinished) AS Behaald 
FROM education e JOIN certificate c ON c.education_id = e.id WHERE e.user_id = ". $id;
$dataSchool = $qb->customQuery($schoolQuery);

$certificateQuery = "SELECT c.certificateName AS Diploma, g.subject AS Vak, g.grade AS Cijfer FROM grades g JOIN certificate c ON g.certificate_id = c.id WHERE c.education_user_id =". $id;
$dataCertificate = $qb->customQuery($certificateQuery);

// Deze Query werkt en geeft maar 1 result per education! Nu alleen nog de rest fixen 😰
require 'views/details.view.php';