<?php


include 'includes/GalleryDB.php';

include 'includes/DataAccess.php';


$dataObj = DBHelper::setConnectionInfo();


$galleries = new GalleryDB($dataObj);

if(isset($_GET['id'])){

$id = $_GET['id'];

}


$gallery = $galleries->findByID($id);


if (empty($gallery))

{

$id = 1;

$gallery = $galleries->findByID($id);

}

//$galleries = $galleryDB->findByID()


?>
