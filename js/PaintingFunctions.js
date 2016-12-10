$(function(){



        var urlBase = 'service-painting.php';
        var params = {artist:'', museum:'', shape:'', name:''};

        buildPaintingCard = function(painting){


            //console.log(sessionValue);

            var card = '<form class="ui form"><div class="ui two column stackable grid container"><div class="four wide column"><a href="single-painting.php?id=' + painting.PaintingID + '"><img src="images/art/works/square-medium/' + painting.ImageFileName + '.jpg" alt="..." class="image" ></a></div><div class="twelve wide column"><h3 class="ui header"><div class="content">' + painting.Title + '<a href="single-artist.php?id=' + painting.ArtistID + '"><div class="sub header">' + (painting.LastName !== null ? painting.LastName:'') + '</a></div></div></h3><p>' + (painting.Description !== null ? painting.Description:'') + '</p><p><input type="hidden" name="ID" value=' + painting.PaintingID + '><input type="hidden" name="image" value="' + painting.ImageFileName + '>$' + painting.MSRP + '</p>' + '<div id="#pID"></div></div></div>';
            //console.log(painting);
            $('#PaintingList').append(card);

        };

        getPaintingsBy = function(params)
        {
            var data = $.ajax({
                url:urlBase,
                data:params,
                dataType:"json"
            }
        )
        .done(function(result){
            var data = JSON.parse(result);
            $.each(data, function(i, item){

                buildPaintingCard(data[i]);
                //console.log(data[i]);
            });
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
        $('#PaintingList').empty();
        getPaintingsBy(params);
        $("select#frame[name=museum], select#frame[name=shape]").prop('selectedIndex', 0);

    });

    $('#frame[name=museum]').on('change', function(){

        resetParams();
        params.museum = $(this).val();
        $('#PaintingList').empty();
        getPaintingsBy(params);
        $("select#frame[name=shape], select#frame[name=artist]").prop('selectedIndex', 0);

    });

    $('#frame[name=shape]').on('change', function(){

        resetParams();
        params.shape = $(this).val();
        $('#PaintingList').empty();
        getPaintingsBy(params);
        $("select#frame[name=museum], select#frame[name=artist]").prop('selectedIndex', 0);

    });

});
