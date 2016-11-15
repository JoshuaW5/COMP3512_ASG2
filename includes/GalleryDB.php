<?php

ini_set('error_reporting', E_ALL);

ini_set('display_errors', 'On');

include_once 'includes/AbstractDB.php';



class GalleryDB extends AbstractDB{

protected $baseSQL = "SELECT GalleryID, GalleryName, GalleryNativeName, GalleryCity, GalleryCity, GalleryCountry, Latitude, Longitude, GalleryWebSite FROM Galleries";

private $connection = null;

protected $keyFieldName = "GalleryID";



public function __construct($connection) {

    parent::__construct($connection);

}

protected function getSelect(){return $this->baseSQL;}

protected function getKeyFieldName(){return $this->keyFieldName;}

public function getGalleryName($id) {

$gallery = $this->findByID($id);

return $gallery[0]['GalleryName'];

}



}
