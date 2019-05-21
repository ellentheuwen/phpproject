
<?php

include_once 'bootstrap.php';
session_start();

$avatar = User::avatar();
$bio = User::bio();

?><!DOCTYPE html>
<html lang="en" class="profiel">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Let's Talk Type — Profile</title>

  <link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/profiel.css">
</head>
<body>
<?php include_once 'nav.inc.php'; ?>

<div class="container">
  <h3>Profielfoto</h3>

<div class="profile">
        <img class="profile--image" src="<?php echo $avatar, $bio; ?>" alt="avatar"></a>
</div>


<div class="profileImage">

<form enctype="multipart/form-data" action="uploadavatar.php" method="POST"> 
  <input type="file" name="avatar" capture="camera" required/><br>
  <input type="submit" value="upload" name="upload"/>  
</form>      
</div>

<h3>Biografie</h3>

<?php

$conn = Db::getInstance();

if (isset($_POST['submit'])) {
    $bio = $_POST['bio'];

    if (empty($bio)) {
        echo "<font color='red'>Tekstveld is leeg!</font><br/>";
    } else {
        $statement = $conn->prepare("SELECT id 
                                      FROM users 
                                      WHERE email = '".$_SESSION['email']."'");
        $statement->execute();
        $id = $statement->fetch(PDO::FETCH_COLUMN);

        $insert = $conn->prepare("UPDATE users 
                                  SET bio = '".$bio."' 
                                  WHERE users.id='".$id."';");
        $insert->bindParam(':bio', $bio);
        $insert->execute();
    }
}
    ?>
    
    <form method="post" action="profiel.php">  
<textarea name="bio" rows="5" cols="40" placeholder="Schrijf hier iets over jezelf!"><?php echo $bio; ?></textarea>
<br><br>
<input type="submit" name="submit" value="Submit">  
</form>
      <h3> Gegevens wijzigen </h3>

<ul>
<li><a href="changePassword.php">Verander wachtwoord</a></li>
<li><a href="changeEmail.php">Verander email</a></li>
</ul>




    
</body>
</html>





  
 
 
