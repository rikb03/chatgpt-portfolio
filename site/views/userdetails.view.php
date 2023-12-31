<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UserDetails</title>
    <!-- Loads the css files -->
    <link rel="stylesheet" href="../public/styles/main.css" type="text/css">
    <link rel="stylesheet" href="../public/styles/nav.css" type="text/css">
    <link rel="stylesheet" href="../public/styles/userDetails.css" type="text/css">
</head>
<body>
<div class="container">
    <!-- Inserts the navigation bar -->
    <?php require('partials/nav.php'); ?>
    <main>
        <div class="wrapper">
            <!-- profilePic column -->
            <div class="profilePic">
                <!-- Displays the users profilePic -->
                <img src="<?= (file_exists($currentUser[0]['profilePic'])) ? $currentUser[0]['profilePic'] : "public/images/defaultProfilePic.jpg"; ?>"
                     alt="avatar" class="avatar">
                <!-- Name of the user -->
                <h2 class="h2pf"><?= $currentUser[0]['firstName'], ' ', $currentUser[0]['lastName'] ?></h2>
                <!-- Form to upload a new profilePic -->
                <form action="upload" method="post" enctype="multipart/form-data" class="upload">
                    <input type="file" name="file" class="uploadFile">
                    <input type="submit" name="submit" value="Upload">
                     <input type="hidden" name="method" value="upload">
                </form>
                <!-- If there is an error on submit it will be displayed here -->
                <p id='error' class='errorUpload' style='display:none'></p>
            </div>
            <!-- userData column -->
            <div class="userData">
                <h2>User Data</h2>
                <!-- Form to update User Data with the current values as default value.
                     On submit it sends the data to the updateData controller -->
                <form class="formData" action="updatedata" method="post">
                    <label for="firstname">Firstname</label>
                    <input type="text" value="<?= $currentUser[0]['firstName']; ?>" name="firstName"
                           placeholder="Firstname" id="firstname" required>
                    <label for="lastname">Lastname</label>
                    <input type="text" value="<?= $currentUser[0]['lastName']; ?>" name="lastName"
                           placeholder="Lastname" id="lastname" required>
                    <label for="mail">Email</label>
                    <input type="email" value="<?= $currentUser[0]['mail']; ?>" name="mail" placeholder="Email"
                           id="mail" required>
                    <label for="phone">Phone number</label>
                    <input type="tell" value="<?php if (!is_null($currentUser[0]['phone'])) {
                        echo $currentUser[0]['phone'];
                    } ?>" name="phone" placeholder="Phone number" id="phone">
                    <label for="dob">Date of birth</label>
                    <input type="date" value="<?php if (!is_null($currentUser[0]['dob'])) {
                        echo $currentUser[0]['dob'];
                    } ?>" id="dob" name="dob">
                    <!--                    <label for="password">Password</label>-->
                    <!--                    <input type="password" name="password" placeholder="Password" id="password" required>-->
                    <input type="hidden" name="method" value="userData">
                    <!-- If there is an error on submit it will be displayed here -->           
                    <p id='error' class='errorUserData' style='display:none'></p>
                    <input type="submit" value="save" class="submit" id="userData">
                </form>
            </div>


            <!--            //CERTIFICATES-->
            <!-- certificates column -->
            <div class="certificates">
                <!-- Form to update users certificates -->
                <form class="form" action="updatedata" method="post">
                    <label>Certificate</label>

                    <input type="text" id="myTextFieldCertificates">

                    <?php

                    if (empty($currentUserCertificate[0]["certificateName"])) {
                    } else {


                    ?>


                    <select name="jobTitle" id="mySelectCertificate" onchange="updateTextFieldCertificates()">
                        <?php
                        // Stel mogelijke jobtitels in
                        $mogelijkeJobTitels = array($currentUserCertificate[0]['certificateName']);

                        // Loop door de mogelijke jobtitels
                        foreach ($mogelijkeJobTitels as $jobTitel) {
                            // Controleer of de huidige jobtitel overeenkomt met de geselecteerde waarde
                            $isSelected = ($jobTitel == $currentUserCertificate[0]["certificateName"]) ? 'selected' : '';
                            // Geef de optie weer
                            echo "<option value=\"$jobTitel\" $isSelected>$jobTitel</option>";
                        }

                        }
                        ?>
                    </select>


                    <!--                    <input type="text" name="certificate" placeholder="certificate" id="certificate">-->
                    <!--                    <input type="hidden" name="method" value="certificate">-->
                    <!--                    <p id='error' class='errorCertificates' style='display:none'></p>-->


                    <input type="submit" value="save" class="submit" id="certificate">
                </form>


                <!--            EXPERIENCE-->
                <!-- Form to update users experiences -->
                <form class="form" action="updatedata" method="post">

                    <label>Experience</label>

                    <input type="text" id="myTextFieldExperience">

                    <?php


                    if (empty($currentUserExperience[0])) {
                    } else {


                    ?>

                    <select name="jobTitle" id="mySelectExperience" onchange="updateTextFieldExperience()">
                        <?php
                        // Stel mogelijke jobtitels in
                        $mogelijkeJobTitels = array($currentUserExperience[0]['jobTitle']);

                        // Loop door de mogelijke jobtitels
                        foreach ($mogelijkeJobTitels as $jobTitel) {
                            // Controleer of de huidige jobtitel overeenkomt met de geselecteerde waarde
                            $isSelected = ($jobTitel == $currentUserExperience[0]['jobTitle']) ? 'selected' : '';

                            // Geef de optie weer
                            echo "<option value=\"$jobTitel\" $isSelected>$jobTitel</option>";
                        }

                        }
                        ?>
                    </select>


                    <!--<input type="text" value="" name="Experience" placeholder="Experience" id="Experience">-->
                    <!--                    <input type="hidden" name="method" value="experience">-->
                    <!--                    <p id ='error' class='errorExperience' style='display:none'></p>-->
                    <input type="submit" value="save" class="submit" id="experience">
                </form>


                <!--                HOBBIES-->
                <!-- Form to update users hobbys -->
                <form class="form" action="updatedata" method="post">

                    <label>Hobby</label>

                    <input type="text" id="myTextFieldHobby">

                    <?php


                    if (empty($currentUserHobby[0]["hobbyName"])) {
                    } else {


                    ?>

                    <select name="jobTitle" id="mySelectHobby" onchange="updateTextFieldHobby()">
                        <?php
                        // Stel mogelijke jobtitels in
                        $mogelijkeJobTitels = array($currentUserHobby[0]['hobbyName']);

                        // Loop door de mogelijke jobtitels
                        foreach ($mogelijkeJobTitels as $jobTitel) {
                            // Controleer of de huidige jobtitel overeenkomt met de geselecteerde waarde
                            $isSelected = ($jobTitel == $currentUserHobby[0]['jobTitle']) ? 'selected' : '';

                            // Geef de optie weer
                            echo "<option value=\"$jobTitel\" $isSelected>$jobTitel</option>";
                        }
                        }
                        ?>
                    </select>

                    <input type="hidden" name="methodHobbby" value="userDataHobby">

                    <!--<input type="text" value="" name="Experience" placeholder="Experience" id="Experience">-->
                    <!--                    <input type="hidden" name="method" value="experience">-->
                    <!--                    <p id ='error' class='errorExperience' style='display:none'></p>-->
                    <input type="submit" value="save" class="submit" id="experience">
                </form>


                <!--                    <input type="text" name="Hobbies" placeholder="Hobbies" id="Hobbies">-->
                <!--                    <input type="hidden" name="method" value="hobbies">-->
                <!--                    <p id='error' class='errorHobbies' style='display:none'></p>-->


                <input type="submit" value="save" class="submit" id="hobbies">
                </form>


            </div>
        </div>
    </main>
    <aside>
    </aside>
</div>
<!-- Loads the javascript files -->
<script src="../public/js/error.js"></script>
</body>
</html>

<?php

?>
<script>
    function updateTextFieldExperience() {
        var selectElementExperience = document.getElementById("mySelectExperience");
        var textFieldExperience = document.getElementById("myTextFieldExperience");

        // Bijwerken van het tekstveld met de waarde van de geselecteerde optie
        textFieldExperience.value = selectElementExperience.value;
    }


    function updateTextFieldCertificates() {
        var selectElementCertificates = document.getElementById("mySelectCertificate");
        var textFieldCertificates = document.getElementById("myTextFieldCertificates");

        // Bijwerken van het tekstveld met de waarde van de geselecteerde optie
        textFieldCertificates.value = selectElementCertificates.value;
    }


    function updateTextFieldHobby() {
        var selectElementHobbies = document.getElementById("mySelectHobbies");
        var textFieldHobbies = document.getElementById("myTextFieldHobbies");

        // Bijwerken van het tekstveld met de waarde van de geselecteerde optie
        textFieldHobbies.value = selectElementHobbies.value;
    }
</script>

<!--2c5e970889949d154167b1a0f426536ae8ded278-->