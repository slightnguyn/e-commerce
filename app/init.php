<?php

set_include_path(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT'));
date_default_timezone_set('Asia/Ho_Chi_Minh');
ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'app/core/App.php';
require 'app/core/Controller.php';
require 'app/core/DB.php';
