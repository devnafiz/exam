<?php

namespace App\Repositories;

use  App\Models\Product;
use App\Interfaces\CurdInterface;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Str;
use Auth;
use App\Interfaces\DbPrepareableInterface;

class ProductRepository implements CurdInterface,DbPrepareableInterface
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
       $data= $this->preparefordb();
        // if(empty($data['slug'])){
        //     $data['slug']=Str::slug(substr([$data->slug], 0,80)).'-'.time();
        // }
        // //add user Id
        // $data['user_id']=Auth::id();
    	return Product::create($data);
    }

     public function preparefordb(array $data): ?array
    {

        if(empty($data['slug'])){
            $data['slug']=$this->UniqueSlug($data['title']);
        }
        //add user Id
        $data['user_id']=Auth::id();
       // return Product::create($data);
        return $data;
    }

    private function UniqueSlug(String $title){
        return  Str::slug(substr($title, 0,80)).'-'.time();
    }



}