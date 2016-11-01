<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On'); 


class GenreDB {
private $baseSQL = "SELECT GenreID, GenreName, EraID, Description, Link FROM Genres";
private $connect = null;

public function __construct($connection) {
$this->connect = $connection;
}
public function getAll() {
$result = DataAccess::runQuery($this->connect, $this->baseSQL, null);
return $result;
}

public function getById($id){
$sql = $this->baseSQL . " WHERE GenreID = ?";

$result = DataAccess::runQuery($this->connect, $sql, Array($id));
return $result;
}

}