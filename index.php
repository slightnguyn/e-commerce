<?php

if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

require 'app/init.php';

$app = new App();