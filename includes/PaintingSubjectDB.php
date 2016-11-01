<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On'); 


class PaintingSubjectDB {
private $baseSQL = "SELECT PaintingSubjectID, PaintingID, SubjectID FROM PaintingSubjects";
private $connect = null;

public function __construct($connection) {
$this->connect = $connection;
}
public function getAll() {
$result = DataAccess::runQuery($this->connect, $this->baseSQL, null);
return $result;
}

public function getById($id){
$sql = $this->baseSQL . " WHERE PaintingSubjectID = ?";
$result = DataAccess::runQuery($this->connect, $sql, Array($id));
return $result;
}

public function getByPaintingID ($id) {
$sql = "SELECT SubjectID FROM PaintingSubjects WHERE PaintingID = ?";
$result = DataAccess::runQuery($this->connect, $sql, Array($id));

$subjectids = array();

foreach ($result as $subject) {
array_push($subjectids, $subject['SubjectID']);
}

return $subjectids;
}


}
