<?php
include('header.php');
include('functions.php');
$results = getSinglePainting($_GET['id']);
?>

<main >
    <!-- Main section about painting -->
    <section class="ui segment grey100">
        <div class="ui doubling stackable grid container">

            <div class="nine wide column">
                <img src=<?php echo 'images/art/works/medium/' . $results[0]['ImageFileName'] . '.jpg'; ?> alt="..." class="ui big image" id="artwork">

                <div class="ui fullscreen modal">
                    <div class="image content">
                        <img src=<?php echo 'images/art/works/large/' . $results[0]['ImageFileName'] . '.jpg'; ?> alt="..." class="image" >
                        <div class="description">
                            <p></p>
                        </div>
                    </div>
                </div>

            </div>	<!-- END LEFT Picture Column -->

            <div class="seven wide column">
                <!-- Main Info -->
                <div class="item">
                    <h2 class="header"><?php echo $results[0]['Title']; ?></h2>
                    <h3 ><?php echo $results[0]['Title'];?></h3>
                    <div class="meta">
                        <p>
                            <i class="orange star icon"></i>
                            <i class="orange star icon"></i>
                            <i class="orange star icon"></i>
                            <i class="orange star icon"></i>
                            <i class="empty star icon"></i>
                        </p>
                        <p><?php echo $results[0]['Excerpt']; ?></p>
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
                                    <a href= <?php echo '"single-artist.php?id=' . $results[0]['ArtistID'] . '"' ?>><?php echo $results[0]['LastName']; ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Year
                                </td>
                                <td>
                                    <?php echo $results[0]['YearOfWork']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Medium
                                </td>
                                <td>
                                    <?php echo $results[0]['Medium']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Dimensions
                                </td>
                                <td>
                                    <?php echo $results[0]['Width']; ?>cm x <?php echo $results[0]['Height']; ?>cm
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
                                    <?php echo $results[0]['GalleryName']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Assession #
                                </td>
                                <td>
                                    <?php echo $results[0]['AccessionNumber']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Copyright
                                </td>
                                <td>
                                    <?php echo $results[0]['CopyrightText']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    URL
                                </td>
                                <td>
                                    <a href=<?php echo '"' . $results[0]['MuseumLink'] . '"'; ?>>View painting at museum site</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="ui bottom attached tab segment" data-tab="genres">

                    <ul class="ui list">
                        <li class="item"><a href="#">Baroque</a></li>
                        <li class="item"><a href="#">Dutch Golden Age</a></li>
                    </ul>

                </div>
                <div class="ui bottom attached tab segment" data-tab="subjects">
                    <ul class="ui list">
                        <li class="item"><a href="#">People</a></li>
                    </ul>
                </div>

                <!-- Cart and Price -->
                <div class="ui segment">
                    <div class="ui form">
                        <div class="ui tiny statistic">
                            <div class="value">
                                <?php echo '$' . number_format($results[0]['MSRP'],2); ?>
                            </div>
                        </div>
                        <div class="ui grid stackable">
                            <div class="three wide field">
                                <label>Quantity</label>
                                <input type="number">
                            </div>
                            <div class="four wide field">
                                <label>Frame</label>
                                <select id="frame" class="ui search dropdown" name="frame">
                                    <?php
                                    echo outputListOptions(query('SELECT * from TypesFrames;'));
                                    ?>
                                </select>
                            </div>
                            <div class="four wide field">
                                <label>Glass</label>
                                <select id="glass" class="ui search dropdown" name="glass">
                                    <?php echo outputListOptions(query('SELECT * FROM TypesGlass;')); ?>
                                </select>
                            </div>
                            <div class="four wide field">
                                <label>Matt</label>
                                <select id="matt" class="ui search dropdown" name="matt">
                                    <?php echo outputListOptions(query('SELECT * FROM TypesMatt;')); ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="ui divider"></div>

                    <button class="ui labeled icon orange button">
                        <i class="add to cart icon"></i>
                        Add to Cart
                    </button>
                    <button class="ui right labeled icon button">
                        <i class="heart icon"></i>
                        Add to Favorites
                    </button>
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
                <?php echo $results[0]['Excerpt']; ?>
            </div>	<!-- END DescriptionTab -->

            <div class="ui bottom attached tab segment" data-tab="second">
                <table class="ui definition very basic collapsing celled table">
                    <tbody>
                        <tr>
                            <td>
                                Wikipedia Link
                            </td>
                            <td>
                                <a href=<?php echo'"' . $results[0]['WikiLink'] . '"' ?>>View painting on Wikipedia</a>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Google Link
                            </td>
                            <td>
                                <a href=<?php echo'"' . $results[0]['GoogleLink'] . '"'; ?>>View painting on Google Art Project</a>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Google Text
                            </td>
                            <td>
                                <?php echo $results[0]['GoogleDescription']; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>   <!-- END On the Web Tab -->

            <div class="ui bottom attached tab segment" data-tab="third">
                <div class="ui feed">

                    <div class="event">
                        <div class="content">
                            <div class="date">12/14/2016</div>
                            <div class="meta">
                                <a class="like">
                                    <i class="star icon"></i><i class="star icon"></i><i class="star icon"></i><i class="star icon"></i><i class="star icon"></i>
                                </a>
                            </div>
                            <div class="summary">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ac vestibulum ligula. Nam ac erat sit amet odio semper vulputate. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse consequat pellentesque tellus, nec molestie tortor mattis eu. Aliquam cursus euismod nisl, vel vulputate metus interdum sit amet. Nam dictum eget ex non posuere. Praesent vel sodales velit. Ut id metus aliquam, egestas leo et, auctor ante.
                            </div>
                        </div>
                    </div>

                    <div class="ui divider"></div>

                    <div class="event">
                        <div class="content">
                            <div class="date">8/16/2016</div>
                            <div class="meta">
                                <a class="like">
                                    <i class="star icon"></i><i class="star icon"></i><i class="star icon"></i><i class="star icon"></i><i class="star icon"></i>
                                </a>
                            </div>
                            <div class="summary">
                                Donec vel tincidunt quam. Donec sed dictum quam, nec rutrum risus. Praesent ac tortor ut leo luctus cursus nec pharetra odio. Sed id orci id quam commodo congue eget eget erat. Quisque luctus posuere pharetra.
                            </div>

                        </div>
                    </div>

                </div>
            </div>   <!-- END Reviews Tab -->

        </div>
    </section> <!-- END Description, On the Web, Reviews Tabs -->

    <!-- Related Images ... will implement this in assignment 2 -->
    <section class="ui container">
        <h3 class="ui dividing header">Related Works</h3>
    </section>

</main>



<footer class="ui black inverted segment">
    <div class="ui container">footer</div>
</footer>
</body>
</html>
