<?php
  session_start();
  include_once("classes/Item.class.php");
  include_once("classes/User.class.php");

  User::checkLogin();

  $posts= Item::getAll();
  
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Let's Talk Type - Home</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Overpass" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet"></head>
<body>
  
  <div id="talktype">
  <?php include_once("nav.inc.php"); ?>
  
  <div class="feed">
    <?php foreach($posts as $p): ?>
    <a href="details.php?watch=<?php echo $p['id']; ?>" class="feed__posts" style="background-image: url(<?php echo $p['picture']; ?>)">
    </a>
    <?php endforeach; ?>
  </div>
</div>

<button id="load--more">Load More</button>

</body>
</html>