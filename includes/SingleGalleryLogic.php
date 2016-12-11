<?php


include 'includes/GalleryDB.php';

include 'includes/PaintingDB.php';

include 'includes/DataAccess.php';


$dataObj = DBHelper::setConnectionInfo();

$apiKey = 'AIzaSyADuEuxPE0PkZQEktosoeI0RCwKoZn5-7k';



$galleries = new GalleryDB($dataObj);

$paintings = new PaintingDB($dataObj);

if(isset($_GET['id'])){

$id = $_GET['id'];

}


$gallery = $galleries->findByID($id);


if (empty($gallery))

{

$id = 2;

$gallery = $galleries->findByID($id);

}

$painting = $paintings->getPaintingsByGallery($id);

function googleMap($lat, $lng, $key){
    echo '<script type="text/javascript">
    window.onload = function initMap() {
        var uluru = {lat: ' . $lat . ', lng: ' . $lng . '};
        var map = new google.maps.Map(document.getElementById(\'map\'), {
            zoom: 15,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=' . $key . '&callback=initMap">
    </script>';
}

?>
