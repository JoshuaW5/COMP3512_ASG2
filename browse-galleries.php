<!DOCTYPE html>

<?php

require 'includes/BrowseGalleriesLogic.php';
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

        <h1 class="ui huge header banner-header">Museums</h1>

    </div>
    <div class="hidden ui divider"></div>
    <main class="ui container">

        <div class="ui three column stackable doubling fluid container grid">



            <?php foreach ($galleries as $gallery) { ?>
                <div class="wide column">
                    <div class="ui list">
                        <div class="item">
                            <i class="university icon"></i>
                            <div class="content">
                                <a class="header" href="single-gallery.php?id=<?php echo $gallery['GalleryID']; ?>"><h3>
                                    <?php echo $gallery['GalleryName']; ?></h3>
                                </a>
                                <div class="description">
                                    <?php echo $gallery['GalleryCity'] . ', ' . $gallery['GalleryCountry']; ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>



            </div>
        </div>
    </div>
</main>
<?php include 'includes/footer.php';?>
</body>
</html>
