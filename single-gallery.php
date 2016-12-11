<?php
session_start();
?>
<?php

require 'includes/SingleGalleryLogic.php';

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
    <style>
    </style>
</head>

<body >



    <header>

        <?php include 'includes/header.php';?>

    </header>



    <main>



        <section class="ui segment grey100">
            <div class="ui segment stackable grid container">
                <div class="eight wide column">
                    <div id="map"></div>

                    <?php echo googleMap($gallery[0]['Latitude'], $gallery[0]['Longitude'], $apiKey); ?>

                </div>
                <div class="eight wide column">
                    <h1><?php echo $gallery[0]['GalleryName']; ?></h1>
                    <em><?php echo $gallery[0]['GalleryNativeName']; ?></em>
                    <p><?php echo $gallery[0]['GalleryCity'] . ', ' . $gallery[0]['GalleryCountry']; ?></p>
                    <i class="globe icon"></i><a href='<?php echo $gallery[0]['GalleryWebSite'] ?>'>Website Link</a>

                </div>
            </div>
        </section>

        <!-- Replace the value of the key parameter with your own API key. -->

        <h2 class="ui horizontal divider"><i class="paint brush icon"></i>Paintings</h2>
        <br>
        <div class="ui six column doubling grid container container-margin">
            <?php
            foreach ($painting as $info) {?>

                
                <div class="three wide column stackable">


                    <div class="image rounded ui"> <a href="single-painting.php?id=<?php echo $info['PaintingID']?>"><img class="hoverimage" src="images/art/works/square-medium/<?php echo $info['ImageFileName'] ?>.jpg"></a> </div>



                </div>

                <?php } ?>




            </div>







            <?php include 'includes/footer.php';?>

        </body>

        </html>
