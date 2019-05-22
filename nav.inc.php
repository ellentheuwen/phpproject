<?php
include_once 'bootstrap.php';

$username = User::username();
$avatar = User::avatar();
?>

<nav class="navbar">
   
  <a href="index.php" class="logo">Let's <br>Talk <br>Type</a>
    
  <form action="search.php" method="get">
    <input type="text" name="search"  placeholder="Search">
     <input type="submit" value="Let's go">
  </form>

  <a href="settings.php">Settings</a>

  <a href="#">|</a>

  <a href="logout.php" class="navbar__logout">Hi <?php echo $username; ?>, log out?</a>
</nav>