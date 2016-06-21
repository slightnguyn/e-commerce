<?php

class DB 
{
	protected static $dsn = 'mysql:host=localhost;dbname=e_commerce';
	protected static $username = 'root';
	protected static $password = '';
	protected static $db = NULL;
	protected static $options = [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
	];

	public static function connect()
	{
		if (self::$db === NULL) {
			self::$db = new PDO(self::$dsn, self::$username, self::$password, self::$options);
		}

		return self::$db;
	}

	public static function disconnect()
	{
		self::$db = NULL;
		return true;
	}
}
