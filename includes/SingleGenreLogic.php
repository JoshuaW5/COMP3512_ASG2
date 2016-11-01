<?php 
include 'includes/DataAccess.php';
include 'includes/PaintingDB.php';
include 'includes/GenreDB.php';
include 'includes/PaintingGenres.php';

$dataAccess = new DataAccess();
$dataAccess->connect();

$genres = new GenreDB($dataAccess->getPDO());
$painting = new PaintingDB($dataAccess->getPDO());
$paintingGenres = new PaintingGenresDB($dataAccess->getPDO());

$id = 1; //if not linked from another page, choose

if(isset($_GET['id'])){
$id = $_GET['id']; 
}

$genre = $genres->getById($id);

if (empty($genre))
{
$id = 1;
$genre = $genres->getById($id);
}

$paintingIds = $paintingGenres->getByGenreID($id);
$paintings = array();

foreach ($paintingIds as $info) {
array_push($paintings, $info['PaintingID']);
} 
?>
