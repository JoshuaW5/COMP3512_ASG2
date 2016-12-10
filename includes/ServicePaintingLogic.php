<?php

ini_set('error_reporting', E_ALL);

ini_set('display_errors', 'On');



include 'includes/DataAccess.php';

include 'includes/PaintingDB.php';

include 'includes/ArtistDB.php';

include 'includes/GalleryDB.php';

include 'includes/ShapeDB.php';

$dataObj = DBHelper::setConnectionInfo();

$painting = new PaintingDB($dataObj);

$arr = [];

$searchParams = [];
if(isset($_GET['artist']) && $_GET['artist'] != ''){

    $searchParams += [':artist'=>$_GET['artist']];
}
if (isset($_GET['musuem']) && $_GET['musuem'] != null) {

    $searchParams += [':musuem'=>$_GET['musuem']];

    # code...
}
if (isset($_GET['shape']) && $_GET['shape'] != null) {

    $searchParams += [':shape'=>$_GET['shape']];

    # code...
}
if (isset($_GET['name']) && $_GET['name'] != null) {

    $searchParams += [':name'=>$_GET['name'] . '%'];

    # code...
}
else{
    # top 20

}

foreach ($searchParams as $param => $value) {
    if ($value == "") {
        unset($arr[$param]);
    }
}

$arr = $painting->browsePaintings(1, $searchParams);//fix for accurate page nums


?>
