<?php

class HomeController extends Controller
{
	public function index()
	{
		$model = $this->model('Book');
		$books = $model->all();
		$js = 'ranting.js';

		$this->view('home', ['books' => $books, 'javascript-in-body' => $js]);
	}
}
