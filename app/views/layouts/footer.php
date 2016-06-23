	</main>
	
	<div id="back-top">
		<a href="#top"><i class="fa fa-chevron-circle-up"></i></a>
	</div>

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p>Copyright &copy; 2016 by me.</p>
				</div>
			</div>
		</div>
	</footer>

	<script src="<?php echo App::APP_URL . '/public/assets/js/jquery-2.2.3.min.js'; ?>"></script>
	<script src="<?php echo App::APP_URL . '/public/assets/js/bootstrap.min.js'; ?>"></script>
	<script>
		$("[data-toggle=tooltip]").tooltip();

		$('#back-top').hide();
		$(window).scroll(function () {
			if ($(this).scrollTop() > 200) {
				$('#back-top').fadeIn(700);
			}
			else {
				$('#back-top').fadeOut(700);
			}
		});
		$('#back-top a').on('click', function (evt) {
			$('body, html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	</script>

	<?php if (isset($data['javascript-in-body'])) : ?>
		<script src="<?php echo App::APP_URL . '/public/assets/js/' . $data['javascript-in-body']; ?>"></script>
	<?php endif; ?>
</body>
</html>
