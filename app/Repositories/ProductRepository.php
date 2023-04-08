<?php

namespace App\Repositories;

use  App\Models\Product;
use App\Interfaces\CurdInterface;
use Illuminate\Contracts\Pagination\Paginator;

class ProductRepository implements CurdInterface
{
    

    public function getAll(int $perPage=10):Paginator
    {

    	return Product::paginate($perPage);
    }


     public function getById(int $id):Product
    {

    	return Product::find($id);
    }



}