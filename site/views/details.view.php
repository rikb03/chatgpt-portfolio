<!DOCTYPE HTML>
<html>
    <head> 
        <title> Profile App - <?= $dataPerson[0]["Naam"]?></title>
        <link rel='stylesheet' href='public/styles/main.css'>
        <link rel='stylesheet' href='public/styles/details.css'>
        <link rel='stylesheet' href='public/styles/nav.css'>
    </head>
    <body>
        <div class="container">
            <?php require('partials/nav.php'); ?>
            <main>
                <section class="userData">
                    <article class="picture">
                        <img src="<?= (file_exists($dataPerson[0]["Profielfoto"]) ? $dataPerson[0]["Profielfoto"] : "public/images/defaultProfilePic.jpg");?>" class="profilePic">
                    </article>
                    <article class="nameDescription">
                        <h1> <?= $dataPerson[0]["Naam"];?> </h1>
                        <p class="description"> <?= $dataPerson[0]["Beschrijving"];?> </p>
                    </article>
                </section>
                <section class="details">
                    <article>
                        <h1> Certificates </h1>
                        <div class="detail">
                            <ul class="certificates">
                                <?php foreach($dataCertificate as $certificate){echo 
                                    "<li id='cert".$certificate["ID"]."' class='open-button' onclick='openForm()'>
                                        <p>".$certificate["Diploma"]."</p>
                                        <p>".($certificate["Behaald"] ? $certificate["Behaald"] : "Bezig")."</p>
                                    </li>";}?>
                                <!-- TO DO: On click: Show alle info over diploma (Alle school info en jaren dat je er was)-->
                            </ul> 
                        </div>
                    </article>
                    <article>
                        <h1> Work Experience </h1>
                        <div class="detail">
                            <ul class="experiences">
                                <?php foreach($jobData as $job){echo 
                                    "<li class='open-button' onclick='openForm()'>
                                    <p>".$job["Bedrijf"]."</p></li>";}?>
                                <!-- TO DO: On click: Show alle info over bedrijf -->
                            </ul>
                        </div>
                    </article>
                    <article>
                        <h1> Hobbies </h1>
                        <div class="detail">
                            <ul class="hobbies">
                                <?php foreach($dataHobby as $hobby){echo
                                    "<li class='open-button' onclick='openForm()'>
                                    <p>".ucFirst($hobby["Hobby"])."</p></li>";}?>
                            </ul>
                        </div>
                    </article>
                </section>
                <div class="form-popup" id="myForm">
                    <a class="popupClose" onclick="closeForm()">X</a>
                    <div id='certificate' class='certificate'>
                        <?php 
                        
                        ?>
                    </div>
                    <div id='experiences' class='experiences'>
                        <?php 
                        ?>
                    </div>
            </main>
        </div>
    </body>
    <script src="public/js/details.js"></script>
</html>