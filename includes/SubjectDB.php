<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On'); 


class SubjectDB {
private $baseSQL = "SELECT SubjectID, SubjectName FROM Subjects";
private $connect = null;

public function __construct($connection) {
$this->connect = $connection;
}
public function getAll() {
$result = DataAccess::runQuery($this->connect, $this->baseSQL, null);
return $result;
}

public function getById($id){
$sql = $this->baseSQL . " WHERE SubjectID = ?";
$result = DataAccess::runQuery($this->connect, $sql, Array($id));
return $result;
}

public function getByPaintingID ($id) {
$sql = "SELECT SubjectName FROM Subjects WHERE SubjectID = ?";

if (count($id) > 1) {
$sql = "SELECT SubjectName FROM Subjects WHERE SubjectID IN (";
for ($i=1; $i <= count($id); $i++) {
$sql .= " ? ";
if ($i != count($id)) { $sql .= ","; }

}
$sql .= ")";
}

$result = DataAccess::runQuery($this->connect, $sql, $id);

return $result;
}


}