<?php

class RateController extends Controller
{
	public function rate()
	{
		$bookId = filter_input(INPUT_POST, 'bookId', FILTER_VALIDATE_INT);
		$star = filter_input(INPUT_POST, 'star', FILTER_VALIDATE_INT);

		if ($bookId === NULL || $star === NULL || $star < 0) {
			echo json_encode(['success' => false]);
		}

		$model = $this->model('Rate');
		$rate = $model->find($bookId);

		if (count($rate)) {
			$model->update([
				'times' => $rate->times + 1,
				'average' => ($rate->average * $rate->times + $star) / ($rate->times + 1)
			], $bookId);
			echo json_encode(['success' => true]);
		}
		else {
			json_encode(['success' => false]);
		}
	}
}
