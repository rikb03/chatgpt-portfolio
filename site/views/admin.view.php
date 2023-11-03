<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin panel</title>
    <link rel="stylesheet" href="../public/styles/main.css" type="text/css">
    <link rel="stylesheet" href="../public/styles/nav.css" type="text/css">
    <link rel="stylesheet" href="../public/styles/admin.css" type="text/css">
    <script src="../public/js/search.js"></script>
</head>
<body>

<div class="container">
    <header>
        <nav class="navbar">
            <div class="local">
                <h2>Profile App</h2>
            </div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Login</a>
                </li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>
    <main>
        <div class="users">
            <h1>Admin</h1>
            <section>
                <h3>Users list</h3>
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
                <div class="list-container">
                <ul class="horizontal-list" id="myUL">
                    <li><a href="/edit"><?=$currentUser[0]['firstName'];?></a></li>
                    <li><a href="/edit">Jari</a></li>
                    <li><a href="/edit">Rik</a></li>
                    <li><a href="/edit">Dorian</a></li>
                    <li><a href="/edit">Ashraf</a></li>
                    <li><a href="/edit">Test</a></li>
                    <li><a href="/edit">TestTest</a></li>
                </ul>
                </div>
            </section>
        </div>
    </main>
</div>
    </body>
</html>

