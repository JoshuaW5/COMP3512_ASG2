<?php

ini_set('error_reporting', E_ALL);

ini_set('display_errors', 'On');



include 'includes/DataAccess.php';

include 'includes/PaintingDB.php';

include 'includes/ArtistDB.php';

include 'includes/GalleryDB.php';

include 'includes/ShapeDB.php';



$dataObj = DBHelper::setConnectionInfo();



$painting = new PaintingDB($dataObj);

$artist = new ArtistDB($dataObj);

$gallery = new GalleryDB($dataObj);

$shape = new ShapeDB($dataObj);



$artists = $artist->getAllArtistNameSorted();

$galleryName = $gallery->getAllMuseumSorted();

$shapes = $shape->getAllShapesSorted();





$pageNum = 1;

$filters = array();



// if (isset($_GET['artist']) && $_GET['artist'] != '') { $filters[':artist'] = $_GET['artist'];}
//
// if (isset($_GET['museum']) && $_GET['museum'] != '') { $filters[':museum'] = $_GET['museum'];}
//
// if (isset($_GET['shape']) && $_GET['shape'] != '') { $filters[':shape'] = $_GET['shape'];}
//
// if (isset($_GET['pg'])) { $pageNum = $_GET['pg'];}
//
//
// if (isset($_GET['search'])) {
// $info = $painting->searchPaintings($_GET['search']);
// } else {
// $info = $painting->browsePaintings($pageNum, $filters, 20);//fix for accurate page nums
// }

function checkCart($id) {
if (isset($_SESSION['cart'][$id])) {
return $button = '<button class="ui icon orange button" formaction="cart.php">
             <i class="checkmark icon"></i>
           </button>';
} else {
return $button = '<button class="ui icon orange submit button" formaction="includes/addToCart.php">
             <i class="add to cart icon"></i>
           </button>';
}
}

function checkFavorites($id) {
if (isset($_SESSION['pFavorites'][$id])) {
return $button = '<button class="ui icon orange button" formaction="favorites.php">
             <i class="checkmark icon"></i>
           </button>';
} else {
return $button = '<button class="ui icon orange submit button" formaction="includes/addToFavorites.php">
             <i class="heart icon"></i>
           </button>';
}
}





?>
