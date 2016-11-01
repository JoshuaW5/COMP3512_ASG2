<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On'); 

include 'includes/DataAccess.php';
include 'includes/PaintingDB.php';
include 'includes/ArtistDB.php';
include 'includes/RatingDB.php';
include 'includes/GalleryDB.php';
include 'includes/GenreDB.php';
include 'includes/PaintingGenres.php';
include 'includes/PaintingSubjectDB.php';
include 'includes/SubjectDB.php';
include 'includes/FrameDB.php';
include 'includes/GlassDB.php';
include 'includes/MattDB.php';


$dataAccess = new DataAccess();
$dataAccess->connect();

$painting = new PaintingDB($dataAccess->getPDO());
$artist = new ArtistDB($dataAccess->getPDO());
$rating = new RatingDB($dataAccess->getPDO());
$gallery = new GalleryDB($dataAccess->getPDO());
$genre = new GenreDB($dataAccess->getPDO());
$paintingGenres = new PaintingGenresDB($dataAccess->getPDO());
$paintingSubject = new PaintingSubjectDB($dataAccess->getPDO());
$subject = new SubjectDB($dataAccess->getPDO());
$frame = new FrameDB($dataAccess->getPDO());
$glass = new GlassDB($dataAccess->getPDO());
$matt = new MattDB($dataAccess->getPDO());

$id = 7; //if not linked from another page, choose artist 7

if(isset($_GET['id'])){
$id = $_GET['id']; 
}

$info = $painting->fetchPaintingInfo($id);

if (empty($info))
{
$id = 7;
$info = $painting->fetchPaintingInfo($id);
}

$artistName = $artist->getArtistName($info[0]['ArtistID']);
$ratingInfo = $rating->getByPaintingID($id);
$galleryName = $gallery->getGalleryName($painting->getGalleryID($id));

$genres = $paintingGenres->getByPaintingID($id);
$genres = $genre->getByID($genres);

$subjects = $paintingSubject->getByPaintingID($id);
$subjects = $subject->getByPaintingID($subjects);


$frames = $frame->getAllNames(); //Doesn't require an ID.

$glassTypes = $glass->getAllNames(); //Doesn't require an ID.

$mattTypes = $matt->getAllNames(); //Doesn't require an ID.


?>