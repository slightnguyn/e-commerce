<?php

set_include_path(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT'));
date_default_timezone_set('Asia/Ho_Chi_Minh');
define('ENV', 'local');

function myHandleError($errNum, $errMgs, $file, $line, $args) {
	echo '<h2 style="color: #d9534f;">Please fix the errors following:</h2>';
	echo '<h3><strong>Error message:</strong> ' . $errMgs . '</h3>';
	echo '<p><strong>Error num:</strong> ' . $errNum . '</p>';
	echo '<p><strong>Error in file:</strong> ' . $file . '</p>';
	echo '<p><strong>Error in line:</strong> ' . $line . '</p>';
	echo '<strong>Arguments: </strong><pre>' . print_r($args, true) . '</pre>';
}

if (ENV == 'local') {
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	set_error_handler('myHandleError');
}
else {
	ini_set('display_errors', 0);
}

require 'app/helpers/function.php';
require 'app/core/App.php';
require 'app/core/Controller.php';
require 'app/core/DB.php';
