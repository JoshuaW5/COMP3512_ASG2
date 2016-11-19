<?php

ini_set('error_reporting', E_ALL);

ini_set('display_errors', 'On');

include_once 'includes/AbstractDB.php';



class GlassDB extends AbstractDB{

protected $baseSQL = "SELECT GlassID, Title, Description, Price FROM TypesGlass";

private $connection = null;

protected $keyFieldName = "GlassID";




public function __construct($connection) {

    parent::__construct($connection);

}

protected function getSelect(){return $this->baseSQL;}

protected function getKeyFieldName(){return $this->keyFieldName;}

public function getCartInfo() {

$sql = "SELECT Title, Price FROM TypesGlass";

$result = DBHelper::runQuery($this->getConnection(), $sql, null);

return $result;

}



}
