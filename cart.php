<!DOCTYPE html>
<?php 
session_start();
require 'includes/CartLogic.php';
require 'includes/singlePaintingLogic.php';

$cart = new CartLogic();
?>
<html lang=en>
<head>
<meta charset=utf-8>
    <link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="css/semantic.js"></script>
	<script src="js/misc.js"></script>
    
    <link href="css/semantic.css" rel="stylesheet" >
    <link href="css/icon.css" rel="stylesheet" >
    <link href="css/styles.css" rel="stylesheet">   
	
</head>
<body >
    
    <header>
        <?php include 'includes/header.php';?>
    </header> 
    
<main >
<section class="ui segment grey100">
<div class="ui one column stackable center aligned page grid">

<table class="ui table">
  <thead>
    <tr><th class="two wide">Painting</th>
	<th class="four wide">Details</th>
    <th class="six wide">Protection</th>
	<th class="one wide">Quantity</th>
	<th class="two wide">Price</th>
  </tr></thead>
  <tbody>
 <?php $cart->displayCart();?>
  </tbody>
  <tfoot>
    <tr><th>3 People</th>
    <th>2 Approved</th>
	<th>Approved</th>
	<th>Approved</th>
	<th>Approved</th>
  </tr></tfoot>
</table>
</div>


</div>
</section>

</main>    

<?php include 'includes/footer.php';?>
</body>
</html>

<script>
function changeCart(){
    document.getElementById("form1").submit();
	alert("hiii");
}
</script>