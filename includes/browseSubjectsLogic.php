<?php

include 'includes/SubjectDB.php';

include 'includes/PaintingDB.php';

include 'includes/DataAccess.php';

include 'includes/config.php';

$dataObj = DBHelper::setConnectionInfo(Array("host"=>DBHOST, "database"=>DBNAME, "user"=>DBUSER, "pass"=>DBPASS, "charset"=>DBCHAR));


$subject = new SubjectDB($dataObj);

$painting = new PaintingDB($dataObj);

$subjects = $subject->getAll();

function getImageForSubject($id, $paintingObj){
    $paintingImage = $paintingObj->getPaintingBySubject($id);
    if (empty($paintingImage[0])){
        return $paintingObj->findByID(420);
    }
    return $paintingImage;
}
?>
