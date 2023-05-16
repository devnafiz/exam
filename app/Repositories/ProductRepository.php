<?php

namespace App\Repositories;

use  App\Models\Product;
use App\Interfaces\CurdInterface;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Str;

class ProductRepository implements CurdInterface
{
    

    public function getAll(?int $perPage=10):Paginator
    {

    	return Product::paginate($perPage);
    }


     public function getById(int $id): ?Product
    {

    	return Product::find($id);
    }

     public function create(array $data): ?Product
    {

        if(empty($data['slug'])){
            $data['slug']=Str::slug(substr([$data->slug], 0,80));
        }

    	return Product::create($data);
    }



}