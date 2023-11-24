<!DOCTYPE HTML>
<html>
    <head> 
        <!-- Changes the page title to "Profile App - (Person's Name)" -->
        <title> Profile App - <?= $dataPerson[0]["Naam"]?></title>
        <link rel='stylesheet' href='public/styles/main.css'>
        <link rel='stylesheet' href='public/styles/details.css'>
        <link rel='stylesheet' href='public/styles/nav.css'>
    </head>
    <body>
        <div class="container">
            <?php require('partials/nav.php'); ?>
            <main>
                <!-- Section contains main user data with their full description -->
                <section class="userData">
                    <article class="picture">
                        <img src="<?= (file_exists($dataPerson[0]["Profielfoto"]) ? $dataPerson[0]["Profielfoto"] : "public/images/defaultProfilePic.jpg");?>" class="profilePic">
                    </article>
                    <article class="nameDescription">
                        <h1> <?= $dataPerson[0]["Naam"];?> </h1>
                        <p class="description"> <?= $dataPerson[0]["Beschrijving"];?> </p>
                    </article>
                </section>
                <!-- Section contains articles, shows titles with a list of details below -->
                <section class="details">
                    <!-- Creates a clickable list item and pop-up div for every certificate, shows the pop-up on click which contains detailed information for that item.
                         Original plan was to have a single pop-up that changed the content based on ID gotten from showDetails, but this was unachievable for us. -->
                    <article>
                        <h1> Certificates </h1>
                        <div class="detail">
                            <ul class="certificates">
                                <?php foreach($dataSchoolCert as $certificate){echo 
                                    "<li id='".$certificate["ID"]."' onclick=showDetails('cert".$certificate['ID']."')>
                                        <p>".$certificate["Opleiding"]."</p>
                                        <p>".($certificate["Behaald"] ? $certificate["Behaald"] : "Bezig")."</p>
                                    </li>
                                    <div class='detailpopup' id='cert".$certificate["ID"]."'>
                                        <a class='popupClose' onclick=closeDetails('cert".$certificate["ID"]."')>X</a>
                                        <h1>".$certificate["Opleiding"]."</h1>
                                        <div class='popupContainer'>
                                                <div class='certDetails'>
                                                    <h1> Schoolinformatie </h1>
                                                    <div class='detail'>
                                                        <ul>
                                                            <li><b>Begonnen: </b>".$certificate["Begonnen"]."</li>
                                                            <li><b>Behaald: </b>".($certificate["Behaald"] ? $certificate["Behaald"] : "Bezig")."</li>
                                                            <li><b>School: </b>".($certificate["Schoolnaam"] ? $certificate["Schoolnaam"] : "-")."</li>
                                                            <li><b>Stad: </b>".($certificate["Schoolstad"] ? $certificate["Schoolstad"]: "-")."</li>
                                                            <li><b>Adres: </b>".($certificate["Schooladres"] ? $certificate["Schooladres"] : "-")."</li>
                                                            <li><b>Telefoon: </b>".($certificate["Schooltelefoon"] ? $certificate["Schooltelefoon"] : "-")."</li>
                                                            <li><b>Referentie: </b>".($certificate["Schoolreferentie"] ? $certificate["Schoolreferentie"] : "-")."</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class='grades'>
                                                    <h1> Cijferlijst </h1>
                                                    <div class='detail'>";
                                        foreach($dataGrades as $grade){
                                            if($grade["ID"] == $certificate["ID"]){
                                                echo "<ul>
                                                        <li>
                                                            <p>".$grade["Vak"]."</p>
                                                            <p>".$grade["Cijfer"]."</p>
                                                        </li>
                                                    </ul>";
                                            }
                                        }
                                    echo "      </div>
                                            </div>
                                        </div>
                                    </div>";
                                    }?>
                            </ul> 
                        </div>
                    </article>
                    <!-- Same functionality as certificates, completely forgot to add work experience because I was too happy that the pop-ups finally worked -->
                    <article>
                        <h1> Work Experience </h1>
                        <div class="detail">
                            <ul class="experiences">
                                <?php foreach($jobData as $job){echo 
                                    "<li class='open-button' onclick=showDetails('job".$job["ID"]."')>
                                    <p>".$job["Bedrijf"]."</p></li>                                    
                                    <div class='detailpopup' id='job".$job["ID"]."'>
                                    <h1>".$job["Bedrijf"]."</h1>
                                        <a class='popupClose' onclick=closeDetails('job".$job["ID"]."')>X</a>
                                        <div class='popupContainer'>
                                            <div class='detail'>
                                                <ul>
                                                    <li><b>Bedrijf: </b><p>".$job["Bedrijf"]."</p></li>
                                                    <li><b>Stad: </b>".$job["Stad"]."</li>
                                                    <li><b>Adres: </b>".$job["Adres"]."</li>
                                                    <li><b>Mail: </b>".$job["Mail"]."</li>
                                                    <li><b>Telefoon: </b>".$job["Telefoon"]."</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>";}?>
                            </ul>
                        </div>
                    </article>
                    <!-- Displays a person's hobbies, no pop-ups here -->
                    <article>
                        <h1> Hobbies </h1>
                        <div class="detail">
                            <ul class="hobbies">
                                <?php foreach($dataHobby as $hobby){echo
                                    "<li>
                                    <p>".ucFirst($hobby["Hobby"])."</p></li>";}?>
                            </ul>
                        </div>
                    </article>
                </section>
            </main>
        </div>
    </body>
    <!-- Loads the script to show pop-ups -->
    <script src="public/js/details.js"></script>
</html>