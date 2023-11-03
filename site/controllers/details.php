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

$queryJobs = "SELECT employerName AS Bedrijf, employerCity AS Stad, employerAddress AS Adres, employerMail AS Mail, employerPhone AS Telefoon FROM employer WHERE user_id = ". $id;
$hobbyQuery = "SELECT hobbyName AS Hobby FROM hobby WHERE user_id = ". $id;

$jobData = $qb->customQuery($queryJobs);
$dataHobby = $qb->customQuery($hobbyQuery);

$personQuery = "SELECT id, concat(firstname, ' ', lastName) AS Naam, profilePic AS Profielfoto, description AS Beschrijving FROM user WHERE id = ". $id;
$dataPerson = $qb->customQuery($personQuery);

$certificateQuery = 
"SELECT 
c.education_id AS ID,
c.certificateName AS Diploma, 
YEAR(c.certificateDateStart) AS Begonnen, 
YEAR(c.certificateDateFinished) AS Behaald 
FROM certificate c 
WHERE c.education_user_id = " . $id;
$dataCertificate = $qb->customQuery($certificateQuery);

$schoolQuery =
"SELECT
e.id AS ID,
schoolName AS School,
schoolCourse AS Opleiding,
schoolCity AS Stad,
schoolAddress AS Adres,
schoolPhone AS Telefoon,
schoolReference AS Referentie
FROM education e
WHERE e.user_id = 1";
$dataSchool = $qb->customQuery($schoolQuery);

$gradesQuery = "SELECT g.subject AS Vak, grade AS Cijfer FROM grades g WHERE g.certificate_education_user_id =" . $id;;
$dataGrades = $qb->customQuery($gradesQuery);

$query = 
"SELECT e.schoolName, c.certificateName 
FROM education e 
JOIN certificate c 
    ON c.education_id = e.id 
WHERE e.user_id = 1";

$query2 = 
"SELECT c.certificateName, g.subject, g.grade 
FROM certificate c 
JOIN grades g 
    ON g.certificate_id = c.id 
WHERE c.education_user_id = 1
    AND c.education_id = 1";


// print("<pre>".print_r($dataCertificate,true)."</pre>");

// Deze Query werkt en geeft maar 1 result per education! Nu alleen nog de rest fixen 😰
require 'views/details.view.php';