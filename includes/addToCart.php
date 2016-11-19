<?php

session_start();



$_SESSION['cart']['id'] = array();



$product=array();



if (isset($_GET['ID'], $_GET['image'])) {

$product['id'] = $_GET['ID'];

$id = $_GET['ID'];

$product['image'] = $_GET['image'];

if (isset($_GET['qty'], $_GET['frame'], $_GET['glass'], $_GET['matt'])) {
$product['qty'] = $_GET['qty'];

$product['frame'] = $_GET['frame'];

$product['glass'] = $_GET['glass'];

$product['matt'] = $_GET['matt'];

} else {
$product['qty'] = 1;

$product['frame'] = '[None]';

$product['glass'] = '[None]';

$product['matt'] = '[None]';
}



//if(in_array($id, $_SESSION) {

//logic for adding a duplicate item

//}



$_SESSION['cart'][$id] = $product;



echo print_r($_SESSION['cart']);

//header('Location: ../cart.php');

}





?>