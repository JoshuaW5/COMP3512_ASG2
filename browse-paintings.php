<?php
require 'includes/BrowsePaintingsLogic.php';

?>

<!DOCTYPE html>
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

<main>
	<div class="ui segment stackable grid container">
<div class="five wide column">
<div class="row">
<h3 class="filters-header">Filters</h3>
<div class="ui fitted divider"></div>
<div class="ui form">
<form action="browse-paintings.php">
                            <div class="field">
                                <label class="filters-label">Artist</label>
                                <select id="frame" class="ui search dropdown" name="artist">
                                    <option value=''>Select Artist</option>
                                    <?php foreach ($artists as $names) {
									echo '<option value=' . $names['ArtistID'] . '>' . $names['FirstName'] . ' ' . $names['LastName'] . '</option>'; }?>

                                </select>
                            </div>
                            <div class="field">
                                <label>Museum</label>
                                <select id="frame" class="ui search dropdown" name="museum">
                                    <option value=''>Select Museum</option>
                                    <?php foreach ($galleryName as $mNames) {
									echo '<option value=' . $mNames['GalleryID'] . '>' . $mNames['GalleryName'] . '</option>'; }?>
                                </select>
                            </div>
                            <div class="field">
                                <label>Select Shape</label>
                                <select id="frame" class="ui search dropdown" name="shape">
                                    <option value=''>None</option>
                                    <?php foreach ($shapes as $sNames) {
									echo '<option value=' . $sNames['ShapeID'] . '>' . $sNames['ShapeName'] . '</option>'; }?>
                                </select>
                            </div>
                                        <button type="sumbit" value="Submit" class="ui left labeled icon orange button">
                      <i class="filter icon"></i>
                      Filter
                    </button>
</form>

</div>
</div>
</div>
  <div class="eleven wide column">
   <h1>Paintings</h1>
	<p>All Paintings [Showing 20]</p>

<?php
foreach ($info as $paintings) {
	echo '<form class="ui form">
	<div class="ui two column stackable grid container">
	<div class="four wide column"><a href="single-painting.php?id=' . $paintings['PaintingID'] . '">
	<img src="images/art/works/square-medium/';
	echo $paintings['ImageFileName'];
	echo '.jpg" alt="..." class="image" ></a>
	</div>
	<div class="twelve wide column">
	<h3 class="ui header">
	<div class="content">';
	echo $paintings['Title'];
	echo '<div class="sub header">';

	echo $artist->getArtistName($paintings['ArtistID']);
	echo '</div>
	</div>
	</h3>

	<p>';
	echo $paintings['Description'];

	echo "</p>
	<p>";
	?>
	<input type="hidden" name="ID" value="<?php echo $paintings['PaintingID'];?>">
							<input type="hidden" name="image" value="<?php echo $paintings['ImageFileName']; //Just give the session all the info you need for the cart, except price - we will pull directly from the DB ?>">
	<?php echo money_format('$%i', $info[0]['MSRP']);
	echo '</p>';
	
	echo checkCart($paintings['PaintingID']);
	echo checkFavorites($paintings['PaintingID']);

	echo '</form></div>
	</div>';}?>

  </div>
  </div>

</main>



<?php include 'includes/footer.php';?>
</body>
</html>
