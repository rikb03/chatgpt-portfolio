<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../public/styles/forgotPassword.css" type="text/css">
</head>
<body>

<div class="container">
    <?php require('partials/nav.php'); ?>
<main>
		<div class="changePassword">
			<h1>Change password</h1>
            <p>Fill in to change your password</p>
			<form action="changePass" method="post">
				<label for="username">Username</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="mail">mail</label>
				<input type="mail" name="mail" placeholder="mail" id="mail" required>
                <label for="newPassword"> New password</label>
				<input type="password" name="newPassword" placeholder="New password" id="newPassword" required>
				<input type="submit" value="Change password" class="button">
			</form>
        </div>
</main>
		</div>
	</body>
</html>