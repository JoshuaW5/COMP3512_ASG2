<?php

include 'includes/GalleryDB.php';

include 'includes/DataAccess.php';


$dataObj = DBHelper::setConnectionInfo();


$galleryDB = new GalleryDB($dataObj);


$galleries = $galleryDB->getAll();




?>
