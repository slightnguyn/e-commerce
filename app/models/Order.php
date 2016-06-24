<?php

// include base model
require_once 'app/core/Model.php';

class Order extends Model
{
	protected $table = 'orders';
	protected $primaryKey = 'id';
}