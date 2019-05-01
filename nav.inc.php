<?php
include_once("bootstrap.php");
$conn = Db::getInstance();

// Voor de username te fixen bij 'log uit'
$stm = $conn-> prepare ("SELECT id FROM users WHERE email = '".$_SESSION['email']."'");
$stm->execute();
$id=$stm->fetch(PDO::FETCH_COLUMN);

$statement = $conn->prepare("SELECT username FROM users WHERE users.id=:id");
$statement->bindValue(":id", $id); 
$statement->execute();
$username=$statement->fetch(PDO::FETCH_COLUMN);

?>

<nav class="navbar">
    <a href="index.php" id="logo">Let's <br> Talk <br>Type</a>

    <a href="uploadpost.php">Upload some cool type</a>
    
    <form action="" method="get">
      <input type="text" name="search" placeholder="search">
    </form>

    <a href="#">Profile</a>
    <a href="#">|</a>
    <a href="profilesettings.php">Settings</a>
    <a href="#">|</a>
    
    <a href="logout.php" class="navbar__logout">Hi <?php echo $username; ?>, log out?</a>
</nav>