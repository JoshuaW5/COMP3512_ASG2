<?php
include('header.php');
include('functions.php');
?>
<main class="ui main double-margin">
    <div class="ui segment">
        <div class="ui grid stackable">
            <aside class="four wide column">
                <h3>Filters</h3>
                <div class="ui divider"></div>
                <h4>Artist</h4>
                <form>

                    <div class="ui selection dropdown full-width">
                        <input type="hidden" name="artist">
                        <i class="dropdown icon"></i>
                        <div class="default text">Select Artist</div>
                        <div class="menu">
                            <?php
                            echo getArtists();
                            ?>
                        </div>
                    </div>
                    <h4>Museum</h4>
                    <div class="ui selection dropdown full-width">
                        <input type="hidden" name="museum">
                        <i class="dropdown icon"></i>
                        <div class="default text">Select Museum</div>
                        <div class="menu" name="museum">
                            <?php
                            echo getMuseums();
                            ?>
                        </div>
                    </div>
                    <h4>Shape</h4>
                    <div class="ui selection dropdown full-width">
                        <input type="hidden" name="shape">
                        <i class="dropdown icon"></i>
                        <div class="default text">Select Shape</div>
                        <div class="menu">
                            <?php
                            echo getShapes();
                            ?>
                        </div>
                    </div>
                    <div class="ui divider hidden"></div>
                    <button class="ui basic button" action="browse-paintings.php">
                        <i class="icon filter"></i>
                        Filter
                    </button>
                </form>
            </aside>
            <section class="twelve wide column">
                <h2>Paintings</h2>
                <div class="ui divider hidden"></div>
                <p>
                    
                    <?php
                    if (isset($_GET['artist']) && !empty($_GET['artist'])) {
                        $html = getPaintings($_GET['artist']);
                    }
                    elseif (isset($_GET['museum']) && !empty($_GET['museum'])) {
                        $html = getPaintings($_GET['museum']);
                    }
                    elseif (isset($_GET['shape']) && !empty($_GET['shape'])) {
                        $html = getPaintings($_GET['shape']);
                    }
                    else {
                        $html = getPaintings();
                    }
                    echo $html;
                    ?>
                </div>
            </section>
        </div>
    </div>
</main>

<?php header('Content-type: text/plain');
echo '<pre>'; print_r($paintingInfo); echo '</pre>'; ?>
