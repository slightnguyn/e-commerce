<?php

// include base model
require_once 'app/core/Model.php';

class BookOrder extends Model
{
	protected $table = 'book_order';
	protected $primaryKey = 'order_id';
}
