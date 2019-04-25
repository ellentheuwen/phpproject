<nav class="navbar">
    <a href="index.php" id="logo">Let's <br> Talk <br>Type</a>

    <a href="#">Upload</a>
    
    <form action="" method="get">
      <input type="text" name="search">
    </form>
    
    <a href="#">Settings</a>
    <a href="#">|</a>

    <a href="logout.php" class="navbar__logout">Hi <?php echo $_SESSION['username']; ?>, log out?</a>
</nav>