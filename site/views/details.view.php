<!DOCTYPE HTML>
<head> 
    <link rel='stylesheet' href='public/styles/main.css'>
</head>
<body>
    <div class="container">
        <?php require('partials/nav.php'); ?>
        <main>
            <?php foreach($users as $user){
                echo "Hello I am ". $user['Naam'];
                }
                ?>
        </main>
    </div>
</body>