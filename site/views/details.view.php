<!DOCTYPE HTML>
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
                            <?php foreach($dataSchool as $school){echo 
                                "<li>
                                    <p>".$school["Diploma"]."</p>
                                    <p>".($school["Behaald"] ? $school["Behaald"] : "Bezig")."</p>
                                </li>";}?>
                            <!-- TO DO: On click: Show alle info over diploma (Alle school info en jaren dat je er was)-->
                        </ul> 
                    </div>
                </article>
                <article>
                    <h1> Work Experience </h1>
                    <div class="detail">
                        <ul class="experiences">
                            <?php foreach($jobData as $job){echo "<li><p>".$job["Bedrijf"]."</p></li>";}?>
                            <!-- TO DO: On click: Show alle info over bedrijf -->
                        </ul>
                    </div>
                </article>
                <article>
                    <h1> Hobbies </h1>
                    <div class="detail">
                        <ul class="hobbies">
                            <?php foreach($hobbyData as $hobby){echo "<li><p>".ucFirst($hobby["Hobby"])."</p></li>";}?>
                        </ul>
                    </div>
                </article>
            </section>
            <div class=detail>
                <ul> <?php
                foreach($dataCertificate as $certificate){echo 
                    "<li>
                        <p> Opleiding: ".$certificate["Diploma"]."</p>
                        <p> Vak: ".$certificate["Vak"]."</p>
                        <p> Cijfer: ".$certificate["Cijfer"]."</p>
                    </li>";}?>
                </ul>
            </div>
        </main>
    </div>
</body>