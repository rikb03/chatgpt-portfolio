<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change password</title>
	<!-- Loads the css files -->
    <link rel="stylesheet" href="../public/styles/main.css" type="text/css">
    <link rel="stylesheet" href="../public/styles/nav.css" type="text/css">
    <link rel="stylesheet" href="../public/styles/forgotPassword.css" type="text/css">
</head>
<body>
<div class="container">
	<!-- Inserts the navigation bar -->
    <?php require('partials/nav.php'); ?>
<main>
		<div class="changePassword">
			<h1>Change password</h1>
            <p>Fill in to change your password</p>
			<!-- Form to update password.
				 Asks for username, mail and new password, on submit sends the data to changePass controller -->
			<form action="changePass" method="post">
				<input type="hidden" name="method" value="passwordchange">
				<label for="username">Username</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="mail">mail</label>
				<input type="mail" name="mail" placeholder="mail" id="mail" required>
                <label for="newPassword"> New password</label>
				<input type="password" name="newPassword" placeholder="New password" id="newPassword" required>
				<!-- If there is an error on submit it will be displayed here -->
				<p id ='error' class='error' style='display:none'></p>
				<input type="submit" value="Change password" class="button">
			</form>
        </div>
</main>
		</div>
		<!-- Loads the javascript files -->
		<script src="../public/js/error.js"></script>
	</body>
</html>