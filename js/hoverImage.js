$(function(){

    //-----------------------------------------------------------------------------------------
    //         THUMBNAIL IMAGE HOVER EVENT
    //-----------------------------------------------------------------------------------------
    var imageHover = function(){
        $('.hoverimage').mouseover(function(e){
            console.log('this');
            var src = $(this).attr('src');
            var newSrc = src.replace("square-medium", "medium");
            var preview = $('<div id="preview"></div>').css({"display":"block","position":"fixed"});
            var image = '<img src="' + newSrc + '">';
            $("body").append("<div id='preview'>" + image + "</div>");
            $('#preview')
            .css("top", (e.pageY - 10) + "px")
            .css("left", (e.pageX + 30) + "px")
            .css("position", "absolute")
            .fadeIn("fast");
        });
        $('.hoverimage').on("mouseleave", function(e){
            $("#preview").remove();
        });
    };
    imageHover();
});
