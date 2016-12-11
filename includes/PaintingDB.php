<?php

ini_set('error_reporting', E_ALL);

ini_set('display_errors', 'On');

include_once 'includes/AbstractDB.php';



class PaintingDB extends AbstractDB{

protected $baseSQL = "SELECT Paintings.PaintingID, Paintings.ArtistID, Paintings.GalleryID, Paintings.ImageFileName, Paintings.Title, Paintings.ShapeID, Paintings.MuseumLink, Paintings.AccessionNumber, Paintings.CopyrightText, Paintings.Description, Paintings.Excerpt, Paintings.YearOfWork, Paintings.Width, Paintings.Height, Paintings.Medium, Paintings.Cost, Paintings.MSRP, Paintings.GoogleLink, Paintings.GoogleDescription, Paintings.WikiLink FROM Paintings";

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



$sql = "SELECT PaintingID, ArtistID, LastName, Title, Description, ImageFileName, MSRP FROM Paintings JOIN Artists USING (ArtistID)";



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

if (array_key_exists(":name", $filters)) {

if ($added == 0) {

$sql .= " WHERE Title LIKE :name";

 $added = 1;

} else {

$sql .= " AND Title LIKE :name";

}

}

if (array_key_exists(":search", $filters)) {


if ($added == 0) {

$sql .= " WHERE Title LIKE :search";

 $added = 1;

} else {

$sql .= " AND Title LIKE :search";

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
public function getPaintingsByGallery($id){

    $sql = $this->getSelect() . " JOIN Galleries USING (GalleryID) WHERE GalleryID = ? ";
    $result = DBHelper::runQuery($this->getConnection(), $sql, Array($id));
    return $result;

}

public function getPaintingsByGenre($id){
    $sql = $this->getSelect() . " JOIN PaintingGenres USING (PaintingID) JOIN Genres USING(GenreID) WHERE GenreID = ? ORDER BY YearOfWork";
    $result = DBHelper::runQuery($this->getConnection(), $sql, Array($id));
    return $result;
}

public function getPaintingsByArtist($id){
    $sql = $this->getSelect() . " JOIN Artists USING (ArtistID) WHERE ArtistID = ? ORDER BY YearOfWork";
    $result = DBHelper::runQuery($this->getConnection(), $sql, Array($id));
    return $result;
}

public function getGenresForPainting($id){

    $sql = "SELECT GenreName, Genres.GenreID FROM Paintings JOIN PaintingGenres USING (PaintingID) JOIN Genres USING (GenreID) WHERE " . $this->getKeyFieldName() . " = ?";
    $result = DBHelper::runQuery($this->getConnection(), $sql, Array($id));
    return $result;

}

public function getPaintingAverageRating($id){

    $sql = "SELECT AVG(Rating) FROM Paintings JOIN Reviews USING (PaintingID) WHERE " . $this->getKeyFieldName() . " = ?";
    $result = DBHelper::runQuery($this->getConnection(), $sql, Array($id));
    return $result;

}

public function getGalleryLinkByPaintingID($id){

    $sql = "SELECT GalleryWebSite FROM GalleryWebSite JOIN Paintings USING (GalleryID) WHERE Paintings.PaintingID = ?";
    $result = DBHelper::runQuery($this->getConnection(), $sql, Array($id));
    return $result;

}






}
