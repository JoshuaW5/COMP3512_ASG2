<?php
session_start();
?>
<!DOCTYPE html>

<?php

require 'includes/SingleSubjectLogic.php';

?>

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

    <main>

        <section class="ui segment grey100">

            <div class="ui segment stackable grid container">

                <div class="three wide column">

                    <img src="images/art/works/square-medium/<?php echo $paintings[0]['ImageFileName'] ?>.jpg" alt="..." class="ui centered fluid image">



                </div>

                <div class="thirteen wide column">

                    <h1><?php echo $subject[0]['SubjectName']; ?></h1>




                </div>

            </div>

        </section>



        <div class="ui six column stackable grid container container-margin">

            <h2 class="ui horizontal divider"><i class="paint brush icon"></i>Paintings</h2>

            <?php

            foreach ($paintings as $painting){?>
                <div class="column"><div class="image"><a href="single-painting.php?id=<?php echo $painting['PaintingID'] ?>"><img src="images/art/works/square-medium/<?php echo $painting['ImageFileName']?>.jpg"></div><p><?php echo $painting['Title']?></p></a></div>

            <?php } ?>





        </div>

    </main>







    <?php include 'includes/footer.php';?>

</body>



</html>
