<?php
include_once 'bootstrap.php';

User::login();

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://fonts.googleapis.com/css?family=Overpass" rel="stylesheet">
  	<link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet"></head>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css"> 
	<title>Let's Talk Type — Log in</title>
</head>
<body>
	
<div class="talktypeLogin talktypeLogin--register">
		<div class="form form--login">
			<form action="" method="post">
				<h2 class="form__title">Let's Talk Type — Log in</h2>

				<?php if (isset($error)): ?>
				<div class="form__error">
					<p>
						Sorry, we can't log you in with that email address or password. Can you try again?
					</p>
				</div>
				<?php endif; ?>

				<div class="form__field">
					<input type="text" name="email" placeholder="Email">
				</div>

				<div class="form__field">
					<input type="password" name="password" placeholder="Password">
				</div>

				<div class="form__btn">
					<input type="submit" name="submit" value="Let's go buddy!" >	
				</div>

				<div>
					<p id="getAccount">New here? <a href="register.php">Create an account</a></p>
				</div>
			</form>
		
		</div>
	</div>
</body>
</html>
