<?php

session_start();



$_SESSION['pFavorites']['id'] = array();
$_SESSION['aFavorites']['id'] = array();


$product=array();


if (isset($_GET['ID'], $_GET['image'])) {

$product['id'] = $_GET['ID'];

$id = $_GET['ID'];

$product['image'] = $_GET['image'];


$_SESSION['pFavorites'][$id] = $product;


header('Location: ../favorites.php');

} else if (isset($_GET['artistID'])) {

$product['id'] = $_GET['artistID'];

$id = $_GET['artistID'];

$_SESSION['aFavorites'][$id] = $product;

header('Location: ../favorites.php');

}





?>