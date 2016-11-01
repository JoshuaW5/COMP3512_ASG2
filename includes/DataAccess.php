<?php 

class DataAccess {

private $pdo;

public function connect() {
try{
$host='localhost';
$db = '3512asg1';
$user = 'jwoja063';
$pass = 'mkye9y2ka';
$charset = 'utf8';

$conString = "mysql:host=$host;dbname=$db;charset=$charset";
$pdo = new PDO($conString, $user, $pass);

$this->pdo = $pdo;
}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
}

static function runQuery($pdo, $sql, $parameters=Array()) {

if (!is_array($parameters)) {
	$parameters = Array($parameters); 
}
try {
	$statement=null;
	if(count($parameters)>0) {
	$statement = $pdo->prepare($sql);
	$statement->execute($parameters);
	}
	$statement = $statement->fetchAll();
	//echo print_r($statement);
	return $statement;
	}
catch(PDOException $e)
	{
	echo "Connection failed: " . $e->getMessage();
	}
}

public function getPDO()
{
return $this->pdo;
}

}
?>