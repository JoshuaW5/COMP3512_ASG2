<?php

session_start();



$_SESSION['cart']['id'] = array();



$product=array();



if (isset($_GET['ID'], $_GET['qty'], $_GET['frame'], $_GET['glass'], $_GET['matt'], $_GET['image'])) {

	

$product['id'] = $_GET['ID'];

$id = $_GET['ID'];



$product['qty'] = $_GET['qty'];

$product['frame'] = $_GET['frame'];

$product['glass'] = $_GET['glass'];

$product['matt'] = $_GET['matt'];

$product['image'] = $_GET['image'];



//if(in_array($id, $_SESSION) {

//logic for adding a duplicate item

//}



$_SESSION['cart'][$id] = $product;





header('Location: ../single-painting.php?id=' . $id);

}





?>