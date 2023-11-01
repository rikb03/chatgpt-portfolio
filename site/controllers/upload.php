<?php
require 'functions/errorMessage.php';
require 'functions/connect.php';
require "functions/queryBuilder.php";
$qb = new queryBuilder(new Connection());
session_start();

// Checks if image was submitted
if(isset($_POST["submit"])){
    if(!empty($_FILES["file"]["name"])){
        // File upload directory
        $targetDir = "public/images/";
        $fileName = basename($_FILES["file"]["name"]);
        // Creates file path with user id and file name
        $targetFilePath = $targetDir . $_SESSION['userid'] . "_" . $fileName;
        $fileType = strtolower(pathinfo($targetFilePath,PATHINFO_EXTENSION));
        // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg','gif');
        if(in_array($fileType, $allowTypes)){
            // Upload file to server
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath) &&
                $update = $qb->update("user", ["profilePic" => $targetFilePath], "id=" . $_SESSION['userid'])){
                    // Inserted image file into database
                    $statusMsg = "The image has been uploaded successfully.";
            }else{
                $statusMsg = "Sorry, there was an error uploading your image.";
            }
        }else{
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF images are allowed to upload.';
        }
    }else{
        $statusMsg = 'Please select a image to upload.';
    }
}
// Display status message
// echo $statusMsg;
if ($statusMsg != "The image has been uploaded successfully.") {
errorMessage($statusMsg);}
else {
    header ('Location: '. $_SERVER['HTTP_REFERER']);
}