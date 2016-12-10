<?php
session_start();
ini_set('error_reporting', E_ALL);

ini_set('display_errors', 'On');

public function updateCart() {
$newFrame = $_GET['frame'];
$newGlass = $_GET['glass'];
$newMatt = $_GET['matt'];
$newQty = $_GET['qty'];
$i = 0;

foreach ($_SESSION['cart'] as &$item) {

if (isset ($item['image'])) {

$item['frame'] = rtrim(strtok($newFrame[$i], "-"));
$item['glass'] = rtrim(strtok($newGlass[$i], "-"));
$item['matt'] = rtrim(strtok($newMatt[$i], "-"));


if (isset ($_GET['qty'])) {
$item['qty'] = strtok($newQty[$i], " ");
}
$i++;

}
}
}

?>