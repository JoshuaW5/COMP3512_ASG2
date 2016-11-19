<?php

include 'includes/ArtistDB.php';

include 'includes/DataAccess.php';


$dataObj = DBHelper::setConnectionInfo();


$artistDB = new ArtistDB($dataObj);


$artists = $artistDB->getAll();


function checkImageFile($artistID){

    $imgFile = 'images/art/artists/square-medium/' . $artistID . '.jpg';

    if (file_exists($imgFile)){

        return $imgFile;

    }else{

        return 'images/art/artists/square-medium/141.jpg';

    }

}

?>
