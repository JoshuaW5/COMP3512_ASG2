<?php

include 'includes/PaintingDB.php';

include 'includes/GenreDB.php';

include 'includes/PaintingGenresDB.php';

include 'includes/DataAccess.php';


$dataObj = DBHelper::setConnectionInfo();

$genres = new GenreDB($dataObj);

$painting = new PaintingDB($dataObj);

$paintingGenres = new PaintingGenresDB($dataObj);



$id = 1; //if not linked from another page, choose



if(isset($_GET['id'])){

$id = $_GET['id'];

}


$genre = $genres->findByID($id);


if (empty($genre))

{

$id = 1;

$genre = $genres->findByID($id);

}


$paintings = $painting->getPaintingsByGenre($id);
?>
