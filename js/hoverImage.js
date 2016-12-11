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
    imageHover();
});
