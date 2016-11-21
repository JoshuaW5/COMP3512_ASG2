<?php

ini_set('error_reporting', E_ALL);

ini_set('display_errors', 'On');

include_once 'includes/AbstractDB.php';



class FrameDB extends AbstractDB{

protected $baseSQL = "SELECT FrameID, Title, Price, Color, Style FROM TypesFrames";

private $connection = null;

protected $keyFieldName = "FrameID";


public function __construct($connection) {

    parent::__construct($connection);

}

protected function getSelect(){return $this->baseSQL;}

protected function getKeyFieldName(){return $this->keyFieldName;}

public function getCartInfo() {

    $sql = "SELECT Title, Price FROM TypesFrames ORDER BY Title";

    $result = DBHelper::runQuery($this->getConnection(), $sql, null);
    return $result;

}



}
