<?php

class CartController extends Controller
{
	public function index()
	{
		$this->view('cart/index');
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

			header('Location: /cart/show/' . $bookId);
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

	public function show($id)
	{
		$model = $this->model('Book');
		$book = $model->find($id);

		$this->view('/cart/show', ['book' => $book]);
	}

	public function update()
	{
		if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') == 'POST') {
			$items = filter_input(INPUT_POST, 'items', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

			if ($items === NULL || $items === false) {
				header('Location: /cart');
				return;
			}

			foreach ($items as $id => $qty) {
				if (array_key_exists($id, $_SESSION['cart'])) {
					if ($qty == 0) {
						unset($_SESSION['cart'][$id]);
					}
					else {
						$_SESSION['cart'][$id] = $qty;
					}
				}
			}

			$_SESSION['totalPrice'] = $this->calculatePrice($_SESSION['cart']);
			$_SESSION['items'] = $this->calculateItems($_SESSION['cart']);

			header('Location: /cart');
		}
		else {
			handleError();
		}
	}

	public function checkout()
	{
		if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') == 'POST') {
			$errors = [];
			$errIcon = '<i class="fa fa-times"></i> ';

			if (! isset($_SESSION['username'])) {
				$fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING);
				if ($fullname === NULL || $fullname == '') $errors['fullname'] = $errIcon . 'Please enter the fullname';

				$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
				if ($address === NULL || $address == '') $errors['address'] = $errIcon . 'Please enter the address';
			}

			$shipName = filter_input(INPUT_POST, 'ship_name', FILTER_SANITIZE_STRING);

			$shipAddress = filter_input(INPUT_POST, 'ship_address', FILTER_SANITIZE_STRING);
			if ($shipAddress === NULL || $shipAddress == '') $errors['ship_address'] = $errIcon . 'Please enter the ship address';
		
			if (count($errors)) {
				$this->view('cart/checkout', ['data' => $_POST, 'errors' => $errors]);
			}
			else {
				$modelUser = $this->model('User');

				if (! isset($_SESSION['username'])) {
					$userId = $modelUser->create([
						'fullname' => $fullname,
						'address' => $address
					]);
				}
				
				$customerId = isset($_SESSION['username']) ? $modelUser->getUserByUsername($_SESSION['username'])->id : $userId;
	
				$modelOrder = $this->model('Order');
				try {
					$orderId = $modelOrder->create([
						'customer_id' => $customerId,
						'date' => date('Y-m-d'),
						'ship_name' => isset($shipName) ? $shipName : NULL,
						'ship_address' => $shipAddress
					]);
				}
				catch (Exception $e) {
					if (isset($userId)) $modelUser->destroy($userId);
					handleError();
					exit();
				}

				$modelBook = $this->model('Book');
				$modelBookOrder = $this->model('BookOrder');
				
				foreach ($_SESSION['cart'] as $id => $qty) {
					try {
						$modelBookOrder->create([
							'order_id' => $orderId,
							'book_id' => $id,
							'book_price' => $modelBook->find($id)->price,
							'quantity' => $qty
						]);
					}
					catch (Exception $e) {
						if (isset($userId)) $modelUser->destroy($userId);
						$modelOrder->destroy($orderId);
						$modelBookOrder->destroy($orderId);
						handleError();
						exit();
					}
				}

				$this->cleanCart();

				header('Location: /cart/success');
			}
		}
		else {
			$this->view('cart/checkout');
		}
	}

	public function cleanCart()
	{
		$_SESSION['cart'] = [];
		$_SESSION['items'] = 0;
		$_SESSION['totalPrice'] = 0.00;
	}

	public function success()
	{
		$this->view('cart/success');
	}
}
