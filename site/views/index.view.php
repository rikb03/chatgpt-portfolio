<!DOCTYPE HTML>
<head> 
    <link rel='stylesheet' href='public/styles/main.css'>
    <link rel='stylesheet' href='public/styles/home.css'>
    <link rel='stylesheet' href='public/styles/nav.css'>
</head>
<body>
    <div class="container">
        <?php require('partials/nav.php'); ?>
        <main>
            <aside>
                <div class="post">
                    <h1>Welcome!</h1>
                    <p>Placeholder welcome message</p>
                </div>
            </aside>    
            <section class="team">
                <?php for($t = 0; $t < 4; $t++){ echo
                "<a href='details?id=".$users[$t]['ID']."'>
                    <article class='teamMember'>
                            <div>
                                <img class='avatar' src='".$users[$t]['Profielfoto']."'>
                            </div>
                            <div>
                                <h2>".$users[$t]['Naam']."</h2>
                                <p>".$users[$t]['Beschrijving']."</p>
                            </div>
                    </article>
                </a>";
                }?>
            </section>
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