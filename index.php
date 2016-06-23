<?php

// save session on 14 days
$lifetime = 60 * 60 * 24 * 14;
session_set_cookie_params($lifetime);

if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

require 'app/init.php';

$app = new App();