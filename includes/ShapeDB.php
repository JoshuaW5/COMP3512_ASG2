<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On'); 


class ShapeDB {
private $baseSQL = "SELECT ShapeID, ShapeName FROM Shapes";
private $connect = null;

public function __construct($connection) {
$this->connect = $connection;
}
public function getAll() {
$result = DataAccess::runQuery($this->connect, $this->baseSQL, null);
return $result;
}

public function getById($id){
$sql = $this->baseSQL . " WHERE ShapeID = ?";

$result = DataAccess::runQuery($this->connect, $sql, Array($id));
return $result;
}

public function getAllNames() {
$sql = "SELECT ShapeName FROM Shapes";

$result = DataAccess::runQuery($this->connect, $sql, null);
return $result;

}

}