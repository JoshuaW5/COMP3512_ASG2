<?php
require 'includes/SingleGenreLogic.php';
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
<section class="ui segment grey100">
	<div class="ui segment stackable grid container">
<div class="three wide column">
<img src="images/art/genres/square-medium/.jpg" alt="..." class="ui centered fluid image" >

</div>
  <div class="thirteen wide column">
   <h1><?php echo $genre[0]['GenreName']; ?></h1>

	<p><?php echo $genre[0]['Description']; ?></p>

  </div>
  </div>
</section>

<h2 class="ui horizontal divider"><i class="paint brush icon"></i>Paintings</h2>
<div class="ui six column stackable grid container container-margin">
<?php
foreach ($paintings as $paint) {
$info = $painting->findByID($paint);
echo '<div class="column">
                    <div class="ui fluid card">
                        <div class="image"> <a href="single-painting.php?id=' . $info[0]['PaintingID'] . '"><img src="images/art/works/square-medium/' . $info[0]['ImageFileName'] . '.jpg"></a> </div>
					</div>
	 </div>';

}

?>


        </div>


</main>



<?php include 'includes/footer.php';?>
</body>
</html>
