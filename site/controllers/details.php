<?php
require "functions/db.php";
require 'functions/connect.php';
require 'functions/queryBuilder.php';
$qb = new QueryBuilder(new Connection());
session_start();


$userIds = $qb->selectCol('user', 'id');
if(!isset($_GET["id"]) || $_GET["id"] > count($userIds) || $_GET["id"] < 1){
    header("Location: /");
    exit();
}
$id = $_GET["id"];

$queryJobs = "SELECT 
id AS ID, 
employerName AS Bedrijf, 
employerCity AS Stad, 
employerAddress AS Adres, 
employerMail AS Mail, 
employerPhone AS Telefoon 
FROM employer 
WHERE user_id = ". $id;
$jobData = $qb->customQuery($queryJobs);

$hobbyQuery = "SELECT hobbyName AS Hobby FROM hobby WHERE user_id = ". $id;
$dataHobby = $qb->customQuery($hobbyQuery);

$personQuery = "SELECT id, concat(firstname, ' ', lastName) AS Naam, profilePic AS Profielfoto, description AS Beschrijving FROM user WHERE id = ". $id;
$dataPerson = $qb->customQuery($personQuery);

$gradesQuery = "SELECT c.id AS ID, g.subject AS Vak, grade AS Cijfer 
FROM grades g 
JOIN certificate c ON c.id = g.certificate_id 
WHERE c.education_user_id =" . $id;
$dataGrades = $qb->customQuery($gradesQuery);

$schoolCertQuery = 
"SELECT 
e.schoolName AS Schoolnaam,
e.schoolCity AS Schoolstad,
e.schoolAddress AS Schooladres,
e.schoolPhone AS Schooltelefoon,
e.schoolReference AS Schoolreferentie,
c.id AS ID, 
c.certificateName AS Opleiding, 
YEAR(c.certificateDateStart) AS Begonnen, 
YEAR(c.certificateDateFinished) AS Behaald
FROM education e
JOIN certificate c ON c.education_id = e.id
WHERE e.user_id =" .$id;

$dataSchoolCert = $qb->customQuery($schoolCertQuery);

// Deze Query werkt en geeft maar 1 result per education! Nu alleen nog de rest fixen 😰
require 'views/details.view.php';