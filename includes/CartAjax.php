<?php
session_start();
ini_set('error_reporting', E_ALL);


ini_set('display_errors', '1');

//session_destroy();

if (isset($_GET['glass'])) {
	$id = $_GET['image'];
	$glass = $_GET['glass'];
	//$item['glass'] = rtrim(strtok($_GET['glass']));
	$_SESSION['cart'][$id]['glass'] = rtrim(strtok($glass, "-"));
	echo print_r($_SESSION['cart'][$id]['glass']);
 }

 if (isset($_GET['frame'])) {
	$id = $_GET['image'];
	$frame = $_GET['frame'];
	$_SESSION['cart'][$id]['frame'] = rtrim(strtok($frame, "-"));
	echo print_r($_SESSION['cart'][$id]['frame']);
 }

 if (isset($_GET['matt'])) {
	$id = $_GET['image'];
	$matt = $_GET['matt'];
	//$item['glass'] = rtrim(strtok($_GET['glass']));
	$_SESSION['cart'][$id]['matt'] = rtrim(strtok($matt, "-"));
	echo print_r($_SESSION['cart'][$id]['matt']);
 }

  if (isset($_GET['qty'])) {
	$id = $_GET['image'];
	$qty = $_GET['qty'];
	//$item['glass'] = rtrim(strtok($_GET['glass']));
	$_SESSION['cart'][$id]['qty'] = rtrim(strtok($qty, " "));
	echo print_r($_SESSION['cart'][$id]);
 }


?>
