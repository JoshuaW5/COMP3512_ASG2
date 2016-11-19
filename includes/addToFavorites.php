<?php

session_start();



$_SESSION['favorites']['id'] = array();



$product=array();



if (isset($_GET['ID'], $_GET['image'])) {

$product['id'] = $_GET['ID'];

$id = $_GET['ID'];

$product['image'] = $_GET['image'];

//if(in_array($id, $_SESSION) {

//logic for adding a duplicate item

//}



$_SESSION['favorites'][$id] = $product;


header('Location: ../favorites.php');

}





?>