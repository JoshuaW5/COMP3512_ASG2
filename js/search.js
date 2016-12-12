$(function(){    //-----------------------------------------------------------------------------------------
    //         SEMANTIC UI SMART SEARCH
    //-----------------------------------------------------------------------------------------
    $('.ui.search').search({//autocomplete({
        silent: true,
        apiSettings: {
            action:'search',
            type:'category',
            dataType: 'json',
            //BASE URL
            url: 'service-painting.php/?search={query}',
            onResponse: function (painting) {
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
                    response.results[title].resultsl.push({
                        title: item.Title,
                    });
                });
                return response;
            }
        }
    });
});
