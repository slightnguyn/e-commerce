<?php

// include base model
require_once 'app/core/Model.php';

class Book extends Model
{
	protected $table = 'books';

	public function getBooksByCategory($id)
	{
		$db = DB::connect();
		$stmt = $db->prepare("SELECT * FROM {$this->table} WHERE category_id = :id");
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetchAll();
	}
}
