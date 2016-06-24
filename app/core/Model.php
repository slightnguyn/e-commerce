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

	public function first($column, $value)
	{
		$db = DB::connect();
		$stmt = $db->prepare("SELECT * FROM {$this->table} WHERE {$column} = :val");
		$stmt->bindParam(':val', $value);
		$stmt->execute();

		return $stmt->fetch();
	}

	public function create($fields)
	{
		if (! is_array($fields)) throw new InvalidArgumentException('The argument must be an array, ' . gettype($fields) . ' suppliped.');
		$columns = implode(', ', array_keys($fields));
		
		$placeholder = [];
		$placeholder = array_pad($placeholder, count($fields), '?');
		$placeholder = implode(',', $placeholder);
		
		$db = DB::connect();
		$stmt = $db->prepare("INSERT INTO {$this->table} ({$columns}) VALUES({$placeholder})");
		if (! $stmt->execute(array_values($fields))) {
			handleError();
		}
		return $db->lastInsertId();
	}

	public function update($fields, $key)
	{
		if (! is_array($fields)) throw new InvalidArgumentException('The argument must be an array, ' . gettype($fields) . ' suppliped.');
		$columns = implode('=?,', array_keys($fields)) . '=?';
		$db = DB::connect();
		$key = (int) $key;
		$stmt = $db->prepare("UPDATE {$this->table} SET {$columns} WHERE {$this->primaryKey} = $key");
		
		if (! $stmt->execute(array_values($fields))) {
			handleError();
		}
	}

	public function destroy($id)
	{
		$db = DB::connect();
		$stmt = $db->prepare("DELETE FROM {$this->table} WHERE {$this->primaryKey} = :id");
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		if (! $stmt->execute()) {
			handleError();
		}
	}
}

