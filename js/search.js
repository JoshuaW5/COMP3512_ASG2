$(document).ready(function () {

    // $(window).keydown(function(event){    //
    //     if(event.keyCode == 13) {    //
    //         event.preventDefault();    //
    //         return false;    //
    //     }    //
    // });
    // $('.prompt').keyup(searchListener);
    //
    // function searchListener() {
    //     $.post( {
    //         url: "service-painting.php",
    //         dataType: "json",
    //
    //         data: {
    //             search: $(this).val()
    //         },
    //         success: function (data) {
    //             var jsonData = data;
    //             var content = organizeSearchedData(jsonData);
    //         },
    //         error: function(xhr, ajaxOptions, thrownError){
    //             console.log('error');
    //             console.log(xhr.status);
    //             console.log(thrownError);
    //             //console.log(xhr.responseText);
    //         }
    //     } );
    // }
    //
    // function organizeSearchedData(data) {
    //     var len = data.length;
    //     var content = new Array(len);
    //     for (var i = 0; i < len; i++) {
    //         content[i] = {
    //             title: data[i].Title,
    //             description: data[i].LastName,
    //             url: 'single-painting.php?id=' + data[i].PaintingID
    //         };
    //     }
    //     return content;
    // }
    // $( ".prompt" ).autocomplete({    //     source: function( request, response ) {    //    //         $.ajax( {    //             url: "service-painting.php",    //             dataType: "json",    //             type: 'GET',    //             data: {    //                 name: request.term    //             },    //             success: function (data) {    //                 //console.log(data);    //                 response($.map(data, function(value, key) {    //                     console.log(value);    //                     return {    //                         key: "Title",    //                         value: value.Title    //                     };    //                 }));    //             },    //             error: function(xhr, ajaxOptions, thrownError){    //                 console.log('error');    //                 console.log(xhr.status);    //                 console.log(thrownError);    //                 console.log(xhr.responseText);    //             }    //         } );    //     },    // } );
    //$(document).ready(function () {



    // $(window).keydown(function(event){
    //
    //     if(event.keyCode == 13) {
    //
    //         //event.preventDefault();
    //
    //         return false;
    //
    //     }
    //
    // });






    $('.ui.search').search({//autocomplete({
        silent: true,
        apiSettings: {

            action:'search',
            type:'category',
            dataType: 'json',

            url: 'service-painting.php/?search={query}',

            onResponse: function (painting) {
                //console.log({results:painting});

                var response = {
                    results : {}
                };



                $.each(painting, function(index, item){
                    var title = item.Title || 'Unknown';
                    response.results[title] = {
                        title: item.Title,
                        description: (item.FirstName === null ? '':item.FirstName) + " " + item.LastName,
                        url: "single-painting.php?id=" + item.PaintingID,
                        resultsl: []
                    };

                    //console.log(results);
                    response.results[title].resultsl.push({
                        title: item.Title,

                    });



                });
                console.log(response);
                return response;


                //return {results:painting};




                // results2 = $.map(painting, function(value, key) {
                //
                //
                //     return {
                //         key: "Title",
                //         value: value.Title};
                //
                //     });
                //     console.log(results2);
                //
                //
                // }

            }

        }});


        // $('.ui.search')
        //   .search({
        //     type          : 'category',
        //     minCharacters : 3,
        //     apiSettings   : {
        //       onResponse: function(githubResponse) {
        //         var
        //           response = {
        //             results : {}
        //           }
        //         ;
        //         // translate GitHub API response to work with search
        //         $.each(githubResponse.items, function(index, item) {
        //           var
        //             language   = item.language || 'Unknown',
        //             maxResults = 8
        //           ;
        //           if(index >= maxResults) {
        //             return false;
        //           }
        //           // create new language category
        //           if(response.results[language] === undefined) {
        //             response.results[language] = {
        //               name    : language,
        //               results : []
        //             };
        //           }
        //           // add result to category
        //           response.results[language].results.push({
        //             title       : item.name,
        //             description : item.description,
        //             url         : item.html_url
        //           });
        //         });
        //         console.log(response);
        //         return response;
        //       },
        //       url: '//api.github.com/search/repositories?q={query}'
        //     }
        //   })
        // ;


        //    results = "";




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
