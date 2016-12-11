$(function(){


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
            //preview.prepend(image);

            //$('body').prepend(preview);
            //$("#preview").fadeIn(1000);
        });
        //$('.image').on("mouseleave", function(e){
        //    $("#preview")
        //    .css("top", (e.pageY - 10) + "px")
        //    .css("left", (e.pageX + 10) + "px");
        //});
        $('.hoverimage').on("mouseleave", function(e){
            $("#preview").remove();

        });
    };

    //This is a base URL for the AJAX query
    var urlBase = 'service-painting.php';

    //Paramters
    var params = {artist:'', museum:'', shape:'', name:''};

    buildPaintingCard = function(painting){

        var card = '<form class="ui form"><div class="ui two column stackable grid container"><div class="four wide column"><a href="single-painting.php?id=' + painting.PaintingID + '"><img src="images/art/works/square-medium/' + painting.ImageFileName + '.jpg" alt="..." class="image hoverimage"  ></a></div><div class="twelve wide column"><h3 class="ui header"><div class="content">' + painting.Title + '<a href="single-artist.php?id=' + painting.ArtistID + '"><div class="sub header">' + (painting.LastName !== null ? painting.LastName:'') + '</a></div></div></h3><p>' + (painting.Description !== null ? painting.Description:'') + '</p><p><input type="hidden" name="ID" value=' + painting.PaintingID + '><input type="hidden" name="image" value="' + painting.ImageFileName + '">$' + painting.MSRP.split(".")[0] + '</p>' + '<button class="ui icon orange submit button" formaction="includes/addToCart.php?ID=' + painting.PaintingID + '&image=' + painting.ImageFileName + '"><i class="add to cart icon"></i><button class="ui icon orange submit button" formaction="includes/addToFavorites.php?ID=' + painting.PaintingID + '&image=' + painting.ImageFileName + '"><i class="heart icon"></i></button></div></div></div>';


        $('#PaintingList').prepend(card);
        //imageHover();
    };

    getPaintingsBy = function(params)
    {
        var data = $.ajax({
            url:urlBase,
            data:params,
            dataType:"json"
        }
    )
    .success(function(result){
        console.log(result);
        $(document).ready(function(){
            var data = result;

            $.each(data, function(i, item){

                $('PaintingList').empty();
                buildPaintingCard(data[i]);
                //console.log(data[i]);
            });
            imageHover();
        });
        //imageHover();

    })
    .fail(function(){



    })
    .always(function(){



    });
};

//Initial call on page refresh
getPaintingsBy(params);

resetParams = function(){
    params = {artist:'', museum:'', shape:'', name:''};

};
//Event handlers for options


$('#frame[name=artist]').on('change', function(){

    resetParams();
    params.artist = $(this).val();

    var height = $('#PaintingList').height();
    $('#PaintingList').transition('slide left');
    $('#paintLoader').addClass('active');
    $('#PaintingList').parent().css('height', height);
    //$('PaintingLoader').addClass('active');
    setTimeout(
        function(){
            $('#PaintingList').parent().css('height', 'auto');
            $('#PaintingList').empty();
            $('#searchParam').text('Artist: ' + $('#frame[name=artist]').find(':selected').text() + ' [TOP 20]');
            getPaintingsBy(params);
            $('#paintLoader').removeClass('active');
            $('#PaintingList').transition('slide left');
            //$('PaintingLoader').removeClass('active');
            $("select#frame[name=shape], select#frame[name=museum]").prop('selectedIndex', 0);
        }, 1000);



    });

    $('#frame[name=museum]').on('change', function(){

        resetParams();
        params.museum = $(this).val();
        var height = $('#PaintingList').height();
        $('#PaintingList').transition('slide left');
        $('#paintLoader').addClass('active');
        $('#PaintingList').parent().css('height', height);
        //$('PaintingLoader').addClass('active');
        setTimeout(
            function(){
                $('#PaintingList').parent().css('height', 'auto');
                $('#PaintingList').empty();
                $('#searchParam').text('Museum: ' + $('#frame[name=museum]').find(':selected').text() + ' [TOP 20]');
                getPaintingsBy(params);
                $('#paintLoader').removeClass('active');
                $('#PaintingList').transition('slide left');
                //$('PaintingLoader').removeClass('active');
                $("select#frame[name=shape], select#frame[name=artist]").prop('selectedIndex', 0);
            }, 1000);

        });

        $('#frame[name=shape]').on('change', function(){

            resetParams();
            params.shape = $(this).val();
            var height = $('#PaintingList').height();
            $('#PaintingList').transition('slide left');
            $('#paintLoader').addClass('active');
            $('#PaintingList').parent().css('height', height);
            //$('PaintingLoader').addClass('active');
            setTimeout(
                function(){
                    $('#PaintingList').parent().css('height', 'auto');
                    $('#PaintingList').empty();
                    $('#searchParam').text('Shape: ' + $('#frame[name=shape]').find(':selected').text() + ' [TOP 20]');
                    getPaintingsBy(params);
                    $('#paintLoader').removeClass('active');
                    $('#PaintingList').transition('slide left');
                    //$('PaintingLoader').removeClass('active');
                    $("select#frame[name=museum], select#frame[name=artist]").prop('selectedIndex', 0);
                }, 1000);

            });


        });
