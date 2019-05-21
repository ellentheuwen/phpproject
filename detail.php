<?php
include_once 'bootstrap.php';

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

$posts = Post::detailPagina();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
	<title>Let's Talk Type — Detail</title></head>
<body>

<?php include_once 'nav.inc.php'; ?>

<div class="collection__detail" style="margin-top:180px">
	<?php foreach ($posts as $c): ?>
	<img src="<?php echo $c['image']; ?>" alt="Post">

	  <div class="clearfix">
	  <p><span class="descriptiontitle" style="margin-left:-100px;">Colors in this post: </span></p>

		<?php
          $img = $c['image'];
          $palette = Post::detectColors($img, 5, 1);

          foreach ($palette as $color) {
              echo '
			  <div class="color">
			  <div class="bol" style="background:#'.$color.';"></div>
			  <p>#'.$color.'</p></div>';
          }
        ?>
		<?php endforeach; ?>
	  </div>
	  <p><span class="descriptiontitle" style="margin-left: 0px; margin-right:40px;">Description: </span><?php echo $c['description']; ?></p>
</div>
<?php
    include_once 'bootstrap.php';

    if (!empty($_POST)) {
        try {
            $comment = new Comment();
            $comment->setText($_POST['comment']);
            $comment->Save();
        } catch (\Throwable $th) {
        }
    }
    $comments = Comment::getAll();
?>
<div>
<p><span class="descriptiontitle" style="margin-left: 30px; margin-right:30px;">Comments: </span></p>

	<div class="errors"></div>
	
	<form method="post" action="" class="formComment">
	<div class="statusupdates">

		<ul id="listupdates">
		
			<?php
                foreach ($comments as $c) {
                    echo '<li>'.$c->getText().'</li>';
                }
            ?>
		</ul>
		<textarea name="comment" id="comment" placeholder="Write down a comment" cols="30"></textarea>
		<input id="btnSubmit" type="submit" value="Let's leave your comment" class="formComment__btn" />
		</div>
	</form>
</div>	
</body>
</html>

<script
		src="https://code.jquery.com/jquery-3.3.1.min.js"
		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
		crossorigin="anonymous">
	</script>

<script>
	$("#btnSubmit").on("click",function(e){

		var text = $("#comment").val();

		$.ajax({
  			method: "POST",
  			url: "ajax/postcomment.php",
  			data: { text: text, post_id:<?php $_GET['id']; ?>},
			dataType: 'json'
		})
  		.done(function( res ) {
			if( res.status == 'success'){
				var li = "<li>" + text + "</li>";
				$("#listupdates").append(li);
				$("#comment").val("").focus();
				$("#listupdates li").last().slideDown();

			}
  		});

		e.preventDefault();


	});
</script>