<?php

ini_set('error_reporting', E_ALL);

ini_set('display_errors', 'On');

include_once 'includes/AbstractDB.php';



class PaintingDB extends AbstractDB{

protected $baseSQL = "SELECT PaintingID, ArtistID, GalleryID, ImageFileName, Title, ShapeID, MuseumLink, AccessionNumber, CopyrightText, Description, Excerpt, YearOfWork, Width, Height, Medium, Cost, MSRP, GoogleLink, GoogleDescription, WikiLink FROM Paintings";

private $connection = null;

protected $keyFieldName = "PaintingID";



public function __construct($connection) {

 parent::__construct($connection);

}

protected function getSelect(){return $this->baseSQL;}

protected function getKeyFieldName(){return $this->keyFieldName;}

public function getByArtist($artistId) {

$sql = "SELECT PaintingID, Title, ImageFileName FROM Paintings WHERE ArtistID = ?";

$result = DBHelper::runQuery($this->getConnection(), $sql, Array($artistId));

return $result;

}



public function getImageFileName($id){

$painting = $this->getById($id);

return $painting[0]["ImageFileName"];

}



public function getGalleryID($id) {

$painting = $this->findByID($id);

return $painting[0]['GalleryID'];

}

public function searchPaintings($search) {
	$sql = "SELECT PaintingID, ArtistID, Title, Description, ImageFileName, MSRP FROM Paintings WHERE Title LIKE ? OR Description LIKE ?";

	$search = array("%$search%", "%$search%");

	$result = DBHelper::runQuery($this->getConnection(), $sql, $search);

	return $result;
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





$result = DBHelper::runQuery($this->getConnection(), $sql, $filters);



return $result;

}

public function getPaintingBySubject($id){
    $sql = $this->getSelect() . " JOIN PaintingSubjects USING (PaintingID) JOIN Subjects USING(SubjectID) WHERE SubjectID = ? LIMIT 1";
    $result = DBHelper::runQuery($this->getConnection(), $sql, Array($id));
    return $result;
}

public function getPaintingsBySubject($id){
    $sql = $this->getSelect() . " JOIN PaintingSubjects USING (PaintingID) JOIN Subjects USING(SubjectID) WHERE SubjectID = ?";
    $result = DBHelper::runQuery($this->getConnection(), $sql, Array($id));
    return $result;
}




}
