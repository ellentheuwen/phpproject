<nav class="navbar">
    <a href="index.php" class="logo">Let's Talk Type</a>

    <form action="" method="get">
      <input type="text" name="search">
    </form>
    
    <a href="#">Settings</a>
    <a href="#">|</a>

    <a href="logout.php" class="navbar__logout">Hi <?php echo $_SESSION['username']; ?>, log out?</a>
</nav>