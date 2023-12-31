<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- Loads the css files -->
    <link rel="stylesheet" href="../public/styles/main.css" type="text/css">
    <link rel="stylesheet" href="../public/styles/nav.css" type="text/css">
    <link rel="stylesheet" href="../public/styles/login.css" type="text/css">
</head>
<body>
<div class="container">
    <!-- Inserts the navigation bar -->
    <?php require('partials/nav.php'); ?>
    <main>
        <!-- The form to login, it asks for username and password.
             On submit it goes to the authenticate controller -->
        <div class="login" id="loginForm">
            <h1>Login</h1>
            <form action="authenticate" method="post" class="form">
                <input type="hidden" name="method" value="login">
                <label for="username" class="labelUsername">Username</label>
                <input type="text" name="username" placeholder="Username" id="username" required class="username">
                <label for="password" class="labelPassword">Password
                </label>
                <input type="password" name="password" placeholder="Password" id="password" required class="password">
                <!-- If there is an error on submit it will be displayed here -->
                <p id ='errorLogin' class='error' style='display:none'></p>
                <div class="buttons">
                    <input type="submit" value="Login" class="button">
                    <!-- Button to change to the sign up form -->
                    <button onclick="showSignUpForm()" class="showButton" type="button">Sign-Up</button>
                </div>
            </form>
            <!-- Link to the changepassword page -->
            <a href="changepassword">Forgot password?</a>
        </div>
        <!-- The form to sign up, it asks for firstname, lastname, mail, username and password.
             On submit it goes to the signup controller -->
        <div class="signup" id="signUpForm" style="display: none;">
            <h1>Sign-Up</h1>
            <form action="signup" method="post" class="form">
                <input type="hidden" name="method" value="signup">
                <label for="FirstName" class="labelFirstname">Firstname</label>
                <input type="text" name="FirstName" placeholder="FirstName" id="FirstName" required class="firstname">
                <label for="LastName" class="labelLastname">Lastname</label>
                <input type="text" name="LastName" placeholder="LastName" id="LastName" required class="lastname">
                <label for="Mail" class="labelMail">Mail</label>
                <input type="email" name="Mail" placeholder="E-Mail" id="Mail" required class="mail">
                <label for="username" class="labelUsername2">Username</label>
                <input type="text" name="username" placeholder="Username" id="username_signup" required class="username2">
                <label for="password" class="labelPassword2">Password</label>
                <input type="password" name="password" placeholder="Password" id="password_signup" required class="password2">
                <label for="passwordConfirm" class="labelConfirm">Confirm password</label>
                <input type="password" name="passwordConfirm" placeholder="Confirm password" id="passwordConfirm" required class="confirmPassword">
                <!-- If there is an error on submit it will be displayed here -->
                <p id ='errorSignup' class='error' style='display:none'></p>
                <div class="buttons2">
                    <input type="submit" value="Sign up" class="button2">
                    <!-- Button to change to the login form -->
                    <button onclick="showLoginForm()" class="showButton2" type="button">Login</button>
                </div>
            </form>
            <!-- Link to the changepassword page -->
            <a href="changepassword">Forgot password?</a>
        </div>
    </main>
</div>
<!-- Loads the javascript files -->
<script src="../public/js/login.js"></script>
<script src="../public/js/error.js"></script>
</body>
</html>