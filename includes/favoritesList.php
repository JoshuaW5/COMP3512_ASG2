<?php
session_start();

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');

class FavoritesList {

function displayFavorites() {
$dataAccess = DBHelper::setConnectionInfo();

if (isset($_GET['remove'])) {
unset($_SESSION['favorites'][$_GET['remove']]);
}

if (isset($_SESSION['favorites'])) {


$painting = new PaintingDB($dataAccess);

$artist = new ArtistDB($dataAccess);

foreach ($_SESSION['favorites'] as $item) {

if (isset ($item['id'])) {

$info = $painting->findById($item['id']); //Info about painting

$title = $info[0]["Title"];

$description = $info[0]['Description'];

$artistName = $artist->getArtistName($info[0]['ArtistID']);

	echo '<form class="ui form">
	<div class="ui two column stackable grid container">
	<div class="four wide column"><a href="single-painting.php?id=' . $item['id'] . '">
	<img src="images/art/works/square-medium/';
	echo $item['image'];
	echo '.jpg" alt="..." class="image" ></a>
	</div>
	<div class="twelve wide column">
	<h3 class="ui header">
	<div class="content">';
	echo $info[0]['Title'];
	echo '<div class="sub header">';

	echo $artistName;
	echo '</div>
	</div>
	</h3>

	<p>';
	echo $description;

	echo "</p>
	<p>";
	echo '</p>
	<input type="hidden" name="ID" value="' . $item['id'] . '">
							<input type="hidden" name="image" value="' . $item['image'] . '">
                    <button class="ui icon orange submit button" formaction="includes/addToCart.php">
                      <i class="add to cart icon"></i>
                    </button>
					 <input type="hidden" name="remove" value="' . $item["id"] . '" /> 
					<button type="submit" class="ui icon orange submit button formaction="favorites.php">
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