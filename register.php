<?php
    include_once("classes/User.class.php");
    include_once("helpers/Security.class.php");
    
    if( !empty($_POST) ){
        try
        {
            $security = new Security();
            $security->password = $_POST['password'];
            $security->passwordConfirmation = $_POST['password_confirmation'];

            if( $security->passwordsAreSecure() ){
                $user = new User();        
                $user->setEmail( $_POST['email'] );
				$user->setPassword( $_POST['password'] );
				if( $user->register() ) {
					$user->login();
				}
			}
			else {
				$error = "We can't log you in with that password. Can you try again?";
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
  <title>Let's Talk Type - Register</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Overpass" rel="stylesheet">

</head>
<body>
	<div class="talktypeLogin talktypeLogin--register">
		<div class="form form--login">
			<form action="" method="post">
				<h2 form__title>Let's register first buddy</h2>

                <?php if(isset($error)): ?>
				<div class="form__error">
					<p>
						💩 <?php echo $error; ?>
					</p>
				</div>
                <?php endif; ?>

				<div class="form__field">
					<input value="" type="text" id="email" name="email" placeholder="What's your e-mail?">
				</div>
				<div class="form__field">
					<input type="password" id="password" name="password" placeholder="Choose a password">
				</div>

                <div class="form__field">
					<input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password">
				</div>

				<div class="form__field">
					<input type="submit" value="Sign me up!" class="btn btn--primary">	
				</div>

				<p>Already got an account? <a href="login.php">Log in here</a></p>

			</form>
		</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/talktype.js"></script>
</body>
</html>