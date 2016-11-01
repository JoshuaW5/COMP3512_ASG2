<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On'); 


class RatingDB {
private $baseSQL = "SELECT RatingID, PaintingID, ReviewDate, Rating, Comment FROM Reviews";
private $connect = null;

public function __construct($connection) {
$this->connect = $connection;
}
public function getAll() {
$result = DataAccess::runQuery($this->connect, $this->baseSQL, null);
return $result;
}

public function getByPaintingId($id){
$sql = $this->baseSQL . " WHERE PaintingID = ?";
$result = DataAccess::runQuery($this->connect, $sql, Array($id));
return $result;
}

}