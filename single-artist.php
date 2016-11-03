<?php include('header.php'); include('functions.php'); $artist = getAllArtistInfo($_GET['id']) ?>
<div class="ui segment grey100">
    <div class="ui doubling stackable grid container">
        <div class="nine wide column">
            <img src= <?php echo '"images/art/artists/medium/' . isValidArtistID($_GET['id']) .'.jpg" ' ?> alt="" class="ui big image" id='artwork'/>
        </div>
        <div class="seven wide column">
            <div class="item">
                <h2 class="header"><?php echo $artist['Name']; ?></h2>
                <div class="ui segment">
                    <p><?php echo $artist['Details']; ?></p>
                </div>
                <div class="ui bottom attached segment">
                    <table class="ui definition very basic collapsing celled table">
                        <tbody>
                            <tr>
                                <td>
                                    Nationality
                                </td>
                                <td>
                                    <?php echo $artist['Nationality']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Gender
                                </td>
                                <td>
                                    <?php echo $artist['Gender']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Year of Birth
                                </td>
                                <td>
                                    <?php echo $artist['YearOfBirth']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Year of Death
                                </td>
                                <td>
                                    <?php echo $artist['YearOfDeath']; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <a href=<?php echo $artist['ArtistLink']; ?>>
                <button class="ui labeled icon orange button">
                    <i class="info icon"></i>
                    Learn More
                </button>
            </a>
            </div>
            <h2>Paintings</h2>
                <?php echo getPaintingsArtist($_GET['id']) ?>
        </div>
    </div>
</div>
