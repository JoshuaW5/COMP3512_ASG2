<?php

ini_set('error_reporting', E_ALL);

ini_set('display_errors', 'On');

include_once 'includes/AbstractDB.php';



class PaintingGenresDB extends AbstractDB{

protected $baseSQL = "SELECT PaintingGenreID, PaintingId, GenreID FROM PaintingGenres";

private $connection = null;

protected $keyFieldName = "PaintingGenreID";



public function __construct($connection) {

    parent::__construct($connection);

}

protected function getKeyFieldName(){return $this->keyFieldName;}

protected function getSelect(){return $this->baseSQL;}

public function getByPaintingID ($id) {

$sql = "SELECT GenreID FROM PaintingGenres WHERE PaintingID = ?";

$result = DBHelper::runQuery($this->getConnection(), $sql, Array($id));

return $result[0]['GenreID'];

}



public function getByGenreID($genreID) {

$sql = "SELECT PaintingID FROM PaintingGenres WHERE GenreID = ?";

$result = DBHelper::runQuery($this->getConnection(), $sql, Array($genreID));

return $result;

}



}
