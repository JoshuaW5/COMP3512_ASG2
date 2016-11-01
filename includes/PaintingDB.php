<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On'); 

class PaintingDB {						
private $baseSQL = "SELECT PaintingID, ArtistID, GalleryID, ImageFileName, Title, ShapeID, MuseumLink, AccessionNumber, CopyrightText, Description, Excerpt, YearOfWork, Width, Height, Medium, Cost, MSRP, GoogleLink, GoogleDescription, WikiLink FROM Paintings";
private $connect = null;

public function __construct($connection) {
$this->connect = $connection;
}
public function getAll() {
$result = DataAccess::runQuery($this->connect, $this->baseSQL, null);
return $result;
}

public function getById($id){
$sql = $this->baseSQL . " WHERE PaintingID = ?";
$result = DataAccess::runQuery($this->connect, $sql, Array($id));
return $result;
}

public function getByArtist($artistId) {
$sql = "SELECT PaintingID, Title, ImageFileName FROM Paintings WHERE ArtistID = ?";
$result = DataAccess::runQuery($this->connect, $sql, Array($artistId));
return $result;
}

public function fetchPaintingInfo($id) {
$painting = $this->getById($id);

return $painting;
}

public function getImageFileName($id){
$painting = $this->getById($id);
return $painting[0]["ImageFileName"];
}

public function getArtistName($id) {
return ArtistDB::fetchArtistName($id, $this->connect);
}

public function getGalleryID($id) {
$painting = $this->getById($id);
return $painting[0]['GalleryID'];
}


public function browsePaintings($pageNum, $filters){

$offset = ($pageNum * 20) - 20; //logic to display correct paintings on page 
$added = 0;

$sql = "SELECT PaintingID, ArtistID, Title, Description, ImageFileName, MSRP FROM Paintings";

if (array_key_exists(":artist", $filters)){
if ($added == 0) {
$sql .= " WHERE ArtistID = :artist";
 $added = 1; 
} else {
$sql .= " AND ArtistID = :artist";
}
}
if (array_key_exists(":museum", $filters)) {
if ($added == 0) {
$sql .= " WHERE GalleryID = :museum";
 $added = 1; 
} else {
$sql .= " AND GalleryID = :museum";
}
}
if (array_key_exists(":shape", $filters)) {
if ($added == 0) {
$sql .= " WHERE ShapeID = :shape";
 $added = 1; 
} else {
$sql .= " AND ShapeID = :shape";
}
} 

if (empty($filters)){
$filters = null;

}

$sql .= " ORDER BY YearOfWork LIMIT 20 OFFSET $offset";


$result = DataAccess::runQuery($this->connect, $sql, $filters);

return $result;
}

}