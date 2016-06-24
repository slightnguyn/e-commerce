<?php

function handleError($file = NULL) {
	if (ENV !== 'local') {
		if ($file !== NULL && file_exists($file)) {
			include $file;
		}
		else {
			include 'app/views/errors/error.php';
		}
		exit();
	}
}

function renderRating($star) {
	for ($i = 1; $i <= $star; $i++) {
		echo '<span class="text-info"><i class="fa fa-star"';
		echo ($i == $star) ? 'data-toggle="tooltip" data-placement="top" title="' . titleForStar($i) . '"' : '';
		echo '></i></span>';
	}

	for ($i = $star + 1; $i <= 5; $i++) {
		echo '<span class="text-info"><i class="fa fa-star-o"></i></span>';
	}
}

function titleForStar($num) {
	switch ($num) {
		case 1:
			return 'Very bad';
			break;
		case 2:
			return 'Bad';
			break;
		case 3:
			return 'Normal';
			break;
		case 4:
			return 'Good';
			break;
		case 5:
			return 'Very good';
			break;
		default:
			return 'Error!';
			break;
	}
}
