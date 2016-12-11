$(document).ready(function () {

 $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });

results = "";
  
$('.ui.search').search({//autocomplete({
apiSettings: {
	action:'search',
	dataType: 'json',
	url: 'service-painting.php/?search={query}',
	onSuccess: function (response, element) {
	response = JSON.parse(response);
	console.log(response[0]);
	}
},
source: 'url'
});

});