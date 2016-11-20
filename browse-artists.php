<?php
session_start();
?>
<!DOCTYPE html>

<?php
require 'includes/BrowseArtistsLogic.php';
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
    <div class="banner1">

        <h1 class="ui huge header banner-header">Artists</h1>

    </div>
    <div class="hidden ui divider">

    </div>
    <main class="ui container">
        <div class="ui six column grid cards">
            <?php foreach ($artists as $artist){ ?>

                <div class="card ui fluid">
                    <div class="image">
                        <img src="<?php echo checkImageFile($artist['ArtistID']); ?>">
                    </div>
                    <div class="content">

                        <a class="header" href="single-artist.php?id=<?php echo $artist['ArtistID']; ?>"><?php echo $artist['FirstName'] . ' ' . $artist['LastName']; ?></a>
						</div>
						<div class="extra content">
						<form class="ui form">
						<input type="hidden" name="artistID" value="<?php echo $artist['ArtistID'];?>">
						<button class="ui icon orange submit button" formaction="includes/addToFavorites.php">
							<i class="heart icon"></i>
						</button>
						</form>
						</div>

                </div>
                <?php }?>
            </main>

            <?php include 'includes/footer.php';?>
        </body>
        </html>
