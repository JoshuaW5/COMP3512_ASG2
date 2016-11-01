<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On'); 


class GlassDB {
private $baseSQL = "SELECT GlassID, Title, Description, Price FROM TypesGlass";
private $connect = null;

public function __construct($connection) {
$this->connect = $connection;
}
public function getAll() {
$result = DataAccess::runQuery($this->connect, $this->baseSQL, null);
return $result;
}

public function getById($id){
$sql = $this->baseSQL . " WHERE GlassID = ?";

$result = DataAccess::runQuery($this->connect, $sql, Array($id));
return $result;
}

public function getAllNames() {
$sql = "SELECT Title FROM TypesGlass";

$result = DataAccess::runQuery($this->connect, $sql, null);
return $result;

}

}