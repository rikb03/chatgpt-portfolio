<?php
echo "<h1> Change your personal data </h1>";


//edit pagina user view
require "../functions/db.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UserDetails</title>
    <link rel="stylesheet" href="../public/styles/userDetails.css" type="text/css">
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
        <div class="wrapper">
            <div class="profilePic">
                <img src="../public/images/avatar.png" alt="avatar" class="avatar">
                <h2>Profile pic</h2>
            </div>
            <div class="userData">
                <h2>User Data</h2>
                <form class="formData">
                    <label for="firstname">Firstname</label>
                    <input type="text" name="firstname" placeholder="Firstname" id="lastname">
                    <label for="lastname">Lastname</label>
                    <input type="text" name="lastname" placeholder="Lastname" id="lastname">
                    <label for="mail">Email</label>
                    <input type="text" name="mail" placeholder="Email" id="mail">
                    <label for="phone">Phone number</label>
                    <input type="text" name="phone" placeholder="Phone number" id="phone">
                    <label for="birth">Date of birth</label>
                    <input type="date" id="birth" name="birth">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Password" id="password" required>
                    <input type="submit" value="save" class="submit">
                </form>
            </div>
            <div class="certificates">
                <h2>Certificates</h2>
                <form>
                </form>
            </div>
        </div>
    </main>
    <aside>
    </aside>
</div>
</body>
</html>
<!--2c5e970889949d154167b1a0f426536ae8ded278-->
