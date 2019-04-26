<?php
	include_once("functions.inc.php");
	
	// get user and password from POST
	if( !empty($_POST) ) {
		$email = $_POST['email'];
		$password = $_POST['password'];

		// check if user can login (use function)
		if( canILogin($email, $password) ) {
			session_start();
			$_SESSION['email'] = $email;

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
  <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet"></head>

</head>
<body>
	<div class="talktypeLogin">
		<div class="form form--login">
			<form action="" method="post">
				<h2 class="form__title">Hi! Sign in to talk</h2>

				<?php if( isset($error) ): ?>
				<div class="form__error">
					<p>
						Sorry, have you written a typo maybe? Try again to log in.
					</p>
				</div>
				<?php endif; ?>

				<div class="form__field">
					<input type="text" id="email" name="email" placeholder="Username" class="inputField">
				</div>
				<div class="form__field">
					<input type="password" id="password" name="password" placeholder="Password" class="inputField">
				</div>

				<div class="form__field">
					<input type="submit" value="Sign in!" class="btn btn--primary">	
					<p id ="getAccount">New Type Talker? <a href="register.php">Create account!</a></p>

				
				</div>

			</form>
		</div>
	</div>
</body>
</html>