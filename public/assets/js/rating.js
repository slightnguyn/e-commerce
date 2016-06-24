$(".rating a").on("click", function (evt) {
	evt.preventDefault();

	$(this).find("i").removeClass("fa-star-o").addClass("fa-star");
	$(this).prevAll().find("i").removeClass("fa-star-o").addClass("fa-star");
	$(this).nextAll().find("i").removeClass("fa-star").addClass("fa-star-o");

	$(this).parent().data("star", $(this).data("star"));
	$('.rating-action a').removeClass("my-hidden");
});

$(".rating-action a.confirm").on("click", function (evt) {
	evt.preventDefault();

	var star = $(this).parent().prev().data("star");
	var bookId = $(this).parent().prev().data("id");

	$.ajax({
		url: '/rate/rate',
		dataType: 'json',
		method: 'POST',
		data: {
			star: star,
			bookId: bookId
		}
	})
	.success(function (response) {
		$('#rating-title').addClass('text-success').html('Your rating has been saved.').fadeIn(700);
		setTimeout(function () {
			$('#rating').fadeOut(700);
		}, 1500);
	})
	.fail(function (xhr, status, error) {
		console.log(xhr.responseText);
	});
});
