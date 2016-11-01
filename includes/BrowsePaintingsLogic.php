<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On'); 

include 'includes/DataAccess.php';
include 'includes/PaintingDB.php';
include 'includes/ArtistDB.php';
include 'includes/GalleryDB.php';
include 'includes/ShapeDB.php';

$dataAccess = new DataAccess();
$dataAccess->connect();

$painting = new PaintingDB($dataAccess->getPDO());
$artist = new ArtistDB($dataAccess->getPDO());
$gallery = new GalleryDB($dataAccess->getPDO());
$shape = new ShapeDB($dataAccess->getPDO());

$artists = $artist->getAll();
$galleryName = $gallery->getAll();
$shapes = $shape->getAll();


$pageNum = 1;
$filters = array();

if (isset($_GET['artist']) && $_GET['artist'] != '') { $filters[':artist'] = $_GET['artist'];}
if (isset($_GET['museum']) && $_GET['museum'] != '') { $filters[':museum'] = $_GET['museum'];}
if (isset($_GET['shape']) && $_GET['shape'] != '') { $filters[':shape'] = $_GET['shape'];}
if (isset($_GET['pg'])) { $pageNum = $_GET['pg'];}

$info = $painting->browsePaintings($pageNum, $filters);//fix for accurate ppage nums


?>

