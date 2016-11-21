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

public function getAllMuseumSorted() {

$sql = "SELECT GalleryID, GalleryName FROM Galleries ORDER BY GalleryName";

$result = DBHelper::runQuery($this->getConnection(), $sql, null);

return $result;


}

public function getAllSortByGalleryName(){

    $sql = $this->getSelect() . ' ORDER BY GalleryName ASC';

    $result = DBHelper::runQuery($this->getConnection(), $sql, null);

    return $result;
}

public function getGalleryHavingPainting($id){
    
    $sql = $this->getSelect() . " JOIN Paintings USING (GalleryID) WHERE Paintings.PaintingID = ?";
    $result = DBHelper::runQuery($this->getConnection(), $sql, Array($id));
    return $result;
}

}
