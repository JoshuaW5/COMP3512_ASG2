<div class="ui attached stackable grey inverted  menu">
    <div class="ui container">
        <nav class="right menu">
            <div class="ui simple  dropdown item">
                <i class="user icon"></i> Account <i class="dropdown icon"></i>
                <div class="menu"> <a class="item"><i class="sign in icon"></i> Login</a> <a class="item"><i class="edit icon"></i> Edit Profile</a> <a class="item"><i class="globe icon"></i> Choose Language</a> <a class="item"><i class="settings icon"></i> Account Settings</a> </div>
            </div>
            <a href="favorites.php" class=" item"> <i class="heartbeat icon"></i> Favorites
						<div class="floating ui teal label" style="top: -0.2em">
			<?php echo countFavorites(); ?>
			</div>
			</a>
            <a href="cart.php" class=" item"> <i class="shop icon"></i> Cart
			<div class="floating ui teal label" style="top: -0.2em">
			<?php echo countCart(); ?>
			</div>
			</a>
        </nav>
    </div>
</div>
<div class="ui attached stackable borderless huge menu">
    <div class="ui container">
        <a href="index.php"><h2 class="header item">						<img src="images/logo5.png" class="ui small image" >					</h2></a>
        <a class="item" href="index.php"> <i class="home icon"></i> Home </a>
        <a class="item" href="aboutus.php"> <i class="mail icon"></i> About Us </a>
        <a class="item"> <i class="home icon"></i> Blog </a>
        <div class="ui simple dropdown item">
            <i class="grid layout icon"></i>
            Browse
            <i class="dropdown icon"></i>
            <div class="menu">
                <a class="item" href="browse-artists.php">
                    <i class="users icon"></i>
                    Artists
                </a>
                <a class="item" href="browse-genres.php">
                    <i class="theme icon"></i> Genres
                </a> <a class="item" href="browse-paintings.php">
                    <i class="paint brush icon"></i>
                    Paintings
                </a>
                <a class="item" href="browse-subjects.php">
                    <i class="cube icon"></i>
                    Subjects
                </a>
                <a class="item" href="browse-galleries.php">
                    <i class="university icon"></i>
                    Galleries
                </a>
            </div>
        </div>
        <div class="right item">
		<form class="ui form" action="browse-paintings.php">
            <div class="ui mini icon input">

                <input type="text" name="search" placeholder="Search ..."> <i class="search icon"></i> </div>

            </div>
							</form>
        </div>
    </div>

<?php

function countFavorites() {
$count = 0;
if(isset($_SESSION['pFavorites'])) {
	foreach ($_SESSION['pFavorites'] as $item) {
		if (isset ($item['id'])) {
			$count++;
		}
		}
		}
	
	if (isset($_SESSION['aFavorites'])) {
foreach ($_SESSION['aFavorites'] as $item) {
		if (isset ($item['id'])) {
			$count++;
		}
}
}


return $count;

}

function countCart() {
$count = 0;
if(isset($_SESSION['cart'])) {
	foreach ($_SESSION['cart'] as $item) {
		if (isset ($item['id'])) {
			$count++;
		}
		}
		}

return $count;

}

?>
