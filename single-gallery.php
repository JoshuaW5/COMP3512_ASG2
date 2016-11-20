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
     #map {
       width: 400px;
       height: 400px;
       background-color: grey;
     }
    </style>
</head>

<body >



    <header>

        <?php include 'includes/header.php';?>

    </header>



    <main>



        <section class="ui segment grey100">
            <div class="ui segment stackable grid container">
                <div class="three wide column">
                    image here

                </div>
                <div class="thirteen wide column">
                    <h1><?php echo $gallery[0]['GalleryName']; ?></h1>

                    <p><?php echo $gallery[0]['GalleryCountry']; ?></p>

                </div>
            </div>
        </section>
        <div id="map" class=""></div>
        <?php echo googleMap($gallery[0]['Latitude'], $gallery[0]['Longitude'], $apiKey); ?>
        <!-- Replace the value of the key parameter with your own API key. -->

        <h2 class="ui horizontal divider"><i class="paint brush icon"></i>Paintings</h2>
        <div class="ui six column stackable grid container container-margin">
            <?php
            foreach ($painting as $info) {?>
                <div class="column">
                    <div class="ui fluid card">
                        <div class="image"> <a href="single-painting.php?id=<?php echo $info['PaintingID']?>"><img src="images/art/works/square-medium/<?php echo $info['ImageFileName'] ?>.jpg"></a></div>
                    </div>
                </div>

                <?php } ?>




            </div>







            <?php include 'includes/footer.php'; var_dump($gallery);?>

        </body>

        </html>
