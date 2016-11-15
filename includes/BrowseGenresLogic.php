<?php

include 'includes/GenreDB.php';

include 'includes/DataAccess.php';

include 'includes/config.php';

$dataObj = DBHelper::setConnectionInfo(Array("host"=>DBHOST, "database"=>DBNAME, "user"=>DBUSER, "pass"=>DBPASS, "charset"=>DBCHAR));

//$result = $dataObj->Query("SELECT * FROM PAINTINGS WHERE PAINTINGID = 420");
//print_r($result->fetch());

$genre = new GenreDB($dataObj);
//$genre->nonStatic();
$genres = $genre->getAll();



?>
