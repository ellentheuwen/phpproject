<?php
	include_once("functions.inc.php");
	
	// get user and password from POST
	if( !empty($_POST) ) {
		$username = $_POST['email'];
		$password = $_POST['password'];

		// check if user can login (use function)
		if( canILogin($username, $password) ) {
			session_start();
			$_SESSION['username'] = $username;

			// if ok -> redirect to index.php
			header('Location: index.php');
		}
		else {
			$error = "Login failed";
		}

		

	} 


?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Let's Talk Type - Log in</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Overpass" rel="stylesheet">

</head>
<body>
	<div class="talktypeLogin">
		<div class="form form--login">
			<form action="" method="post">
				<h2 form__title>Hi! Sign in to talk</h2>

				<?php if( isset($error) ): ?>
				<div class="form__error">
					<p>
						Sorry, have you written a typo maybe? Try again to log in.
					</p>
				</div>
				<?php endif; ?>

				<div class="form__field">
					<input type="text" id="email" name="email" placeholder="Email">
				</div>
				<div class="form__field">
					<input type="password" id="password" name="password" placeholder="Password">
				</div>

				<div class="form__field">
					<input type="submit" value="Sign in" class="btn btn--primary">	
					<input type="checkbox" id="rememberMe"><label for="rememberMe" class="label__inline">Remember me</label>
					<p>No account yet? <a href="register.php">Register here</a></p>

				
				</div>

			</form>
		</div>
	</div>
</body>
</html>