<?php
session_start();
?>
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
    <script src="js/PaintingFunctions.js"></script>
    <script type="text/javascript" src="js/hoverImage.js"></script>

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
                        <form action="">
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
                                        <!-- <button type="sumbit" value="Submit" class="ui left labeled icon orange button">
                                        <i class="filter icon"></i>
                                        Filter
                                    </button> -->
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="eleven wide column">
                        <h1>Paintings</h1>
                        <div class="ui segment">
                            <div class="ui segment">
                                    <div class="ui inverted dimmer" id="paintLoader">
                                        <div class="ui massive text loader">Loading</div>
                                    </div>
                                    <p id="searchParam">All Paintings [TOP 20]</p>
                                    <div id="PaintingList">
                                    </div>



                            </div>

                        </div>



                    </div>
                </div>

            </main>



            <?php include 'includes/footer.php';?>
        </body>
        </html>
