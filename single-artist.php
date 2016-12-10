<?php

require ('includes/SingleArtistLogic.php');
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



    <script type="text/javascript" src="js/slick/slick.min.js"></script>



    <link href="css/semantic.css" rel="stylesheet" >

    <link href="css/icon.css" rel="stylesheet" >

    <link href="css/styles.css" rel="stylesheet">



    <link rel="stylesheet" type="text/css" href="js/slick/slick.css"/>

    <link rel="stylesheet" type="text/css" href="js/slick/slick-theme.css"/>



</head>

<body >


    <header>

        <?php include 'includes/header.php';?>

    </header>



    <body>

        <main >



            <!-- Main section about painting -->

            <section class="ui segment grey100">



                <div class="ui doubling stackable grid container">



                    <div class="nine wide column">

                        <div class="img-slider">
<?php //getHits(); ?>
                            <?php

                            if ($paintings[0]['PaintingID'] != null) {

                                echo '<div class="column">

                                <div class="ui fluid card">

                                <div class="image"> <a href="single-painting.php?id=' . $paintings[0]['PaintingID'] . '"><img class="ui big image" id="artwork" src="images/art/artists/medium/' . $artistInfo[0]['ArtistID'] . '.jpg"></a> </div>

                                </div>

                                </div>';
                            }







                            ?>



                        </div>



                    </div>	<!-- END LEFT Picture Column -->



                    <div class="seven wide column">



                        <!-- Main Info -->

                        <div class="item">

                            <h2 class="header"><?php echo $artistInfo[0]['FirstName'] . ' ' . $artistInfo[0]['LastName']; ?></h2>

                            <h3 ><?php echo $artistInfo[0]['Nationality']; ?></h3>

                            <div class="meta">

                                <?php echo $artistInfo[0]['Details']; ?>

                            </div>

                        </div>



                        <!-- Tabs For Details, Museum, Genre, Subjects -->

                        <div class="ui top attached tabular menu ">

                            <a class="active item" data-tab="details"><i class="image icon"></i>Details</a>

                        </div>



                        <div class="ui bottom attached active tab segment" data-tab="details">

                            <table class="ui definition very basic collapsing celled table">

                                <tbody>

                                    <tr>

                                        <td>

                                            Artist

                                        </td>

                                        <td>

                                            <?php echo $artistInfo[0]['FirstName'] . ' ' . $artistInfo[0]['LastName']; ?>

                                        </td>

                                    </tr>

                                    <tr>

                                        <td>

                                            Nationality

                                        </td>

                                        <td>

                                            <?php echo $artistInfo[0]['Nationality']; ?>

                                        </td>

                                    </tr>

                                    <tr>

                                        <td>

                                            Year of Birth

                                        </td>

                                        <td>

                                            <?php echo $artistInfo[0]['YearOfBirth']; ?>

                                        </td>

                                    </tr>

                                    <tr>

                                        <td>

                                            Year of Death

                                        </td>

                                        <td>

                                            <?php echo $artistInfo[0]['YearOfDeath']; ?>

                                        </td>

                                    </tr>

                                    <tr>

                                        <td>

                                            More Information

                                        </td>

                                        <td>

                                            <?php echo '<a href="' . $artistInfo[0]['ArtistLink'] . '">Click Here</a>'; ?>

                                        </td>

                                    </tr>
									
									<tr>
									<form class="ui form" action="includes/addToFavorites.php">
									<input type="hidden" name="artistID" value="<?php echo $_GET['id'];?>">
									                    <button class="ui left labeled icon button">
                      <i class="heart icon"></i>
                      Add to Favorites
                    </button>
                    </form>
									</tr>

                                </tbody>

                            </table>

                        </div>



                        </div>	<!-- END RIGHT data Column -->

                    </div>		<!-- END Grid -->

                </section>		<!-- END Main Section -->





                <!-- Related Images ... will implement this in assignment 2 -->

                <section class="ui container">

                    <h3 class="ui horizontal divider"><i class="paint brush icon"></i> Related Works</h3>

                </section>



                <div class="ui container centered grid">



                    <?php

                    foreach ($paintings as $paint) {

                        echo '<div class="three wide column stackable">


                        <div class="image rounded ui"> <a href="single-painting.php?id=' . $paint['PaintingID'] . '"><img src="images/art/works/square-medium/' . $paint['ImageFileName'] . '.jpg"></a> </div>



                        </div>';



                    }



                    ?>

                </div>

                <br><br>



            </main>







            <?php include 'includes/footer.php';?>

        </body>

        </html>
