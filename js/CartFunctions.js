$(document).ready(function() { 

var subtotal = parseInt(($('#subtotal').html()).substring(1));

var shippingTotal = 0;

//Logic for shipping options
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

})

//Changing glass selection
$('.glass').on('focus', function(){
    previous = $(this).val();
console.log(previous);
});

$('.glass').on('change', function () {

previous = parseInt(previous);
var currentPrice = $.trim($(this).closest('tr').find('.price').html()).substring(1);

$(this).prop('selected', true)

var price = $(this).val();
if (isNaN(price)) {
price = 0;
} else if (isNaN(parseInt(previous))) {
previous = 0;
}

console.log(currentPrice);
console.log(previous);
var currentPrice = $.trim($(this).closest('tr').find('.price').html()).substring(1) - parseInt(previous);

console.log(previous);
subtotal = subtotal - parseInt(previous) + parseInt(price);

$(this).closest('tr').find('.price').html('$' + (currentPrice + parseInt(price)).toFixed(2));
$(this).blur(); //Lose focus
updateTotal();
updateSubTotal();

var paintingId = $(this).closest('tr').find('.paintingid').val();

$.ajax({ // create an AJAX call to update server cart...
           data: {'glass': $.trim($(this).find(":selected").html()),
				  'image': paintingId}, // serialize the form
           type: 'GET',
           url: 'includes/CartAjax.php', // the file to call from the form
           success: function(data) { // on success..
         },
		   error: function (xhr, ajaxOptions, thrownError ) {
		   alert(xhr.status);
        alert(thrownError);
        alert(xhr.responseText);
		   }
       });

})

//Changing Frame selection
$('.frame').on('focus', function(){
    previous = $(this).val();
console.log(previous);
});

$('.frame').on('change', function () {

previous = parseInt(previous);
var currentPrice = $.trim($(this).closest('tr').find('.price').html()).substring(1);

$(this).prop('selected', true)

var price = $(this).val();
if (isNaN(price)) {
price = 0;
} else if (isNaN(parseInt(previous))) {
previous = 0;
}

console.log(currentPrice);
console.log(previous);
var currentPrice = $.trim($(this).closest('tr').find('.price').html()).substring(1) - parseInt(previous);

console.log(previous);
subtotal = subtotal - parseInt(previous) + parseInt(price);

$(this).closest('tr').find('.price').html('$' + (currentPrice + parseInt(price)).toFixed(2));
$(this).blur(); //Lose focus
updateTotal();
updateSubTotal();

var paintingId = $(this).closest('tr').find('.paintingid').val();

$.ajax({ // create an AJAX call...
           data: {'frame': $.trim($(this).find(":selected").html()),
				  'image': paintingId}, // serialize the form
           type: 'GET',
           url: 'includes/CartAjax.php', // the file to call from the form
           success: function(data) { // on success..
         },
		   error: function (xhr, ajaxOptions, thrownError ) {
		   alert(xhr.status);
        alert(thrownError);
        alert(xhr.responseText);
		   }
       });


})

//Changing Matt selection
$('.matt').on('focus', function(){
    previous = $(this).val();
console.log(previous);
});

$('.matt').on('change', function () {

previous = parseInt(previous);
var currentPrice = $.trim($(this).closest('tr').find('.price').html()).substring(1);

$(this).prop('selected', true)

var price = $(this).val();
if (isNaN(price)) {
price = 0;
} else if (isNaN(parseInt(previous))) {
previous = 0;
}

var currentPrice = $.trim($(this).closest('tr').find('.price').html()).substring(1) - parseInt(previous);

console.log(previous);
subtotal = subtotal - parseInt(previous) + parseInt(price);

$(this).closest('tr').find('.price').html('$' + (parseInt(currentPrice) + parseInt(price)).toFixed(2));
$(this).blur(); //Lose focus
updateTotal();
updateSubTotal();

var paintingId = $(this).closest('tr').find('.paintingid').val();

$.ajax({ // create an AJAX call...
           data: {'matt': $.trim($(this).find(":selected").html()),
				  'image': paintingId}, // serialize the form
           type: 'GET',
           url: 'includes/CartAjax.php', // the file to call from the form
           success: function(data) { // on success..
         },
		   error: function (xhr, ajaxOptions, thrownError ) {
		   alert(xhr.status);
        alert(thrownError);
        alert(xhr.responseText);
		   }
       });

})

//Changing painting qty
$('.qty').on('focus', function(){
previous = $(this).val();
console.log(previous);
});

$('.qty').on('change', function (e) {
e.preventDefault();
previous = parseInt(previous);

$(this).prop('selected', true)

var qty = $(this).val();
if (isNaN(qty)) {
price = 0;
} else if (parseInt(previous) <= 0) {
previous = 0;
}

var currentPrice = ($.trim($(this).closest('tr').find('.price').html()).substring(1));


subtotal = subtotal - parseInt(currentPrice);
currentPrice = (parseInt(currentPrice) / parseInt(previous)) * parseInt(qty);
subtotal = subtotal + parseInt(currentPrice);


$(this).closest('tr').find('.price').html('$' + parseInt(currentPrice).toFixed(2));
$(this).blur(); //Lose focus
updateTotal();
updateSubTotal();

alert($.trim($(this).val()))

var paintingId = $(this).closest('tr').find('.paintingid').val();


$.ajax({ // create an AJAX call...
           data: {'qty': $.trim($(this).val()),
				  'image': paintingId}, // serialize the form
           type: 'GET',
           url: 'includes/CartAjax.php', // the file to call from the form
           success: function(data) { // on success..
         },
		   error: function (xhr, ajaxOptions, thrownError ) {
		   alert(xhr.status);
        alert(thrownError);
        alert(xhr.responseText);
		   }
       });

	   if ($(this).val() <= 0) {
	$(this).closest('tbody').remove();
}
	   updateShipping();
});

function updateShipping() {
if (subtotal < 1500 && $('#shipping').value == 'standard') {
shippingTotal = 25;
} else if (subtotal < 2500 && $('#shipping').value == 'standard' || subtotal >= 2500) {
shippingTotal = 0;
} else {
shippingTotal = 50;
}

$('#shippingTotal').html('$' + shippingTotal.toFixed(2));

updateTotal();

}

function updateTotal() {
$('#total').html('$' + (subtotal + shippingTotal).toFixed(2));
}

function updateSubTotal() {
$('#subtotal').html('$' + (subtotal).toFixed(2));
}


});
