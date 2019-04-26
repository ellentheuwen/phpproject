<nav class="navbar">
    <a href="index.php" id="logo">Let's <br> Talk <br>Type</a>

    <a href="#">Upload</a>
    
    <form action="" method="get">
      <input type="text" name="search">
    </form>
    
    <a href="profilesettings.php">Settings</a>
    <a href="#">|</a>

    <!-- fullname tonen hier werkt nog niet -->
    <a href="logout.php" class="navbar__logout">Hi <?php if ( isset($username) ){echo $username;} ?>, logout?</a>
</nav>