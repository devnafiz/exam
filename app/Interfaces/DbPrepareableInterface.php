<?php

namespace App\Interfaces;
use  Illuminate\Contracts\Pagination\Paginator;

interface DbPrepareableInterface
{

	public function preparefordb(array $data):array;

	
}