<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On'); 


class FrameDB {
private $baseSQL = "SELECT FrameID, Title, Price, Color, Style FROM TypesFrames";
private $connect = null;

public function __construct($connection) {
$this->connect = $connection;
}
public function getAll() {
$result = DataAccess::runQuery($this->connect, $this->baseSQL, null);
return $result;
}

public function getById($id){
$sql = $this->baseSQL . " WHERE FrameID = ?";

$result = DataAccess::runQuery($this->connect, $sql, Array($id));
return $result;
}

public function getAllNames() {
$sql = "SELECT Title FROM TypesFrames";

$result = DataAccess::runQuery($this->connect, $sql, null);
return $result;

}

}