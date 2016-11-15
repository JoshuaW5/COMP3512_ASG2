<?php

include 'includes/SubjectDB.php';

include 'includes/PaintingDB.php';

include 'includes/DataAccess.php';


$dataObj = DBHelper::setConnectionInfo();


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
