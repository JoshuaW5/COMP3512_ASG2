<?php

define('SERVER', 'localhost');
define('DATABASE', 'art');
define('USER', 'testuser');
define('PASSWORD', 'mypassword');
define('CHARSET', 'utf8');

define('DEFAULT_ARTIST', 10);
define('DEFAULT_PAINTING', 420);
define('DEFAULT_GENRE', 33);

//used to query everything
function query($sql, $params=Array()){
    try{
        $conn = new PDO('mysql:host=' . SERVER . ';dbname=' . DATABASE . ';charset='. CHARSET, USER, PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare($sql);
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }
        $result = Array();
        if($stmt->execute()){
            $result = $stmt -> fetchAll();
        }
        $conn = null;
    }catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
        $conn = null;
    }
    return $result;
}



//single painting
function isValidPaintingID($id){
    $exists = query("SELECT PaintingID FROM Paintings WHERE PaintingID = :id", Array(':id'=>$id));
    if (!empty($exists[0])){


        return $id;
    }
    else{

        return DEFAULT_PAINTING;
    }
}
function getSinglePainting($id){
    if (isset($id) && !empty($id) && isValidPaintingID($id) <> DEFAULT_PAINTING) {
        $value = $id;
    }
    else {
        $value = DEFAULT_PAINTING;
    }

    $sql = 'SELECT * FROM PAINTINGS JOIN ARTISTS USING (ARTISTID) JOIN GALLERIES USING(GALLERYID) WHERE PAINTINGID = :paintingid;';
    $params = Array(':paintingid'=>$value);
    return query($sql, $params);
}




//browse paintings
function outputListOptions($options){
    $html .= '<option>None</option>';
    foreach ($options as $option) {
        $html .= '<option>' . $option['Title'] . '</option>';
    }
    return $html;
}
function writePaintingSearchType($type){

}
function getPaintings($id){
    $html .= '<strong>';
    if (isset($_GET['artist']) && !empty($_GET['artist'])) {
        $paintingInfo = query('SELECT * FROM PAINTINGS JOIN ARTISTS USING (ARTISTID) WHERE ArtistID = :id ORDER BY YearOfWork ASC LIMIT 20;', Array(':id'=>$_GET['artist']));
        $html .= 'ALL PAINTINGS [' . query("SELECT CONCAT_WS(' ', FirstName, LastName) as 'Name' FROM Artists WHERE ArtistID = :id", Array(':id'=>$_GET['artist']))[0]['Name'] . ']';
    }
    elseif (isset($_GET['museum']) && !empty($_GET['museum'])) {
        $paintingInfo = query('SELECT * FROM PAINTINGS JOIN ARTISTS USING (ARTISTID) WHERE GalleryID = :id ORDER BY YearOfWork ASC LIMIT 20;', Array(':id'=>$_GET['museum']));
        $html .= 'ALL PAINTINGS [' . query("SELECT GalleryName FROM GALLERIES WHERE GalleryID = :id", Array(':id'=>$_GET['museum']))[0]['GalleryName'] . ']';
    }
    elseif (isset($_GET['shape']) && !empty($_GET['shape'])) {
        $paintingInfo = query('SELECT * FROM PAINTINGS JOIN ARTISTS USING (ARTISTID) WHERE ShapeID = :id ORDER BY YearOfWork ASC LIMIT 20;', Array(':id'=>$_GET['shape']));
        $html .= 'ALL PAINTINGS [' . query("SELECT ShapeName FROM SHAPES WHERE ShapeID = :id", Array(':id'=>$_GET['shape']))[0]['ShapeName'] . ']';
    }
    else {
        $paintingInfo = query('SELECT * FROM PAINTINGS JOIN ARTISTS USING (ARTISTID) ORDER BY YearOfWork ASC LIMIT 20;');
        $html .= 'ALL PAINTINGS [TOP 20]';
    }
    $html .= '</strong></p><div class="ui divided items">';
    foreach ($paintingInfo as $painting) {
        $html .= '<div class="item"><div class="image"><a href="single-painting.php?id=' . $painting['PaintingID'] . '"><img src="./images/art/works/square-medium/' . $painting['ImageFileName'] . '.jpg"></a></div><div class="ui list content"><div class="item"><div class="content"><h3>' . $painting['Title'] . '</h3></div></div>';
        $html .= '<div class="item"><div class="content">' . $painting['FirstName'] . ' ' . $painting['LastName'] . '</div></div>';
        $html .= '<div class="item"><div class="content">' . $painting['Description'] . '</div></div>';
        $html .= '<div class="item"><div class="content">$' . number_format($painting['MSRP'],2) . '</div></div>';
        $html .= '<div class="item"><div class="content"><button type="button" name="button" class="ui icon button orange"><i class="shop icon"></i></button><button type="button" name="button" class="ui icon button"><i class="heart icon"></i></button></div></div></div></div>';
    }
    return $html;
}
function getArtists(){
    $artist_options = query("SELECT ArtistID, CONCAT_WS(' ', FirstName, LastName) as 'Name' FROM ARTISTS ORDER BY LastName, FirstName");
    foreach ($artist_options as $option) {
        $html .= '<div class="item" data-value="' . $option['ArtistID'] . '">' . $option['Name'] . '</div>';
    }
    return $html;
}
function getMuseums(){
    $museum_options = query("SELECT GalleryID, GalleryName FROM GALLERIES ORDER BY GalleryName");
    foreach ($museum_options as $option) {
        $html .= '<div class="item" data-value="' . $option['GalleryID'] . '">' . $option['GalleryName'] . '</div>';
    }
    return $html;
}
function getShapes(){
    $Shape_options = query("SELECT ShapeID, ShapeName FROM SHAPES ORDER BY ShapeName");
    foreach ($Shape_options as $option) {
        $html .= '<div class="item" data-value="' . $option['ShapeID'] . '">' . $option['ShapeName'] . '</div>';
    }
    return $html;
}





