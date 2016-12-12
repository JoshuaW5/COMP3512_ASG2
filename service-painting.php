<?php

ini_set('error_reporting', E_ALL);

ini_set('display_errors', 'On');



include 'includes/DataAccess.php';

include 'includes/PaintingDB.php';

$dataObj = DBHelper::setConnectionInfo();

$painting = new PaintingDB($dataObj);

$arr = [];

$searchParams = [];

//-----------------------------------------------------------------------------------------
//         ASSIGNING SEARCH PARAMETERS GIVEN FROM API CALL
//-----------------------------------------------------------------------------------------

if(isset($_GET['artist']) && $_GET['artist'] != ''){

    $searchParams += [':artist'=>$_GET['artist']];
}
if (isset($_GET['museum']) && $_GET['museum'] != null) {

    $searchParams += [':museum'=>$_GET['museum']];

}
if (isset($_GET['shape']) && $_GET['shape'] != null) {

    $searchParams += [':shape'=>$_GET['shape']];

}
if (isset($_GET['name']) && $_GET['name'] != null) {

    $searchParams += [':name'=>$_GET['name'] . '%'];

}
if (isset($_GET['search']) && $_GET['search'] != null) {
	$searchParams += [':search'=>$_GET['search'] . '%'];
}
else{

}

foreach ($searchParams as $param => $value) {
    if ($value == "") {
        //IF THE PARAM WAS EMPTY FORGET ABOUT TRYING TO SEARCH FOR IT
        unset($arr[$param]);
    }
}

//CALL THE PAINTING QUERY
$arr = $painting->browsePaintings(1, $searchParams);


//MAKE JSON
//header('Content-Type: application/json
echo json_encode($arr);

 ?>
