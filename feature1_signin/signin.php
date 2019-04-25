<?php 
//require_once('server.php');
require_once('classes/User.class.php');

if(!empty($_POST)){

    $user = new User();
    $user->setFirstName($_POST['firstName']);
    $user->setLastName($_POST['lastName']);
    $user->setUsername($_POST['username']);
    $user->setEmail($_POST['email']); 
    $user->setPassword($_POST['password']);
    $user->setPasswordConfirmation($_POST['password_confirmation']);
    $result = $user->register();
    var_dump($result);
    
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Sign In | Hacktag</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Sign in</h2>
  </div>
  <div class="form__error hidden">
	<p>
		Some error here
    </p>
  </div>
	
  <form method="post" action="">
      <!--firstName-->
  	  <div class="input-group">
  	  <label>First name</label>
  	  <input type="text" id="firstName" name="firstName">
      </div>
      <!--lastName-->
      <div class="input-group">
  	  <label>Last name</label>
  	  <input type="text" id="lastName" name="lastName">
      </div>
      <!--username-->
      <div class="input-group">
  	  <label>Username</label>
  	  <input type="text" id="username" name="username">
      </div>
      <!--email-->
  	  <div class="input-group">
  	  <label>Email</label>
  	  <input type="email" id="email" name="email">
      </div>
      <!--password-->
  	  <div class="input-group">
  	  <label>Password</label>
        <input type="password" id="password" name="password">
       </div>
        <!--confirm password-->
  	  <div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" id="password_confirmation" name="password_confirmation">
      </div>
      <!--submit-->
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Sign me up!</button>
  	</div>
  	<p>
  		Already a member? <a href="#">Log in</a>
  	</p>
  </form>
</body>
</html>