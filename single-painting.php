<?php
session_start();
?>
<!DOCTYPE html>

<?php
require 'includes/singlePaintingLogic.php';


?>
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

    <main >
        <!-- Main section about painting -->
        <section class="ui segment grey100">
            <div class="ui doubling stackable grid container">

                <div class="nine wide column">
                    <img src="images/art/works/medium/<?php echo $info[0]['ImageFileName'];?>.jpg" alt="..." class="ui big image" id="artwork">

                    <div class="ui fullscreen modal">
                        <div class="image content">
                            <img src="images/art/works/large/<?php echo $info[0]['ImageFileName'];?>.jpg" alt="..." class="image" >
                            <div class="description">
                                <p></p>
                            </div>
                        </div>
                    </div>

                </div>	<!-- END LEFT Picture Column -->

                <div class="seven wide column">

                    <!-- Main Info -->
                    <div class="item">
                        <h2 class="header"><?php echo $info[0]['Title'];?></h2>
                        <h3 ><?php echo $artistName;?></h3>
                        <div class="meta">
                            <p>

                                <?php
                                if (intval($averageRating[0]) > 0) {
                                   for($i=0; $i<intval($averageRating[0]); $i++)
                                   {
                                       echo "<i class='orange star icon'></i>";
                                   }
                                   for($i=intval($averageRating[0]); $i<5; $i++)
                                   {
                                       echo "<i class='empty star icon'></i>";
                                   }
                                }
                                ?>

                            </p>
                            <p><?php echo $info[0]['Excerpt'];?></p>
                        </div>
                    </div>

                    <!-- Tabs For Details, Museum, Genre, Subjects -->
                    <div class="ui top attached tabular menu ">
                        <a class="active item" data-tab="details"><i class="image icon"></i>Details</a>
                        <a class="item" data-tab="museum"><i class="university icon"></i>Museum</a>
                        <a class="item" data-tab="genres"><i class="theme icon"></i>Genres</a>
                        <a class="item" data-tab="subjects"><i class="cube icon"></i>Subjects</a>
                    </div>

                    <div class="ui bottom attached active tab segment" data-tab="details">
                        <table class="ui definition very basic collapsing celled table">
                            <tbody>
                                <tr>
                                    <td>
                                        Artist
                                    </td>
                                    <td>
                                        <a href="single-artist.php?id=<?php echo $info[0]['ArtistID'];?>"><?php echo $artistName;?></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Year
                                    </td>
                                    <td>
                                        <?php echo $info[0]['YearOfWork'];?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Medium
                                    </td>
                                    <td>
                                        <?php echo $info[0]['Medium'];?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Dimensions
                                    </td>
                                    <td>
                                        <?php echo $info[0]['Width'] . " cm x " . $info[0]['Height'] . " cm ";?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="ui bottom attached tab segment" data-tab="museum">
                        <table class="ui definition very basic collapsing celled table">
                            <tbody>
                                <tr>
                                    <td>
                                        Museum
                                    </td>
                                    <td>
                                        <?php echo $galleryName;?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Assession #
                                    </td>
                                    <td>
                                        <?php echo $info[0]['AccessionNumber'];?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Copyright
                                    </td>
                                    <td>
                                        <?php echo $info[0]['CopyrightText'];?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        URL
                                    </td>
                                    <td>
                                        <a href="<?php echo $info[0]['MuseumLink'];?>">View painting at museum site</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="ui bottom attached tab segment" data-tab="genres">

                        <ul class="ui list">
                            <?php foreach ($genres as $genre) { ?>
                                <li class="item"><a href="single-genre.php?id=<?php echo $genre['GenreID']; ?>"><?php echo $genre['GenreName']; ?></a></li>
                                <?php } ?>

                            </ul>

                        </div>
                        <div class="ui bottom attached tab segment" data-tab="subjects">
                            <ul class="ui list">
                                <?php
                                foreach ($subjects as $subject) {
                                    echo '<li class="item"><a href="single-subject.php?id=' . $subject['SubjectID'] . '">' . $subject['SubjectName'] . '</a></li>';
                                }
                                ?>
                            </ul>
                        </div>

                        <!-- Cart and Price -->
                        <div class="ui raised segment">
                            <form class="ui form">
                                <div class="ui tiny statistic">
                                    <div class="value">
                                        <?php echo money_format('$%i', $info[0]['MSRP']);?>

                                    </div>
                                </div>
                                <div class="four fields">
                                    <div class="three wide field">
                                        <label>Quantity</label>
                                        <input type="number" name="qty" value="1">
                                    </div>
                                    <div class="four wide field">
                                        <label>Frame</label>
                                        <select id="frame" name="frame" class="ui search dropdown">
                                            <?php
                                            foreach ($frames as $names) {

                                                if($frames['Title'] = '[None]'){
                                                    echo '<option selected="selected">' . $frames['Title'] . '</option>';
                                                }else{
                                                    echo '<option>' . $frames['Title'] . '</option>';
                                                }
                                            }
                                            ?>

                                        </select>
                                    </div>
                                    <div class="four wide field">
                                        <label>Glass</label>
                                        <select id="glass" name="glass" class="ui search dropdown">
                                            <?php
                                            foreach ($glassTypes as $glassNames) {

                                                if($glassTypes['Title'] = '[None]'){
                                                    echo '<option selected="selected">' . $glassTypes['Title'] . '</option>';
                                                }else{
                                                    echo '<option>' . $glassTypes['Title'] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="four wide field">
                                        <label>Matt</label>
                                        <select id="matt" name="matt" class="ui search dropdown">

                                            <?php
                                            foreach ($mattTypes as $mattNames) {
                                                if($mattNames['Title'] = '[None]'){
                                                    echo '<option selected="selected">' . $mattNames['Title'] . '</option>';
                                                }else{
                                                    echo '<option>' . $mattNames['Title'] . '</option>';
                                                }

                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <input type="hidden" name="ID" value="<?php echo $_GET['id'];?>">
                                    <input type="hidden" name="image" value="<?php echo $info[0]['ImageFileName']; //Just give the session all the info you need for the cart, except price - we will pull directly from the DB ?>">
                                </div>
                                <div class="ui divider"></div>
                                <?php
                                echo checkCart($_GET['id']);
                                echo checkFavorites($_GET['id']);
                                ?>
                            </form>

                        </div>     <!-- END Cart -->

                    </div>	<!-- END RIGHT data Column -->
                </div>		<!-- END Grid -->
            </section>		<!-- END Main Section -->

            <!-- Tabs for Description, On the Web, Reviews -->
            <section class="ui doubling stackable grid container">
                <div class="sixteen wide column">

                    <div class="ui top attached tabular menu ">
                        <a class="active item" data-tab="first">Description</a>
                        <a class="item" data-tab="second">On the Web</a>
                        <a class="item" data-tab="third">Reviews</a>
                    </div>

                    <div class="ui bottom attached active tab segment" data-tab="first">
                        <?php echo $info[0]['Description'];?>
                    </div>	<!-- END DescriptionTab -->

                    <div class="ui bottom attached tab segment" data-tab="second">
                        <table class="ui definition very basic collapsing celled table">
                            <tbody>
                                <tr>
                                    <td>
                                        Wikipedia Link
                                    </td>
                                    <td>
                                        <a href="<?php echo $info[0]['WikiLink'];?>">View painting on Wikipedia</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        Google Link
                                    </td>
                                    <td>
                                        <a href="<?php echo $info[0]['GoogleLink'];?>">View painting on Google Art Project</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        Google Text
                                    </td>
                                    <td>
                                        <?php echo $info[0]['GoogleDescription'];?>
                                    </td>
                                </tr>



                            </tbody>
                        </table>
                    </div>   <!-- END On the Web Tab -->
                    <div class="ui bottom attached tab segment" data-tab="third">

                        <?php foreach($ratingInfo as $rating) {
                            echo '<div class="ui feed">

                            <div class="event">
                            <div class="content">
                            <div class="date">';
                            echo date_format(date_create($ratingInfo[0]['ReviewDate']), 'm/d/Y');
                            echo '</div>
                            <div class="meta">
                            <a class="like">';
                            for($i=0; $i<$ratingInfo[0]['Rating']; $i++)
                            {
                                echo "<i class='star icon'></i>";
                            }
                            for($i=$ratingInfo[0]['Rating']; $i<5; $i++)
                            {
                                echo "<i class='empty star icon'></i>";
                            }
                            echo '</a>
                            </div>
                            <div class="summary">';
                            echo $ratingInfo[0]['Comment'];
                            echo '</div>
                            </div>
                            </div>

                            <div class="ui divider"></div>';
                        }?>

                    </div>
                </div>   <!-- END Reviews Tab -->

            </div>
        </section> <!-- END Description, On the Web, Reviews Tabs -->

        <!-- Related Images ... will implement this in assignment 2
        <section class="ui container">
        <h3 class="ui dividing header">Related Works</h3>
    </section> -->

</main>



<?php include 'includes/footer.php';?>
</body>
</html>
