<!DOCTYPE html>
<?php 

ini_set('error_reporting', E_ALL);

ini_set('display_errors', 'On');
session_start();
session_destroy();

require 'includes/CartLogic.php';
require 'includes/singlePaintingLogic.php';
//require 'includes/config.php';

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
    <tr>
	<th></th>
		<th></th>
		<th></th>
		<th>Subtotal</th>
		<th><?php echo $cart->getCartSubTotal(); ?></th>
	</tr>
	<tr>
    <th></th>
	<th></th>
	<th>
	Orders over $1500 qualifies for free shipping. <br>Orders over $2500 qualifies for free express shipping.
	</th>
	<th class="six wide">
                                <select style="width: 100%" id="shipping" name="shipping" class="ui search dropdown" >
								<option selected="true" value="no" disabled>Choose a shipping option</option>
								<option value="standard" >Standard Shipping - $25.00</option>
								<option value="express" >Express Shipping - $50.00</option>
                                </select>
								</th>
	<th><?php echo $cart->shippingTotal(); ?></th>
	</tr>
	      <tr>
	<th></th>
		<th></th>
		<th></th>
		<th>Total</th>
		<th><?php echo $cart->getCartTotal(); ?></th>
	</tr>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th>                     <button class="ui labeled icon orange submit button">
                      <i class="add to cart icon"></i>
                      Update Cart
                    </button></th>
					<input type="hidden" name="update" value="1">
					</form>
  </tr>
	</tfoot>
</table>
</div>


</div>
</section>

</main>    

<?php include 'includes/footer.php';?>
</body>
</html>