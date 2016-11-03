<?php
include('header.php');
include('functions.php');
?>
<div class="ui image">
    <img src="images/banner1.jpg" alt="" />
    <div class="ui left internal attached rail ">
        <h1 class="left-pcnt-padding">Artists</h1>
    </div>
</div>
<div class="hidden ui divider">

</div>
<main class="ui container">
    <div class="ui six column grid cards">
            <?php echo buildArtistCards(); ?>
    </div>
</main>
