<?php

// save session on 7 days
$lifetime = 60 * 60 * 24 * 7;
session_set_cookie_params($lifetime, '/');

if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

require 'app/init.php';

$app = new App();