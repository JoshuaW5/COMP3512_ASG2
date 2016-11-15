<?php

ini_set('error_reporting', E_ALL);

ini_set('display_errors', 'On');

include_once 'includes/AbstractDB.php';



class RatingDB  extends AbstractDB{

protected $baseSQL = "SELECT RatingID, PaintingID, ReviewDate, Rating, Comment FROM Reviews";

private $connection = null;

protected $keyFieldName = "RatingID";


public function __construct($connection) {

    parent::__construct($connection);

}

protected function getSelect(){return $this->baseSQL;}

protected function getKeyFieldName(){return $this->keyFieldName;}

public function getbyPaintingId($id){

    $sql = $this->baseSQL .  " WHERE PaintingID = ?";

    $statement = DBHelper::runQuery($this->getConnection(), $sql, $id);

    return $statement;
}



}
