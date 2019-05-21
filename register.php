<?php
include_once 'bootstrap.php';

if (!empty($_POST['submit'])) {
    /*
    CHECKS IF EVERYTHING
    IS FILLED IN
    */
    if (empty($_POST['email']) || empty($_POST['password']) || empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['username'])) {
        $error = true;
    } else {
        $user = new User();
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['password']);
        $user->setFirstname($_POST['firstname']);
        $user->setLastname($_POST['lastname']);
        $user->setUsername($_POST['username']);

        if ($user->register()) {
            session_start();
            $_SESSION['email'] = $email;
            header('Location:index.php');
        }
    }
}
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

    <title>Let's Talk Type — Register</title>
</head>
<body>
	<div class="talktypeRegister talktypeLogin--register">
		<div class="form form--login">
			<form action="" method="post">
				<h2 class="form__title">Let's Talk Type — Register</h2>

				<?php if (isset($error)): ?>
                <div class="form__error">
					<p> You didn't fill in everything, try again! </p>
				</div>
				<?php endif; ?>


				<div class="form__field">
					<input type="text" id="email" name="email" placeholder ="Email">
                </div>
                <div class="form__field">
					<input type="text" id="firstname" name="firstname" placeholder="Firstname">
                </div>
                <div class="form__field">
					<input type="text" id="lastname" name="lastname" placeholder="Lastname">
                </div>

                <div class="username__error">
			        <p id="username_error"></p>
                </div>
                
                <div class="form__field">
					<input type="text" id="username" name="username" placeholder= "Username">
				</div>
				<div class="form__field">
					<input type="password" id="password" name="password" placeholder="Password">
				</div>

				<div class="form__btn">
					<input type="submit" name="submit" value="Let's register now!" >	
				</div>

				<p id="gotAccount">Already got an account? <a href="login.php">Log in here</a></p>

			</form>
		</div>
	</div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>
             
/* REFERS TO THE AJAX
CHECK IS THE USERNAME IS 
ALREADY TAKEN IN DB */

$("#username").on("keyup", function (e) {
	var name = $("#username").val();
	$.ajax({
	    method: "POST",
		url: "ajax/usernameval.php",
		data: {name: name},
		dataType: 'json'
		})
  		.done((function (res)  {
		if(res.status == "auwtch"){
		$("#username_error").html(res.message);
        }else {
        $("#username_error").html();}
    
		  }));
    e.preventDefault();
        });
</script>