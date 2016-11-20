<?php
session_start();

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');

class FavoritesList {

function favoritePaintings() {
$dataAccess = DBHelper::setConnectionInfo();

if (isset($_GET['removep'])) {
unset($_SESSION['pFavorites'][$_GET['remove']]);
} else if (isset($_GET['removeallp'])) {
unset($_SESSION['pFavorites']);
}

if (isset($_SESSION['pFavorites'])) {

$painting = new PaintingDB($dataAccess);

$artist = new ArtistDB($dataAccess);

foreach ($_SESSION['pFavorites'] as $item) {

if (isset ($item['id'])) {


$info = $painting->findById($item['id']); //Info about painting

$title = $info[0]["Title"];

$description = $info[0]['Description'];

$artistName = $artist->getArtistName($info[0]['ArtistID']);

echo '<div class="ui card">
<div class="content">	
		<h3>' . $info[0]['Title'] . '</h3>
			<div class="description">
			<a href="single-painting.php?id=' . $item['id'] . '">
			<img src="images/art/works/square-small/' . $item['image'] . '.jpg" alt="..." class="image" ></a>
		    </div>
	 </div>
	   <div class="extra content">
	   <form class="ui form">
	   	 <input type="hidden" name="ID" value="' . $item['id'] . '">
	 <input type="hidden" name="image" value="' . $item['image'] . '">
	 <input type="hidden" name="removep" value="' . $item["id"] . '" />
  	<button type="submit" class="ui icon orange submit button" formaction="favorites.php">
      <i class="remove icon"></i>
	</button>
     <button class="ui icon orange submit button " formaction="includes/addToCart.php">
     <i class="add to cart icon"></i>
	</button>
	</form>
  </div>
</div>';

	}
	}
	}
	}
	
function favoriteArtists() {
$dataAccess = DBHelper::setConnectionInfo();

if (isset($_GET['removea'])) {
unset($_SESSION['aFavorites'][$_GET['removea']]);
} else if (isset($_GET['removealla'])) {
unset($_SESSION['aFavorites']);
}

if (isset($_SESSION['aFavorites'])) {
$painting = new PaintingDB($dataAccess);

$artist = new ArtistDB($dataAccess);

foreach ($_SESSION['aFavorites'] as $item) {

if (isset ($item['id'])) {

$artistName = $artist->getArtistName($item['id']);

echo '<div class="ui card">
<div class="content">	
		<h3>' . $artistName . '</h3>
			<div class="description">
			<a href="single-artist.php?id=' . $item['id'] . '">
			<img src="images/art/artists/square-thumb/' . $item['id'] . '.jpg" alt="..." class="image" ></a>
		    </div>
	 </div>
	   <div class="extra content">
	   <form class="ui form">
	   	 <input type="hidden" name="ID" value="' . $item['id'] . '">
	 <input type="hidden" name="image" value="' . $item['id'] . '">
	 <input type="hidden" name="removea" value="' . $item["id"] . '" />
  	<button type="submit" class="ui icon orange submit button" formaction="favorites.php">
      <i class="remove icon"></i>
	</button>
	</form>
  </div>
</div>';

	}
	}
	}
	}
	
	}
	?>