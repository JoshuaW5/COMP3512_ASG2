<?php

ini_set('error_reporting', E_ALL);

ini_set('display_errors', 'On');



include 'includes/PaintingDB.php';

include 'includes/SubjectDB.php';

include 'includes/DataAccess.php';


$dataObj = DBHelper::setConnectionInfo();

$painting = new PaintingDB($dataObj);

$subjectObj = new SubjectDB($dataObj);

if(isset($_GET['id'])){

$id = $_GET['id'];

}

$subject = $subjectObj->findByID($id);

$paintings = $painting->getPaintingsBySubject($id);



if (empty($subject))

{

$id = 7;

$subject = $subjectObj->findByID($id);

$paintings = $painting->getPaintingsBySubject($id);

}

?>
