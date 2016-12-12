$(function(){


    //-----------------------------------------------------------------------------------------
    //         MOUSE HOVER EVENT FOR THE AJAX LOADED IMAGE THUMBNAILS
    //-----------------------------------------------------------------------------------------
    var imageHover = function(){
        $('.hoverimage').mouseover(function(e){
            console.log('this');
            var src = $(this).attr('src');
            var newSrc = src.replace("square-medium", "medium");
            var preview = $('<div id="preview"></div>').css({"display":"block","position":"fixed"});
            var image = '<img src="' + newSrc + '">';
            $("body").append("<p id='preview'>" + image + "</p>");
            $('#preview')
            .css("top", (e.pageY - 10) + "px")
            .css("left", (e.pageX + 30) + "px")
            //.css("display", "none")
            .css("position", "absolute")
            .fadeIn("fast");
        });
        $('.hoverimage').on("mouseleave", function(e){
            $("#preview").remove();
        });
    };

    //This is a base URL for the AJAX query
    var urlBase = 'service-painting.php';

    //Paramters BY DEFAULT
    var params = {artist:'', museum:'', shape:'', name:''};

    //-----------------------------------------------------------------------------------------
    //         BUILD A SINGLE CARD FROM A JAVASCRIT OBJECT
    //-----------------------------------------------------------------------------------------
    buildPaintingCard = function(painting){

        var card = '<form class="ui form"><div class="ui two column stackable grid container"><div class="four wide column"><a href="single-painting.php?id=' + painting.PaintingID + '"><img src="images/art/works/square-medium/' + painting.ImageFileName + '.jpg" alt="..." class="image hoverimage"  ></a></div><div class="twelve wide column"><h3 class="ui header"><div class="content">' + painting.Title + '<a href="single-artist.php?id=' + painting.ArtistID + '"><div class="sub header">' + (painting.LastName !== null ? painting.LastName:'') + '</a></div></div></h3><p>' + (painting.Description !== null ? painting.Description:'') + '</p><p><input type="hidden" name="ID" value=' + painting.PaintingID + '><input type="hidden" name="image" value="' + painting.ImageFileName + '">$' + painting.MSRP.split(".")[0] + '</p>' + '<button class="ui icon orange submit button" formaction="includes/addToCart.php?ID=' + painting.PaintingID + '&image=' + painting.ImageFileName + '"><i class="add to cart icon"></i><button class="ui icon orange submit button" formaction="includes/addToFavorites.php?ID=' + painting.PaintingID + '&image=' + painting.ImageFileName + '"><i class="heart icon"></i></button></div></div></div>';


        $('#PaintingList').prepend(card);
    };



    //-----------------------------------------------------------------------------------------
    //         CALL TO THE API THROUGH AJAX
    //-----------------------------------------------------------------------------------------
    getPaintingsBy = function(params)
    {
        var data = $.ajax({
            url:urlBase,
            data:params,
            dataType:"json"
        }
    )
    .success(function(result){
        result.reverse();
//        console.log(result);
        $(document).ready(function(){
            var data = result;
            $.each(data, function(i, item){
                $('PaintingList').empty();
                buildPaintingCard(data[i]);
            });
            imageHover();
        });

    })
    .fail(function(){



    })
    .always(function(){



    });
};


//-----------------------------------------------------------------------------------------
//         ALL EVENTS THAT HAPPEN WHEN A FILTER ACTION IS EXECUTED
//-----------------------------------------------------------------------------------------
var filterChangeActions = function(filterType){


    //if more filter options are added, add the names to this list of arrays
    var filterOptions = ["artist", "museum", "shape"];

    var height = $('#PaintingList').height();
    $('#PaintingList').transition('slide left');
    $('#paintLoader').addClass('active');
    $('#PaintingList').parent().css('height', height);
    setTimeout(
        function(){
            $('#PaintingList').parent().css('height', 'auto');
            $('#PaintingList').empty();
            $('#searchParam').text('Artist: ' + $('#frame[name='+filterType+']').find(':selected').text() + ' [TOP 20]');

            getPaintingsBy(params);
            $('#paintLoader').removeClass('active');
            $('#PaintingList').transition('slide right');
            var filter;
            var index =0;

            //FIND EVERY FILTER TYPE THAT WAS NOT SELECTED
            //SO THAT THEY ARE RESET
            $.each(filterOptions, function(index, item){
                if (item !== filterType) {
                    filter[index] = item;
                    index += 1;
                }
            });
            $("select#frame[name="+filter[0]+"], select#frame[name="+filter[1]+"]").prop('selectedIndex', 0);
        }, 1000);
    };




    $('#frame[name=artist]').on('change', function(){
        params = {artist:'', museum:'', shape:'', name:''};
        params.artist = $(this).val();
        filterChangeActions("artist");

    });

    $('#frame[name=museum]').on('change', function(){
        params = {artist:'', museum:'', shape:'', name:''};
        params.museum = $(this).val();
        filterChangeActions("museum");

    });

    $('#frame[name=shape]').on('change', function(){
        params = {artist:'', museum:'', shape:'', name:''};
        params.shape = $(this).val();
        filterChangeActions("shape");





    });
    getPaintingsBy();
});
