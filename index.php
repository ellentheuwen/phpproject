<?php
  session_start();
  include_once 'classes/Item.class.php';
  include_once 'classes/User.class.php';

  User::checkLogin();

  $posts = Item::getAll();

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
  <?php include_once 'nav.inc.php'; ?>
  
  <div class="feed">

    <?php foreach ($posts as $p): ?>
    <a href="details.php?id=<?php echo $p['id']; ?>" > <img class="feed__posts"src="<?php echo $p['picture']; ?>" alt="Post"></a>   
    <div class="info_posts"> 
        <p class="postinfo"><?php echo $p['location']; ?></p> 
        <p class="postinfo"><?php echo $p['description']; ?> <?php echo $p['hashtags']; ?></p>
        <p class="postinfo">Total likes: <?php echo $p['likes']; ?></p>
<?php endforeach; ?>

    </div>
  </div>
</div>

<button class="load_more">Let's load some more really nice posts</button>

</body>
</html>