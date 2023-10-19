<html>
	<head>
		<title>Login</title>
    </head>
	<body>
		<div class="login">
			<h1>Login</h1>
			<form action="authenticate" method="post">
				<label for="username">
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password">
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<input type="submit" value="Login">
			</form>
		</div>
        <div class="signup">
			<h1>Login</h1>
			<form action="signup" method="post">
                <label for="FirstName"></label>
				<input type="text" name="FirstName" placeholder="FirstName" id="FirstName" required>
                <label for="LastName"></label>
				<input type="text" name="LastName" placeholder="LastName" id="LastName" required>
                <label for="Mail"></label>
				<input type="email" name="Mail" placeholder="E-Mail" id="Mail" required>
				<label for="username"></label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password"></label>
				<input type="password" name="password" placeholder="Password" id="password" required>
                <label for="passwordConfirm"></label>
				<input type="password" name="passwordConfirm" placeholder="Confirm password" id="passwordConfirm" required>
				<input type="submit" value="Sign up">
			</form>
		</div>
	</body>
</html>