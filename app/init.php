<?php

set_include_path(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT'));
date_default_timezone_set('Asia/Ho_Chi_Minh');
define('ENV', 'local');

if (ENV == 'local') {
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
}
else {
	ini_set('display_errors', 0);
}

require 'app/helpers/function.php';
require 'app/core/App.php';
require 'app/core/Controller.php';
require 'app/core/DB.php';
