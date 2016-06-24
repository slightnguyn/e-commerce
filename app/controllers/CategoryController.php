<?php

class CategoryController extends Controller
{
	public function show($slug)
	{
		$modelCat = $this->model('Category');
		$model = $this->model('Book');
		$books = $model->getBooksByCategory($modelCat->first('slug', $slug)->id);

		$this->view('category/index', ['books' => $books]);
	}
}
