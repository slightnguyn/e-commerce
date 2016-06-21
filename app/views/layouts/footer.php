	</main>
	
	<script src="<?php echo App::APP_URL . '/public/assets/js/jquery-2.2.3.min.js'; ?>"></script>
	<script src="<?php echo App::APP_URL . '/public/assets/js/bootstrap.min.js'; ?>"></script>

	<?php if (isset($data['javascript-in-body'])) : ?>
		<script src="<?php echo App::APP_URL . '/public/assets/js/' . $data['javascript-in-body']; ?>"></script>
	<?php endif; ?>
</body>
</html>