//browse ARTISTS
function buildArtistCards(){
    $artists = query("SELECT ArtistID FROM Artists ORDER BY LastName, FirstName");
    foreach ($artists as $artist) {
        if(!file_exists('images/art/artists/square-medium/'.$artist['ArtistID'].'.jpg')){
            $imageFile = 'images/art/artists/square-medium/141.jpg';
        }
        else{
            $imageFile = 'images/art/artists/square-medium/'.$artist['ArtistID'].'.jpg';
        }
        $html .= '<div class="card ui fluid"><div class="image">';
        $html .= '<img src="' . $imageFile . '"></div><div class="content">';
        $html .= '<a class="header" href="single-artist.php?id=' . $artist['ArtistID'] . '">' . getArtistName($artist['ArtistID']) . '</a></div></div>';
    }
    return $html;
}
function getArtistName($id){
    if(!isset($id) && empty($id) || isValidArtistID($id) == DEFAULT_ARTIST){
        $id = DEFAULT_ARTIST;
    }
    $artist = query("SELECT CONCAT_WS(' ', FirstName, LastName) as 'Name' FROM Artists WHERE ArtistID = :id", Array(':id'=>$id));
    return $artist[0]['Name'];
}
function isValidArtistID($id){
    $exists = query("SELECT ArtistID FROM Artists WHERE ArtistID = :id", Array(':id'=>$id));
    if (!empty($exists[0])){

        return $id;
    }
    else{
        return DEFAULT_ARTIST;
    }
}






//browse-genres

function getPaintingsGenre($id){
    if(!isset($id) && empty($id) || isValidGenreID($id) == DEFAULT_GENRE){
        $id = DEFAULT_GENRE;
    }
    $paintings = query("SELECT PAINTINGID, ImageFileName From PAINTINGS JOIN PAINTINGGENRES USING(PAINTINGID) JOIN GENRES USING(GenreID) WHERE GenreID = :genreID;", Array(':genreID'=>$id));
    $html .= '<div class="ui grid">';
    foreach ($paintings as $painting) {
        $html .= '<div class="single-padding"><a href="single-painting.php?id=' . $painting['PAINTINGID'] . '"><img src="images/art/works/square-medium/' . $painting['ImageFileName'] . '.jpg" alt=""/></a></div>';
    }
    $html .= '</div>';
    return $html;
}
function getPaintingsArtist($id){
    if(!isset($id) && empty($id) || isValidArtistID($id) == DEFAULT_ARTIST){
        $id = DEFAULT_ARTIST;
    }
    $paintings = query("SELECT PAINTINGID, ImageFileName From PAINTINGS JOIN ARTISTS USING(ARTISTID) WHERE ArtistID = :artistID ORDER BY YearOfWork;", Array(':artistID'=>$id));
    $html .= '<div class="ui three cards">';
    foreach ($paintings as $painting) {
        $html .= '
        <div class="card">
        <div class="image">
        <a href="single-painting.php?id=' . $painting['PAINTINGID'] . '">
        <img src="images/art/works/square-medium/' . $painting['ImageFileName'] . '.jpg">
        </a>
        </div>
        </div>
        ';
    }
    $html .= '</div>';
    return $html;
}
function getGenreName($id){
    if(!isset($id) && empty($id) || isValidGenreID($id) == DEFAULT_GENRE){
        $id = DEFAULT_GENRE;
    }
    $genre = query("SELECT GenreName FROM Genres WHERE GenreID = :id", Array(':id'=>$id));
    return $genre[0]['GenreName'];
}
function getGenreDescription($id){
    if(!isset($id) && empty($id) || isValidGenreID($id) == DEFAULT_GENRE){
        $id = DEFAULT_GENRE;
    }
    $genre = query("SELECT Description FROM Genres WHERE GenreID = :id", Array(':id'=>$id));
    return $genre[0]['Description'];
}
function isValidGenreID($id){
    $exists = query("SELECT GenreID FROM Genres WHERE GenreID = :id", Array(':id'=>$id));
    if (!empty($exists[0])){

        return $id;
    }
    else{
        return DEFAULT_GENRE;
    }
}





//single genre
function getAllArtistInfo($id){
    if(!isset($id) && empty($id) || isValidArtistID($id) == DEFAULT_ARTIST){
        $id = DEFAULT_ARTIST;
    }
    $artist = query("SELECT ArtistID, CONCAT_WS(' ', FirstName, LastName) as 'Name', Nationality, Gender, YearOfBirth, YearOfDeath, Details, ArtistLink FROM Artists WHERE ArtistID = :id",Array(':id'=>$id))[0];
    return $artist;
}

function buildGenreCards(){
    $genres = query("SELECT GenreID FROM Genres");
    foreach ($genres as $genre) {
        $html .= '<div class="card ui fluid">
        <div class="image">
        <img src="images/art/genres/square-medium/' . $genre['GenreID'] . '.jpg">
        </div>
        <div class="content">
        <a class="header" href="single-genre.php?id=' . $genre['GenreID'] . '">' . getGenreName($genre['GenreID']) . '</a>
        </div>
        </div>';
    }
    return $html;
}
?>
