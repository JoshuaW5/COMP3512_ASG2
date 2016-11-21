<?php

ini_set('error_reporting', E_ALL);

ini_set('display_errors', 'On');



include 'includes/PaintingDB.php';

include 'includes/ArtistDB.php';

include 'includes/RatingDB.php';

include 'includes/GalleryDB.php';

include 'includes/GenreDB.php';

include 'includes/PaintingGenresDB.php';

include 'includes/PaintingSubjectDB.php';

include 'includes/SubjectDB.php';

include 'includes/FrameDB.php';

include 'includes/GlassDB.php';

include 'includes/MattDB.php';

include 'includes/DataAccess.php';


$dataObj = DBHelper::setConnectionInfo();



$painting = new PaintingDB($dataObj);

$artist = new ArtistDB($dataObj);

$rating = new RatingDB($dataObj);

$gallery = new GalleryDB($dataObj);

$genre = new GenreDB($dataObj);

$paintingGenres = new PaintingGenresDB($dataObj);

$paintingSubject = new PaintingSubjectDB($dataObj);

$subject = new SubjectDB($dataObj);

$frame = new FrameDB($dataObj);

$glass = new GlassDB($dataObj);

$matt = new MattDB($dataObj);



$id = 7; //if not linked from another page, choose artist 7



if(isset($_GET['id'])){

$id = $_GET['id'];

}



$info = $painting->findByID($id);



if (empty($info))

{

$id = 7;

$info = $painting->findByID($id);

}



$artistName = $artist->getArtistName($info[0]['ArtistID']);

$ratingInfo = $rating->getByPaintingID($id);

$galleryName = $gallery->getGalleryName($painting->getGalleryID($id));



$genres = $painting->getGenresForPainting($id);



$subjects = $paintingSubject->getByPaintingID($id);

$subjects = $subject->getByPaintingID($subjects);





$frames = $frame->getCartInfo(); //Doesn't require an ID.



$glassTypes = $glass->getCartInfo(); //Doesn't require an ID.



$mattTypes = $matt->getCartInfo(); //Doesn't require an ID.

function checkCart($id) {
if (isset($_SESSION['cart'][$id])) {
return $button = '<button class="ui labeled icon orange button"  formaction="cart.php">
             <i class="checkmark icon"></i>
			 Added to Cart
           </button>';
} else {
return $button = '<button class="ui labeled icon orange submit button" formaction="includes/addToCart.php">
             <i class="add to cart icon"></i>
			 Add to Cart
           </button>';
}
}

function checkFavorites($id) {
if (isset($_SESSION['pFavorites'][$id])) {
return $button = '<button class="ui right labeled icon button" formaction="favorites.php">
             <i class="checkmark icon"></i>
			 Added to Favorites
           </button>';
} else {
return $button = '<button class="ui right labeled icon button" formaction="includes/addToFavorites.php">
             <i class="heart icon"></i>
			 Add to Favorites
           </button>';
}
}



?>
