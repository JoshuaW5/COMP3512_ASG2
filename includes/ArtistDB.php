<?php

ini_set('error_reporting', E_ALL);

ini_set('display_errors', 'On');

include_once 'includes/AbstractDB.php';

class ArtistDB extends AbstractDB{

protected $baseSQL = "SELECT ArtistID, FirstName, LastName, Nationality, Gender, YearOfBirth, YearOfDeath, Details, ArtistLink FROM Artists";

private $connection;

protected $keyFieldName = "ArtistID";



public function __construct($connection){

    parent::__construct($connection);

}

protected function getSelect(){return $this->baseSQL;}

protected function getKeyFieldName(){return $this->keyFieldName;}

public function getArtistName($id) {

$sql = "SELECT FirstName, LastName FROM Artists WHERE " . $this->getKeyFieldName() . " = ?";

$result = DBHelper::runQuery($this->getConnection(), $sql, Array($id));

return $result[0]['FirstName'] . " " . $result[0]['LastName'];

}

public function getAllArtistNameSorted() {

$sql = "SELECT ArtistID, FirstName, LastName FROM Artists ORDER BY LastName";

$result = DBHelper::runQuery($this->getConnection(), $sql, null);

return $result;


}

public function findByIDSortByFirstName($id){

    $sql = "SELECT " . $baseSQL . " WHERE " . $this->getKeyFieldName() . " = ? ORDER BY FirstName";

    $result = DBHelper::runQuery($this->getConnection(), $sql, Array($id));

    return $result[0]['FirstName'] . " " . $result[0]['LastName'];

}





}
