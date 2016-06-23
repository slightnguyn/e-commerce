$('.qty').on('change', function (evt) {
	var newQty = parseFloat($(this).val());

	if (newQty < 0) return;

	var total = 0;
	var items = 0;
	var price;
	var qty;
	$('.cart-item').each(function (index) {
		price = parseFloat($(this).find('.item-price').html());
		qty = parseFloat($(this).find('.qty').val());
		
		$(this).find('.item-total').html((price * qty).toFixed(2));
		items += qty;
		total += price * qty;
	});

	$('.items').html(items);
	$('#totalPrice').html('$' + total.toFixed(2));
});
