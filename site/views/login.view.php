<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../public/styles/login.css" type="text/css">
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
        <div class="login" id="loginForm">
            <h1>Login</h1>
            <form action="authenticate" method="post" class="form">
                <label for="username" class="labelUsername">Username</label>
                <input type="text" name="username" placeholder="Username" id="username" required class="username">
                <label for="password" class="labelPassword">Password
                </label>
                <input type="password" name="password" placeholder="Password" id="password" required class="password">
                <div class="buttons">
                    <input type="submit" value="Login" class="buttom">
                    <button onclick="showSignUpForm()" class="showButton" type="button">Sign-Up</button>
                </div>
            </form>
            <a href="">Forgot password?</a>
        </div>
        <div class="signup" id="signUpForm" style="display: none;">
            <h1>Sign-Up</h1>
            <form action="signup" method="post">
                <label for="FirstName" class="labelFirstname">Firstname</label>
                <input type="text" name="FirstName" placeholder="FirstName" id="FirstName" required class="firstname">
                <label for="LastName" class="labelLastname">Lastname</label>
                <input type="text" name="LastName" placeholder="LastName" id="LastName" required class="lastname">
                <label for="Mail" class="labelMail">Mail</label>
                <input type="email" name="Mail" placeholder="E-Mail" id="Mail" required class="mail">
                <label for="username" class="labelUsername2">Username</label>
                <input type="text" name="username" placeholder="Username" id="username" required class="username2">
                <label for="password" class="labelPassword">Password</label>
                <input type="password" name="password" placeholder="Password" id="password" required class="password2">
                <label for="passwordConfirm" class="labelConfirm">Confirm password</label>
                <input type="password" name="passwordConfirm" placeholder="Confirm password" id="passwordConfirm" required class="confrimPassword">
                <div class="buttons2">
                    <input type="submit" value="Sign up" class="buttom2">
                    <button onclick="showLoginForm()" class="showButton2" type="button">Login</button>
                </div>
            </form>
            <a href="">Forgot password?</a>
        </div>
    </main>
</div>
<script>
    const Template_Home = document.querySelector(".hamburger");
    const navMenu = document.querySelector(".nav-menu");

    Template_Home.addEventListener("click", mobileMenu);

    function mobileMenu() {
        Template_Home.classList.toggle("active");
        navMenu.classList.toggle("active");
    }

    function showLoginForm() {
        document.getElementById('loginForm').style.display = '';
        document.getElementById('signUpForm').style.display = 'none';
    }
    function showSignUpForm() {
        document.getElementById('loginForm').style.display = 'none';
        document.getElementById('signUpForm').style.display = '';
    }

</script>
</body>
</html>