
$(document).ready(function (  ) {
	$(".filter-open").hide();
	$('.filter-btn').click(function ( e ) {
		$(this).hide();
		$(".filter-open").fadeToggle('slow');
	});
	$('.filter .btn-close').click(function ( e ) {
		$(".filter-open").hide();
		$('.filter-btn').show();
	});
	$("#ex2").slider({});
	var page_width = $(document).width();
	if (page_width < 993){
		$('#more-title-js').click(function() {
			$('#more-text-js').slideToggle();
			$(this).toggleClass('active')
		});
		$('#characteristics-title-js').click(function() {
			$('#characteristics-text-js').slideToggle();
			$(this).toggleClass('active')
		});
	};








	buyElementButton = '[data-role=cart-buy-button]';

	$(document).on('click', buyElementButton, function (e) {

		e.preventDefault();

		//alert(pistol88.cart);
		var self = this,
			url = jQuery(self).data('url'),
			itemModelName = jQuery(self).data('model'),
			itemId = jQuery(self).data('id'),
			itemCount = jQuery(self).data('count'),
			itemPrice = jQuery(self).data('price'),
			itemOptions = jQuery(self).data('options');

		// pistol88.cart.addElement(itemModelName, itemId, itemCount, itemPrice, itemOptions, url);

		return false;
	});






});









