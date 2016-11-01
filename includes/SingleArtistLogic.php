<?php 
include 'includes/DataAccess.php';
include 'includes/PaintingDB.php';
include 'includes/ArtistDB.php';

$dataAccess = new DataAccess();
$dataAccess->connect();

$artist = new ArtistDB($dataAccess->getPDO());
$painting = new PaintingDB($dataAccess->getPDO());

$id = 1; //if not linked from another page, choose

if(isset($_GET['id'])){
$id = $_GET['id']; 
}


$artistInfo = $artist->getById($id);

if (empty($artistInfo))
{
$id = 1;
$artistInfo = $artist->getById($id);
}

$paintings = $painting->getByArtist($id);

?>