<?php

// include base model
require_once 'app/core/Model.php';

class Rate extends Model
{
	protected $table = 'rates';
	protected $primaryKey = 'book_id';	
}
