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
			$bio= htmlspecialchars($_POST['bio']);

    		$password = $_POST['password'];

            if( $security->passwordsAreSecure() ){
				$user = new User();        
				$user->setEmail($email);
				$user->setPassword($password);
				$user->setBio($bio);

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

		<div class="form form--settings">
			<form action="" method="post">
			<h2 class="form__title">Let's Talk Type —— Settings </h2>

                <?php if(isset($error)): ?>
				<div class="form__error">
					<p>
						💩 <?php echo $error; ?>
					</p>
				</div>
                <?php endif; ?>

				<div class="form__field">
				<input type="file" name="file" id="img" style="display:none;"/>
					<label for="img" style= "text-align:center; color: #E7A06E;">Click me to choose an avatar</label>				
				</div>				

				<div class="form__field">
					<input type="text" id="bio" name="bio" placeholder="Type a bio right here" class="inputField">
				</div>

				<div class="form__field">
					<input type="password" id="password" name="password" placeholder="Pick a password" class="inputField">
				</div>

                <div class="form__field">
					<input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" class="inputField">
				</div>

				<div class="form__field">
					<input value="" type="text" id="email" name="email" placeholder="Verify by telling your email" class="inputField">
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