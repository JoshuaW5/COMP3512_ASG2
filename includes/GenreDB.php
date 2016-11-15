<?php

ini_set('error_reporting', E_ALL);

ini_set('display_errors', 'On');


include_once 'includes/AbstractDB.php';


class GenreDB extends AbstractDB{

protected $baseSQL = "SELECT GenreID, GenreName, EraID, Description, Link FROM Genres";

private $connection = null;

protected $keyFieldName = "GenreID";



public function __construct(PDO $connect) {

    parent::__construct($connect);

}

protected function getSelect(){return $this->baseSQL;}

protected function getKeyFieldName(){return $this->keyFieldName;}

}
