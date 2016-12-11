$(function(){

//var subtotal = parseInt($('#subtotal').html().substring(1));

var shippingTotal = 0;

$('#shipping').on('change', function() {
  if (subtotal < 1500 && this.value == 'standard') {
shippingTotal = 25;
} else if (subtotal < 2500 && this.value == 'standard' || subtotal >= 2500) {
shippingTotal = 0;
} else {
shippingTotal = 50;
}

$('#shippingTotal').html('$' + shippingTotal.toFixed(2));

updateTotal();

});



$('.glass').on('focusin', function(){
    previous = $(this).val();
	//alert(previous);
});


$('.glass').on('change', function () {

var currentPrice = $.trim($(this).closest('tr').find('.price').html()).substring(1);
console.log(previous);//works but [none] needs to be fixed like the if below.

currentPrice = parseInt(currentPrice);
//currentGlassPrice = parseInt(currentGlassPrice);


$(this).prop('selected', true);

var price = $(this).val();
if (isNaN(price)) {
price = 0;
}

subtotal = subtotal + parseInt(price);

//$('.price').html('$' .toFixed(2));

updateTotal();
updateSubTotal();

//$.ajax({ // create an AJAX call...
//           data: {'matt': $('#matt').find(":selected").text(),
//				  'image': $('#picture').val()}, // serialize the form
//          type: 'GET', // GET or POST from the form
//           url: 'includes/CartAjax.php', // the file to call from the form
//           success: function(data) { // on success..
//              alert(data); // update the DIV
//          },
//		   error: function() {
//		   alert('gu');
//		   }
//       });
//    });
});

function updateTotal() {
$('#total').html('$' + (subtotal + shippingTotal).toFixed(2));
}
//Javascript for the browsepaintings section
function updateSubTotal() {
$('#subtotal').html('$' + (subtotal).toFixed(2));
}


});
