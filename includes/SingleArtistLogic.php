<?php

include 'includes/PaintingDB.php';

include 'includes/ArtistDB.php';

include 'includes/DataAccess.php';


$dataObj = DBHelper::setConnectionInfo();

$artist = new ArtistDB($dataObj);

$painting = new PaintingDB($dataObj);



$id = 1; //if not linked from another page, choose



if(isset($_GET['id'])){

$id = $_GET['id'];

}





$artistInfo = $artist->findByID($id);



if (empty($artistInfo))

{

$id = 1;

$artistInfo = $artist->findByID($id);

}



$paintings = $painting->getByArtist($id);



?>
