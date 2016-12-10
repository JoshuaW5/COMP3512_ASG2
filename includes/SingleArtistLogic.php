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





$artistInfo = $artist->findByIDSortByFirstName($id);



if (empty($artistInfo))

{

$id = 1;

$artistInfo = $artist->findByIDSortByFirstName($id);

}



$paintings = $painting->getPaintingsByArtist($id);



?>
