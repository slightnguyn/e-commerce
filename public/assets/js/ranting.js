$(".ranting a").on("click", function (evt) {
	evt.preventDefault();

	$(this).find("i").removeClass("fa-star-o").addClass("fa-star");
	$(this).prevAll().find("i").removeClass("fa-star-o").addClass("fa-star");
	$(this).nextAll().find("i").removeClass("fa-star").addClass("fa-star-o");

	$(this).parent().data("star", $(this).data("star"));

	$(this).parent().next().removeClass("my-hidden");
});

$(".ranting-action a.confirm").on("click", function (evt) {
	evt.preventDefault();

	var star = $(this).parent().prev().data("star");
	var bookId = $(this).parent().prev().data("id");

	
});
