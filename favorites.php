<?php
session_start();
?>
<?php

//require 'includes/BrowsePaintingsLogic.php';
require 'includes/favoritesList.php';
require 'includes/singlePaintingLogic.php';

$favorites = new FavoritesList();

?>

<!DOCTYPE html>
<html lang=en>
<head>
<meta charset=utf-8>
    <link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="css/semantic.js"></script>
	<script src="js/misc.js"></script>

    <link href="css/semantic.css" rel="stylesheet" >
    <link href="css/icon.css" rel="stylesheet" >
    <link href="css/styles.css" rel="stylesheet">
</head>
<body >

    <header>
        <?php include 'includes/header.php';?>
    </header>

<main>
	
        <div class="banner1">

            <h1 class="ui huge header banner-header">Favorites</h1>

        </div>

		<div class="ui centered huge header">Paintings
				<form class="ui form">
		<input type="hidden" name="removeallp" value="1" />
		<button class="ui orange submit button" formaction="favorites.php">
		<h4>Clear All</h4>
		</button>
		</form>
		</div> 

		
	<div class="ui cards centered doubling stackable grid container">
	
	<?php 
		$favorites->favoritePaintings(); 
	?>

	
	

	</div>
	
			<div class="ui centered huge header">Artists
							<form class="ui form">
		<input type="hidden" name="removealla" value="1" />
		<button class="ui orange submit button" formaction="favorites.php">
		<h4>Clear All</h4>
		</button>
		</form>
		</div>

	<div class="ui cards centered doubling stackable grid container">
	
	<?php 
		$favorites->favoriteArtists(); 
	?>

	
	

	</div>



</main>



<?php include 'includes/footer.php';?>
</body>
</html>
