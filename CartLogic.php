<?php 
session_start();

class CartLogic {

public function displayCart() {

$dataAccess = new DataAccess();
$dataAccess->connect();

if (isset($_SESSION['cart'])) {

$painting = new PaintingDB($dataAccess->getPDO());
$artist = new ArtistDB($dataAccess->getPDO());
$frame = new FrameDB($dataAccess->getPDO());
$glass = new GlassDB($dataAccess->getPDO());
$matt = new MattDB($dataAccess->getPDO());

$frames = $frame->getAllNames();
$mattTypes = $matt->getAllNames();
$glassTypes = $glass->getAllNames();

foreach ($_SESSION['cart'] as $item) {
if (isset ($item['image'])) {
$info = $painting->fetchPaintingInfo($item['id']); //Info about painting


    echo '<tr>
      <td><img src="images/art/works/square-medium/' . $item["image"] . '.jpg">
	  </td>
	  <td>
	  <h2>' . $info[0]["Title"] . '</h2>
	  <h3>' . $artist->getArtistName($info[0]['ArtistID']) . '</h3>
	  </td>
      <td>
	  	  <form id="form1" class="ui form" action="' . $this->changeCart() . '">
	                          <div class="three fields">                              
                            <div class="five wide field">
                                <label>Frame</label>
                                <select onchange="changeCart()" id="frame" name="frame" class="ui search dropdown">'; 
						  						foreach ($frames as $names) {
						  echo "<option>" . $names["Title"] . "</option>"; 
						  }
						  
						  
	echo '</select>
                            </div>  
                            <div class="five wide field">
                                <label>Glass</label>
                                <select onchange="changeCart()" id="glass" name="glass" class="ui search dropdown">';
															foreach ($glassTypes as $glassNames) {
						  echo '<option>' . $glassNames['Title'] . '</option>'; 
						  }
			echo
                                '</select>
                            </div>  
                            <div class="five wide field">
                                <label>Matt</label>
                                <select onchange="changeCart()" id="matt" name="matt" class="ui search dropdown">'; 
															foreach ($mattTypes as $mattNames) {
						  echo '<option>' . $mattNames['Title'] . '</option>'; 
						  }
echo '</select>
                            </div>   
                        </div> 
						</div>
	  </td>
	  <td>	  
	  <form class="ui form" action="includes/addToCart.php">
	                              <div class="sixteen wide field">
                                <input onchange="changeCart()" type="number" name="qty" value="' . $item["qty"] . '">
                            </div>                      
	  </form>
	  </td>
	  <td>
	  $100.00
	  </td>
    </tr> </tbody>';
	}
	}
}
else {
$this->emptyCart();
}

}

public function emptyCart() {
echo '<div class="ui one column stackable center aligned page grid">
<div class="ui error message">
  <i class="close icon"></i>
  <div class="header">
    There was some errors with your submission
  </div>
  <ul class="list">
    <li>You must include both a upper and lower case letters in your password.</li>
    <li>You need to select your home country.</li>
  </ul>
</div>';

}

public function changeCart() {

}

}



?>