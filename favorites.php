<?php

session_start();
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
	<div class="ui segment stackable grid container">

  <div class="eleven wide column">
   <h1>Favorites</h1>
	<p>All Favorites [Showing 20]</p>

<?php
$favorites->displayFavorites();
	?>
	<?php

?>
	</div>
	</div>'

  </div>
  </div>

</main>



<?php include 'includes/footer.php';?>
</body>
</html>
