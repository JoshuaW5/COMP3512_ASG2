<?php

include 'includes/GenreDB.php';

include 'includes/DataAccess.php';


$dataObj = DBHelper::setConnectionInfo();

//$result = $dataObj->Query("SELECT * FROM PAINTINGS WHERE PAINTINGID = 420");
//print_r($result->fetch());

$genre = new GenreDB($dataObj);
//$genre->nonStatic();
$genres = $genre->getAll();



?>
