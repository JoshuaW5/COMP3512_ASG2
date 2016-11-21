<?php

ini_set('error_reporting', E_ALL);

ini_set('display_errors', 'On');

include_once 'includes/AbstractDB.php';



class MattDB extends AbstractDB{

protected $baseSQL = "SELECT MattID, Title, ColorCode FROM TypesMatt";

private $connection = null;

protected $keyFieldName = "MattID";



public function __construct($connection) {

    parent::__construct($connection);

}

protected function getSelect(){return $this->baseSQL;}

protected function getKeyFieldName(){return $this->keyFieldName;}

public function getCartInfo() {

$sql = "SELECT Title FROM TypesMatt ORDER BY Title";

$result = DBHelper::runQuery($this->getConnection(), $sql, null);

return $result;

}



}
