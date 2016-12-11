$(document).ready(function () {

    // $(window).keydown(function(event){    //
    //     if(event.keyCode == 13) {    //
    //         event.preventDefault();    //
    //         return false;    //
    //     }    //
    // });
    $('.prompt').keyup(searchListener);

    function searchListener() {
        $.post( {
            url: "service-painting.php",
            dataType: "json",

            data: {
                search: $(this).val()
            },
            success: function (data) {
                var jsonData = data;
                var content = organizeSearchedData(jsonData);

                $('.ui.search').search({
                    source: content,
                    searchFields: 'Title',
                    searchFullText: false,
                    minCharacters: 2,
                    cache: false,
                    maxResults: 20
                });
            },
            error: function(xhr, ajaxOptions, thrownError){
                console.log('error');
                console.log(xhr.status);
                console.log(thrownError);
                //console.log(xhr.responseText);
            }
        } );
    }

    function organizeSearchedData(data) {
        var len = data.length;
        var content = new Array(len);
        for (var i = 0; i < len; i++) {
            content[i] = {
                title: data[i].Title,
                description: data[i].LastName,
                url: 'single-painting.php?id=' + data[i].PaintingID
            };
        }
        return content;
    }
    // $( ".prompt" ).autocomplete({    //     source: function( request, response ) {    //    //         var temp = $.ajax( {    //             url: "service-painting.php",    //             dataType: "json",    //    //             data: {    //                 search: request.term    //             },    //             success: function (data) {    //                 var jsonData = $.parseJSON(data);    //                 console.log('this');    //                 var content = organizeSearchedData(jsonData);    //                 $('.ui.search').search({    //                     source: content,    //                     searchFields: 'Title',    //                     searchFullText: false,    //                     minCharacters: 2,    //                     cache: false,    //                     maxResults: 20    //                 });    //             },    //             error: function(xhr, ajaxOptions, thrownError){    //                 console.log('error');    //                 console.log(xhr.status);    //                 console.log(thrownError);    //                 //console.log(xhr.responseText);    //             }    //         } );    //     },    // } );    //
    //
    //
    // results = "";    //




    // var infoData = $.ajax( {
    //     url: 'service-painting.php',
    //     dataType: "json",
    //     data: {
    //         name: request.term
    //     },
    //     success: function(infoData) {
    //         console.log(infoData);
    //     },
    //     error: function (xhr, ajaxOptions, thrownError ) {
    //         alert(xhr.status);
    //         alert(thrownError);
    //         alert(xhr.responseText);
    //     }
    // });


});
