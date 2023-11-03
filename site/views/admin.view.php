<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin panel</title>
    <link rel="stylesheet" href="../public/styles/main.css" type="text/css">
    <link rel="stylesheet" href="../public/styles/nav.css" type="text/css">
    <link rel="stylesheet" href="../public/styles/admin.css" type="text/css">
    <script src="../public/js/search.js"></script>
    <script src="../public/js/nav.js"></script>
</head>
<body>

<div class="container">
    <?php require('partials/nav.php'); ?>
    <main>
        <div class="users">
            <h1>Admin</h1>
            <section>
                <h3>Users list</h3>
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
                <div class="list-container">
                <ul class="horizontal-list" id="myUL">
                    <?php for($u = 4; $u < count($users); $u++){ echo
                        "<li><a href='edit?id=".$users[$u]['ID']."'>
                            <article class='user'>
                            <div>
                                <h3>".$users[$u]['Naam']."</h3> <br>
                            </div>
                    </article>
                </a></li>";
                    }?>
                </ul>
                </div>
            </section>
        </div>
    </main>
</div>
</body>
</html>

