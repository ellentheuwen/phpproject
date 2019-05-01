<?php
	include_once("classes/Item.class.php");

	if (isset($_POST['submit'])) {
		//$file = $_POST['file'];
		$fileDescription = $_POST['description'];
		$fileHashtags = $_POST['hashtags'];
		$fileLocation = $_POST['location'];

		$item = new Item();
		$item->setDescription($fileDescription);
		//$item->setPicture($file);
		$item->setHashtags($fileHashtags);
		$item->setLocation($fileLocation);


		// plaats om de images op te slaan
		// $target = "images/".basename($_FILES['image']['name']);

		



		
		
	}




?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Let's Talk Type - Upload</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Overpass" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet"></head>

</head>
<body>
	<div class="talktypeUpload">

		<div class="form form--upload">
			<form action="" method="post" enctype="multipart/form-data">
			<h2 class="form__title">Let's Talk Type —— Upload </h2>

                <?php if(isset($error)): ?>
				<div class="form__error">
					<p>
						💩 <?php echo $error; ?>
					</p>
				</div>
								<?php endif; ?>
								
				<div class="form__field">
						<input type="file" name="file" id="file" style="display:none;"/>
						<label for="img" style= "text-align:center; color: #E7A06E;">Click me to choose a post</label>				
				</div>		
				
				<div class="form__field">
					<input type="text" id="description" name="description" placeholder="Add an description to your image" class="inputField">
				</div>

				<div class="form__field">
					<input type="text" id="hashtags" name="hashtags" placeholder="Some hashtags maybe?" class="inputField">
				</div>

				<div class="form__field">
					<input type="text" id="location" name="location" placeholder="Where is this picture taken?" class="inputField">
				</div>

				<div class="form__field">
					<input type="submit" value="Upload!" class="btn btn--primary" name="submit">	
				</div>

                <p id="gotAccount">Back to the <a href="index.php">homepage</a></p>


			</form>
		</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</body>
</html>