<?php
include('header.php');
include('functions.php');
?>
<section class="ui segment grey100">
    <div class="ui container items">
        <div class="item">
            <div class="image">
                <img src=<?php echo '"images/art/genres/square-medium/' . isValidGenreID($_GET['id']) . '.jpg"';?>>
            </div>
            <div class="content">
                <div class="ui list ">
                    <div class="item">
                        <div class="">
                            <h1><?php echo getGenreName($_GET['id']);?></h1>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class=""><?php echo getGenreDescription($_GET['id']); ?></div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
<section class="ui container">
    <h2>Paintings</h2>
    <div class="ui divider"></div>
    <div class="ui grid stackable">
        <? echo getPaintingsGenre($_GET['id']); ?>
    </div>
</section>
