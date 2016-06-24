<?php

// include base model
require_once 'app/core/Model.php';

class User extends Model
{
	public $table = 'customers';
	public $primaryKey = 'id';

	public function getUserByUsername($username)
	{
		$db = DB::connect();
		$stmt = $db->prepare("SELECT * FROM {$this->table} WHERE username = :username");
		$stmt->bindParam(':username', $username, PDO::PARAM_STR);
		$stmt->execute();

		return $stmt->fetch();
	}
}
