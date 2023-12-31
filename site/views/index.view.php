<!DOCTYPE HTML>
<head> 
    <title> Profile App </title>
    <link rel='stylesheet' href='public/styles/main.css'>
    <link rel='stylesheet' href='public/styles/home.css'>
    <link rel='stylesheet' href='public/styles/nav.css'>
</head>
<body>
    <div class="container">
        <?php require('partials/nav.php'); ?>
        <main>
            <!-- Welcome message and site description -->
            <aside>
                <div class="post">
                    <h1>Welcome!</h1>
                    <p>Are you looking for a powerful tool to showcase your professional journey and educational achievements in one place? Look no further! ProfileApp is the ultimate app that empowers you to build and manage your digital portfolio effortlessly</p>
                </div>
            </aside>   
             <!-- Create articles for the first 4 members, per article it includes their: Profile Picture, Name, Description, Link to their personal page -->
            <section class="team">
                <?php for($t = 0; $t < 4; $t++){ echo
                "<a href='details?id=".$users[$t]['ID']."'>
                    <article class='teamMember'>
                            <div>
                                <img class='avatar' src='".(file_exists($users[$t]['Profielfoto']) ? $users[$t]['Profielfoto'] : "public/images/defaultProfilePic.jpg")."'>
                            </div>
                            <div>
                                <h2>".$users[$t]['Naam']."</h2>
                                <p>".$users[$t]['Beschrijving']."</p>
                            </div>
                    </article>
                </a>";
                }?>
            </section>
            <!-- Same functionality as above, all users with an ID higher than 4 are displayed -->
            <section class="users">
                <?php for($u = 4; $u < count($users); $u++){ echo
                "<a href='details?id=".$users[$u]['ID']."'>
                    <article class='user'>
                            <div>
                                <img class='userAvatar' src='".$users[$u]['Profielfoto']."'>
                            </div>
                            <div>
                                <h3>".$users[$u]['Naam']."</h3> <br>
                                <p>".$users[$u]['Beschrijving']."</p>
                            </div>
                    </article>
                </a>";
                }?>
            </section>
        </main>
    </div>
</body>