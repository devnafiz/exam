<?php

namespace App\Interfaces;
use  Illuminate\Contracts\Pagination\Paginator;

interface CurdInterface
{

	public function getAll(array $filterData):Paginator;

	public function getById(int $id): object|null;
}