<html>
	<head>
		<title>Change Password</title>
    </head>
	<body>
		<div class="changePassword">
			<h1>Change password</h1>
			<form action="changePass" method="post">
				<label for="username"></label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="oldPassword"></label>
				<input type="password" name="oldPassword" placeholder="Old password" id="oldPassword" required>
                <label for="newPassword"></label>
				<input type="password" name="newPassword" placeholder="New password" id="newPassword" required>
				<input type="submit" value="Change password">
			</form>
		</div>
	</body>
</html>