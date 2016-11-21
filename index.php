<?php 
	session_start();
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
    <link href="css/semantic.css" rel="stylesheet">
    <link href="css/icon.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
</head>

<body>
    <header>
<?php include 'includes/header.php';?>
    </header>
    <div class="hero-container">
        <div class="ui text container">
            <h1 class="ui huge header">Decorate your world</h1>
            <a class="ui huge orange button">Shop Now</a>
        </div>
    </div>
    <h2 class="ui horizontal divider"><i class="tag icon"></i> Deals</h2>
    <main>
	<div class="ui middle aligned stackable grid container">
        <div class="three column row">
            <div class="column">
                <div class="ui fluid card">
                    <div class="image"> <img src="images/art/works/medium/107050.jpg"> </div>
                    <div class="content">
                        <h4>Experience the sensuous pleasures of the French Rococco</h4>
                    </div>
                    <a href="single-genre.php?id=83"><button class="fluid ui button"><i class="info circle icon"></i>See More</button></a>
                </div>
            </div>
            <div class="column">
                <div class="ui fluid card">
                    <div class="image"> <img src="images/art/works/medium/126010.jpg"> </div>
                    <div class="content">
                        <h4>Appeciate the quiet beauty of the Dutch Golden Age</h4>
                    </div>
                    <a href="single-genre.php?id=87"><button class="fluid ui button"><i class="info circle icon"></i>See More</button></a>
                </div>
            </div>
            <div class="column">
                <div class="ui fluid card">
                    <div class="image"> <img src="images/art/works/medium/100030.jpg"> </div>
                    <div class="content">
                        <h4>Discover the glorious color of the Renaissance</h4>
                    </div>
                    <a href="single-genre.php?id=78"><button class="fluid ui button"><i class="info circle icon"></i>See More</button></a>
                </div>
            </div>
        </div>
		</div>
		
    </main>
</body>
<?php include 'includes/footer.php'; ?>
</html>