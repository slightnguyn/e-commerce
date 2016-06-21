<?php

class BookController extends Controller
{
	public function index()
	{
		$model = $this->model('Book');
		$books = $model->all();

		$this->view('home', $books);
	}
}
