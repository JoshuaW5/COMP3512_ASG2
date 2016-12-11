<?php


//left the logic of the service painting in a file with all other logic files for consistency.
include 'includes/ServicePaintingLogic.php';

$json = json_encode($arr);
echo json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

 ?>
