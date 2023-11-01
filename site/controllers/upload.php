<?php
// Include the database configuration file
require 'functions/connect.php';
require "functions/queryBuilder.php";

$qb = new queryBuilder(new Connection());
session_start();

$statusMsg = '';

// File upload directory
$targetDir = "public/images/";

if(isset($_POST["submit"])){
    if(!empty($_FILES["file"]["name"])){
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $_SESSION['userid'] . "_" . $fileName;
        echo $targetFilePath;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg','gif');
        if(in_array($fileType, $allowTypes)){
            // Upload file to server
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                // Insert image file name into database
                $insert = $qb->update("user", [
                    "profilePic" => $targetFilePath
                ], "id=" . $_SESSION['userid']);
                if($insert){
                    $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                }else{
                    $statusMsg = "File upload failed, please try again.";
                }
            }else{
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }else{
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
        }
    }else{
        $statusMsg = 'Please select a file to upload.';
    }
}

// Display status message
echo $statusMsg;