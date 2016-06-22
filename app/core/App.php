<?php

class App
{
	const APP_URL = 'http://localhost/';
	const BOOK_PATH = self::APP_URL . 'public/upload/';
	public $uri = NULL;
	public $controller = 'HomeController';
	public $method = 'index';
	public $params = [];

	public function __construct()
	{
		$this->uri = filter_input(INPUT_GET, 'q', FILTER_SANITIZE_STRING);
		$this->parseUrl();
	}

	public function parseUrl()
	{
		// if url has parameter, so we analyze it
		if ($this->uri !== NULL) {
			$uriCleaned = rtrim($this->uri, '/');
			$pieces = explode('/', $uriCleaned);

			// Determine controller
			if (isset($pieces[0])) {
				$this->controller = ucfirst(strtolower($pieces[0])) . 'Controller';
				unset($pieces[0]);
			}

			// Determine method
			if (isset($pieces[1])) {
				$this->method = strtolower($pieces[1]);
				unset($pieces[1]);
			}

			// Determine parameters
			$this->params = array_values($pieces);
		}

		$controllerPath = __DIR__ . '/../controllers/' . $this->controller . '.php';
		if (file_exists($controllerPath)) {
			require $controllerPath;
			$this->controller = new $this->controller();
		}
		else {
			handleError();
		}

		if (! is_callable([$this->controller, $this->method])) {
			handleError();
		}
		
		// run app
		call_user_func_array([$this->controller, $this->method], $this->params);
	}
}
