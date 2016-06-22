<?php

class Model
{
	protected $table = '';
	protected $primaryKey = 'id';

	public function all($fields = '*')
	{
		$db = DB::connect();
		$stmt = $db->prepare("SELECT {$fields} FROM {$this->table}");
		$stmt->execute();

		return $stmt->fetchAll();
	}

	public function find($id, $fields = '*')
	{
		$db = DB::connect();
		$stmt = $db->prepare("SELECT {$fields} FROM {$this->table} WHERE {$this->primaryKey} = :id");
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetch();
	}
}

