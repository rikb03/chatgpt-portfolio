<?php
echo "<h1> Alleen een admin hoort dit te kunnen zien </h1>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../public/styles/main.css" type="text/css">
</head>
<body>

<div class="container">
   <?php require('partials/nav.php'); ?>
    <main>
        <div class="users">
            <h1>Admin</h1>
            <section>
                <h3>Users list</h3>
                <input type="text" placeholder=" Search " name="search" class="search">
                <div class="list-container">
                    <ul class="horizontal-list">
                        <li>
                            <img src="avatar.png" alt="avatar">
                            <h2>Voornaam Achternaam</h2>
                            <a href="#"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, repellendus.</p></a>
                        </li>
                        <li>
                            <img src="avatar.png" alt="avatar">
                            <h2>Voornaam Achternaam</h2>
                            <a href="#"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, repellendus.</p></a>
                        </li>
                        <li>
                            <img src="avatar.png" alt="avatar">
                            <h2>Voornaam Achternaam</h2>
                            <a href="#"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, repellendus.</p></a>
                        </li>
                        <li>
                            <img src="avatar.png" alt="avatar">
                            <h2>Voornaam Achternaam</h2>
                            <a href="#"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, repellendus.</p></a>
                        </li>
                        <li>
                            <img src="avatar.png" alt="avatar">
                            <h2>Voornaam Achternaam</h2>
                            <a href="#"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, repellendus.</p></a>
                        </li>
                        <li>
                            <img src="avatar.png" alt="avatar">
                            <h2>Voornaam Achternaam</h2>
                            <a href="#"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, repellendus.</p></a>
                        </li>
                        <li>
                            <img src="avatar.png" alt="avatar">
                            <h2>Voornaam Achternaam</h2>
                            <a href="#"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, repellendus.</p></a>
                        </li>
                        <li>
                            <img src="avatar.png" alt="avatar">
                            <h2>Voornaam Achternaam</h2>
                            <a href="#"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, repellendus.</p></a>
                        </li>
                    </ul>
                </div>
            </section>
        </div>
    </main>
</div>
</body>
</html>
