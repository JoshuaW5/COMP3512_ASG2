<?php

ini_set('error_reporting', E_ALL);

ini_set('display_errors', 'On');

include_once 'includes/AbstractDB.php';



class SubjectDB extends AbstractDB{

protected $baseSQL = "SELECT SubjectID, SubjectName FROM Subjects";

private $connection = null;

protected $keyFieldName = "SubjectID";



public function __construct($connection) {

    parent::__construct($connection);

}

protected function getSelect(){return $this->baseSQL;}

protected function getKeyFieldName(){return $this->keyFieldName;}

public function getByPaintingID ($id) {

$sql = "SELECT DISTINCT SubjectName, SubjectID FROM Subjects JOIN PaintingSubjects USING (SubjectID) WHERE PaintingID = ?";



if (count($id) > 1) {

$sql = "SELECT DISTINCT SubjectName, SubjectID FROM Subjects JOIN PaintingSubjects USING (SubjectID) WHERE PaintingID IN (";

for ($i=1; $i <= count($id); $i++) {

$sql .= " ? ";

if ($i != count($id)) { $sql .= ","; }



}

$sql .= ")";

}



$result = DBHelper::runQuery($this->getConnection(), $sql, $id);



return $result;

}





}
