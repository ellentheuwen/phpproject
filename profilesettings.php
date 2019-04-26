<?php
    include_once("classes/User.class.php");
    include_once("helpers/Security.class.php");
    
    if( !empty($_POST) ){
        try
        {
            $security = new Security();
            $security->password = $_POST['password'];
            $security->passwordConfirmation = $_POST['password_confirmation'];
			
			
			$email = htmlspecialchars($_POST['email']);
			$username = htmlspecialchars($_POST['username']);
			$firstname= htmlspecialchars($_POST['firstname']);
			$lastname= htmlspecialchars($_POST['lastname']);


    		$password = $_POST['password'];

            if( $security->passwordsAreSecure() ){
				$user = new User();        
				$user->setEmail($email);
				$user->setUsername($username);
				$user->setPassword($password);
				$user->setFirstname($firstname);
				$user->setLastname($lastname);

				if( $user->changeSettings() ) {
					$user->login();
				}
			}
			else {
				$error = "We can't save that password. Can you try again?";
			}
        }
        catch(Exception $e) {
			$error = $e->getMessage();
        }

    }
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Let's Talk Type - Settings</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Overpass" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet"></head>

</head>
<body>
	<div class="talktypeSettings">

		<div class="form form--login">
			<form action="" method="post">
				<h2 class="form__title">Change your profile settings</h2>

                <?php if(isset($error)): ?>
				<div class="form__error">
					<p>
						💩 <?php echo $error; ?>
					</p>
				</div>
                <?php endif; ?>

				<div class="form__field">
					<input type="text" id="username" name="username" placeholder="New username" class="inputField">
				</div>

				<div class="form__field">
					<input type="text" id="firstname" name="firstname" placeholder="Change firstname" class="inputField">
				</div>

				<div class="form__field">
					<input type="text" id="lastname" name="lastname" placeholder="Another lastname" class="inputField">
				</div>

				<div class="form__field">
					<input value="" type="text" id="email" name="email" placeholder="Update your e-mail?" class="inputField">
				</div>

				<div class="form__field">
					<input type="password" id="password" name="password" placeholder="Pick a password" class="inputField">
				</div>

                <div class="form__field">
					<input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" class="inputField">
				</div>

				<div class="form__field">
					<input type="submit" value="Save your changes." class="btn btn--primary">	
				</div>

                <p id="gotAccount">Back to the <a href="index.php">homepage</a></p>


			</form>
		</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</body>
</html>