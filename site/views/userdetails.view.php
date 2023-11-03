<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UserDetails</title>
    <link rel="stylesheet" href="../public/styles/main.css" type="text/css">
    <link rel="stylesheet" href="../public/styles/nav.css" type="text/css">
    <link rel="stylesheet" href="../public/styles/userDetails.css" type="text/css">
</head>
<body>
<div class="container">
    <?php require('partials/nav.php'); ?>
    <main>
        <div class="wrapper">
            <div class="profilePic">
                <img src="<?=(file_exists($currentUser[0]['profilePic'])) ? $currentUser[0]['profilePic'] : "public/images/defaultProfilePic.jpg";?>" alt="avatar" class="avatar">
                <h2 class="h2pf">Profile pic</h2>
                <form action="upload" method="post" enctype="multipart/form-data" class="upload">
                    <input type="file" name="file" class="uploadFile">
                    <input type="submit" name="submit" value="Upload">
                    <input type="hidden" name="method" value="upload">
                </form>
                <p id ='error' class='errorUpload' style='display:none'></p>
            </div>
            <div class="userData">
                <h2>User Data</h2>
                <form class="formData" action="updatedata" method="post">
                    <label for="firstname">Firstname</label>
                    <input type="text" value="<?=$currentUser[0]['firstName'];?>" name="firstName" placeholder="Firstname" id="firstname" required>
                    <label for="lastname">Lastname</label>
                    <input type="text" value="<?=$currentUser[0]['lastName'];?>" name="lastName" placeholder="Lastname" id="lastname" required>
                    <label for="mail">Email</label>
                    <input type="email" value="<?=$currentUser[0]['mail'];?>" name="mail" placeholder="Email" id="mail" required>
                    <label for="phone">Phone number</label>
                    <input type="tell" value="<?php if(!is_null($currentUser[0]['phone'])){echo $currentUser[0]['phone'];}?>" name="phone" placeholder="Phone number" id="phone">
                    <label for="dob">Date of birth</label>
                    <input type="date" value="<?php if(!is_null($currentUser[0]['dob'])){echo $currentUser[0]['dob'];}?>" id="dob" name="dob">
<!--                    <label for="password">Password</label>-->
<!--                    <input type="password" name="password" placeholder="Password" id="password" required>-->
                    <input type="hidden" name="method" value="userData">
                    <p id ='error' class='errorUserData' style='display:none'></p>
                    <input type="submit" value="save" class="submit" id="userData">
                </form>
            </div>
            <div class="certificates">
                <form class="form" action="updatedata" method="post">
                    <label>Certificate</label>
                    <input type="text" name="certificate" placeholder="certificate" id="certificate">
                    <input type="hidden" name="method" value="certificate">
                    <p id ='error' class='errorCertificates' style='display:none'></p>
                    <input type="submit" value="save" class="submit" id="certificate">
                </form>
                <form class="form" action="updatedata" method="post">
                    <label>Experience</label>
                    <input type="text" name="Experience" placeholder="Experience" id="Experience">
                    <input type="hidden" name="method" value="experience">
                    <p id ='error' class='errorExperience' style='display:none'></p>
                    <input type="submit" value="save" class="submit" id="experience">
                </form>
                <form class="form" action="updatedata" method="post">
                    <label>Hobbies</label>
                    <input type="text" name="Hobbies" placeholder="Hobbies" id="Hobbies">
                    <input type="hidden" name="method" value="hobbies">
                    <p id ='error' class='errorHobbies' style='display:none'></p>
                    <input type="submit" value="save" class="submit" id="hobbies">
                </form>
            </div>
        </div>
    </main>
    <aside>
    </aside>
</div>
<script src="../public/js/error.js"></script>
</body>
</html>
<!--2c5e970889949d154167b1a0f426536ae8ded278-->