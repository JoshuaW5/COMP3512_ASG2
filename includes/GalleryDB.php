<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On'); 


class GalleryDB {
private $baseSQL = "SELECT GalleryID, GalleryName, GalleryNativeName, GalleryCity, GalleryCity, GalleryCountry, Latitude, Longitude, GalleryWebSite FROM Galleries";
private $connect = null;

public function __construct($connection) {
$this->connect = $connection;
}
public function getAll() {
$result = DataAccess::runQuery($this->connect, $this->baseSQL, null);
return $result;
}

public function getByGalleryId($id){
$sql = "SELECT GalleryName FROM Galleries WHERE GalleryID = ?";
$result = DataAccess::runQuery($this->connect, $sql, Array($id));
return $result;
}

public function getGalleryName($id) {
$gallery = $this->getByGalleryId($id);
return $gallery[0]['GalleryName'];
}

}