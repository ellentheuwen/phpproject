<?php
session_start();

include_once 'bootstrap.php';
User::checkLogin();

  $posts = Post::getAll();
  $post = count($posts);

  if (!empty($posts)) {
      $show = true;
  } else {
      $error = true;
  }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Let's Talk Type — Home</title>
</head>
<body>

<?php include_once 'nav.inc.php'; ?>

<h2 class="feedtitle">Let's go, this feed is totally yours</h2>
<?php if (isset($show)): ?>
<div class="collection">
<div class="collection__itemform">

  <form enctype="multipart/form-data" action="upload.php" method="POST" class="searchform"> 
    <input type="file" name="image" id="img" style="display:none;"/>
	  <label for="img" style= "text-align:center; color: #E7A06E;">Click me to choose what you'd like to post</label>	<br>		
    <br><textarea name="description" class= "uploaddescription" rows="2" placeholder="Let's write down a description for your post" required></textarea><br>
    <input type="submit" value="Let's upload" name="upload" class="input"/>  
  </form>     
   
</div>

  <?php foreach ($posts as $p): ?>
  <div class="collection__item">
      <a href="detail.php?id=<?php echo $p['id']; ?>" > <img class="collection--image" src="<?php echo $p['image']; ?>" alt="Post"></a>
        <p><span class="descriptiontitle">Let's talk: </span><?php echo $p['description']; ?></p>
  </div>
<?php endforeach; ?> 
</div>

<?php endif; ?>

</body>
</html>