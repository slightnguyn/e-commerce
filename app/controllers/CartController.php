<?php

class CartController extends Controller
{
	public function index()
	{
		$this->view('cart/index', ['javascript-in-body' => 'cart-change.js']);
	}

	public function add()
	{
		if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') == 'POST') {
			$bookId = filter_input(INPUT_POST, 'bookId', FILTER_VALIDATE_INT);

			if (! isset($_SESSION['cart'])) {
				$_SESSION['cart'] = [];
				$_SESSION['items'] = 0;
				$_SESSION['totalPrice'] = 0.0;
			}
			
			if (isset($_SESSION['cart'][$bookId])) {
				$_SESSION['cart'][$bookId]++;
			}
			else {
				$_SESSION['cart'][$bookId] = 1;
			}

			$_SESSION['totalPrice'] = $this->calculatePrice($_SESSION['cart']);
			$_SESSION['items'] = $this->calculateItems($_SESSION['cart']);
		}
		else {
			handleError();
		}
	}

	private function calculatePrice($cart)
	{
		$price = 0.0;

		if (is_array($cart)) {
			$model = $this->model('Book');
			
			foreach ($cart as $id => $qty) {
				$book = $model->find($id, 'price');
				$price += $book->price * $qty;
			}
		}

		return $price;
	}

	private function calculateItems($cart)
	{
		$items = 0;

		if (is_array($cart)) {
			foreach ($cart as $qty) {
				$items += $qty;
			}
		}

		return $items;
	}
}
