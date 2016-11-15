<!DOCTYPE html>
<?php
require 'includes/BrowseGenresLogic.php';
?>
<html lang=en>

<head>
    <meta charset=utf-8>
    <link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="css/semantic.js"></script>
    <script src="js/misc.js"></script>

    <link href="css/semantic.css" rel="stylesheet">
    <link href="css/icon.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
</head>

<body>

    <header>
        <?php include 'includes/header.php';?>
    </header>
    <main>
        <div class="banner1">
            <h1 class="ui huge header banner-header">Genres</h1>
        </div>

        <div class="ui six column stackable grid container container-margin">

		<?php
		foreach ($genres as $info){
			echo '<div class="column">
					<div class="ui fluid card">
						<div class="image"><img src="images/art/genres/square-medium/' . $info['GenreID'] . '.jpg"></div>
						<div class="content">
							<a href="single-genre.php?id=' . $info['GenreID'] . '"><h4>' . $info['GenreName'] . '</h4></a>
						</div></div></div>';
		}
		?>

        </div>
    </main>



<?php include 'includes/footer.php';?>
</body>

</html>
