<?php

class BookController extends Controller
{
	public function index()
	{
		$model = $this->model('Book');
		$books = $model->all();

		$this->view('home', $books);
	}

	public function show($slug)
	{
		$model = $this->model('Book');
		$book = $model->first('slug', $slug);

		$this->view('book/show', ['book' => $book]);
	}
}
