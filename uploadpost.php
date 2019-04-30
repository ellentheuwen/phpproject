------ hier komt uw php nog. die is basically hetzelfde als bij het registeren enzo, maar dan met andere termen. (zie databank)
+ invoerveld voor een bestand te kiezen moet ook nog komen. good luck! 
--- een class voor items is er wel al deels :) 

<!DOCTYPE html>
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
			<form action="" method="post">
			<h2 class="form__title">Let's Talk Type —— Upload </h2>

                <?php if(isset($error)): ?>
				<div class="form__error">
					<p>
						💩 <?php echo $error; ?>
					</p>
				</div>
                <?php endif; ?>

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
					<input type="submit" value="Upload!" class="btn btn--primary">	
				</div>

                <p id="gotAccount">Back to the <a href="index.php">homepage</a></p>


			</form>
		</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</body>
</html>