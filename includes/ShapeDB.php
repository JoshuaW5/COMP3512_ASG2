<?php

ini_set('error_reporting', E_ALL);

ini_set('display_errors', 'On');

include_once 'includes/AbstractDB.php';



class ShapeDB extends AbstractDB{

protected $baseSQL = "SELECT ShapeID, ShapeName FROM Shapes";

private $connection = null;

protected $keyFieldName = "ShapeID";



public function __construct($connection) {

    parent::__construct($connection);

}

protected function getSelect(){return $this->baseSQL;}

protected function getKeyFieldName(){return $this->keyFieldName;}

public function getAllNames() {

$sql = "SELECT ShapeName FROM Shapes";

$result = DBHelper::runQuery($this->getConnection(), $sql, null);

return $result;



}

public function getAllShapesSorted() {

$sql = "SELECT ShapeID, ShapeName FROM Shapes ORDER BY ShapeName";

$result = DBHelper::runQuery($this->getConnection(), $sql, null);

return $result;


}



}
