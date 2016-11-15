<?php

ini_set('error_reporting', E_ALL);

ini_set('display_errors', 'On');



include 'includes/DataAccess.php';

include 'includes/PaintingDB.php';

include 'includes/ArtistDB.php';

include 'includes/GalleryDB.php';

include 'includes/ShapeDB.php';

include 'includes/config.php';


$dataObj = DBHelper::setConnectionInfo(Array("host"=>DBHOST, "database"=>DBNAME, "user"=>DBUSER, "pass"=>DBPASS, "charset"=>DBCHAR));



$painting = new PaintingDB($dataObj);

$artist = new ArtistDB($dataObj);

$gallery = new GalleryDB($dataObj);

$shape = new ShapeDB($dataObj);



$artists = $artist->getAll();

$galleryName = $gallery->getAll();

$shapes = $shape->getAll();





$pageNum = 1;

$filters = array();



if (isset($_GET['artist']) && $_GET['artist'] != '') { $filters[':artist'] = $_GET['artist'];}

if (isset($_GET['museum']) && $_GET['museum'] != '') { $filters[':museum'] = $_GET['museum'];}

if (isset($_GET['shape']) && $_GET['shape'] != '') { $filters[':shape'] = $_GET['shape'];}

if (isset($_GET['pg'])) { $pageNum = $_GET['pg'];}



$info = $painting->browsePaintings($pageNum, $filters);//fix for accurate page nums





?>
