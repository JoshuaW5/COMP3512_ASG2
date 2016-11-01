<?php
include 'includes/GenreDB.php';
include 'includes/DataAccess.php';

$dataAccess = new DataAccess();
$dataAccess->connect();

$genre = new GenreDB($dataAccess->getPDO());

$genres = $genre->getAll();

?>