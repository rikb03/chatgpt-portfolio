<!DOCTYPE HTML>
<head> 
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
                    <img src="<?= $personalData[0]["Profielfoto"];?>" class="profilePic">
                </article>
                <article class="nameDescription">
                    <h1> <?= $personalData[0]["Naam"];?> </h1>
                    <p class="description"> <?= $personalData[0]["Beschrijving"];?> </p>
                </article>
            </section>
            <section class="details">
                <article>
                    <h1> Certificates </h1>
                    <div class="detail">
                        <ul class="certificates">
                            <?php foreach($certificateData as $certificate){echo "<li><p>".$certificate["Diploma"]."</p><p>".$certificate["Gestopt"]."</p></li>";}?>
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
                            <?php foreach($hobbyData as $hobby){echo "<li><p>".$hobby["Hobby"]."</p></li>";}?>
                        </ul>
                    </div>
                </article>
            </section>
        </main>
    </div>
</body>