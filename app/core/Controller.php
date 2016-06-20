<?php

class Controller
{
	public function model($model)
	{
		$file = __DIR__ . '/../models/' . $model . '.php';

		if (! file_exists($file)) {
			throw new Exception($file . ' file not found.');
		}
		require $file;

		return new $model();
	}

	public function view($view, $data = NULL)
	{
		$file = __DIR__ . '/../views/' . $view . '.php';

		if (! file_exists($file)) {
			throw new Exception($file . ' file not found!');
		}
		require $file;
	}
}
