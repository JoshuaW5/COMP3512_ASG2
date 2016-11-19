<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On'); 


class PaintingGenresDB {
private $baseSQL = "SELECT PaintingGenreID, PaintingId, GenreID FROM PaintingGenres";
private $connect = null;

public function __construct($connection) {
$this->connect = $connection;
}
public function getAll() {
$result = DataAccess::runQuery($this->connect, $this->baseSQL, null);
return $result;
}

public function getById($id){
$sql = $this->baseSQL . " WHERE PaintingGenreID = ?";
$result = DataAccess::runQuery($this->connect, $sql, Array($id));
return $result;
}

public function getByPaintingID ($id) {
$sql = "SELECT GenreID FROM PaintingGenres WHERE PaintingID = ?";
$result = DataAccess::runQuery($this->connect, $sql, Array($id)); 
return $result[0]['GenreID'];
}

public function getByGenreID($genreID) {
$sql = "SELECT PaintingID FROM PaintingGenres WHERE GenreID = ?";
$result = DataAccess::runQuery($this->connect, $sql, Array($genreID)); 
return $result;
}

}