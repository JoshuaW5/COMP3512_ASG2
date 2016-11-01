<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On'); 


class ArtistDB {
private $baseSQL = "SELECT ArtistID, FirstName, LastName, Nationality, Gender, YearOfBirth, YearOfDeath, Details, ArtistLink FROM Artists";
private $connect = null;

public function __construct($connection) {
$this->connect = $connection;
}
public function getAll() {
$result = DataAccess::runQuery($this->connect, $this->baseSQL, null);
return $result;
}

public function getById($id){
$sql = $this->baseSQL . " WHERE ArtistID = ?";
$result = DataAccess::runQuery($this->connect, $sql, Array($id));
return $result;
}

public function fetchArtistInfo($id) {
$painting = $this->getById($id);
return $artist;
}

public function getArtistName($id) {
$sql = "SELECT FirstName, LastName FROM Artists WHERE ArtistID = ?";
$result = DataAccess::runQuery($this->connect, $sql, Array($id));
return $result[0]['FirstName'] . " " . $result[0]['LastName'];
}



}