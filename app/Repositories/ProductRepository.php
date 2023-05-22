<?php

namespace App\Repositories;

use  App\Models\Product;
use App\Interfaces\CurdInterface;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Str;
use Auth;
use App\Interfaces\DbPrepareableInterface;
use Exception;
use Illuminate\Http\Response;
class ProductRepository implements CurdInterface,DbPrepareableInterface
{
    

    public function getAll(array $filterData):Paginator
    {
        $filter=$this->getFilterData($filterData);
        $query=Product::orderBy($filter['orderBy'],$filter['order']);

        if(!empty($filter['search'])){

            $searched ='%'.$filter['search'].'%';
            $query->where('title','like',$searched)
            ->orWhere('slug','like',$searched);
        }

    	return $query->paginate($filter['perPage']);
    }

    public function getFilterData(array $filterData): array
    {
        $defaultArgs=[

             'perPage'=>'10',
             'search'=>'',
             'orderBy'=>'id',
             'order'=>'desc'

        ];

        return array_merge($defaultArgs,$filterData);

    }


     public function getById(int $id): ?Product
    {

    	$product= Product::find($id);

        if(empty($product)){

            throw new Exception("Product does not found",Response::HTTP_NOT_FOUND );
            
        }
        return $product;
    }

     public function create(array $data): ?Product
    {
       $data= $this->preparefordb($data);
        // if(empty($data['slug'])){
        //     $data['slug']=Str::slug(substr([$data->slug], 0,80)).'-'.time();
        // }
        // //add user Id
        // $data['user_id']=Auth::id();
    	return Product::create($data);
    }

     public function update(int $id,array $data): ?Product
    {
       $product =$this->getById($id);
        $data= $this->preparefordb($data);

        
        return  $product->update($data);
    }

     public function delete(int $id): ?Product
    {
       $data= $this->preparefordb($data);
        // if(empty($data['slug'])){
        //     $data['slug']=Str::slug(substr([$data->slug], 0,80)).'-'.time();
        // }
        // //add user Id
        // $data['user_id']=Auth::id();
        return Product::create($data);
    }

     public function preparefordb(array $data): array
    {

        if(empty($data['slug'])){
            $data['slug']=$this->UniqueSlug($data['title']);
        }
        if(!empty($data['image'])){
            $data['image']=$this->uploadImage($data['image']);

        }
        //add user Id
        $data['user_id']=Auth::id();
       // return Product::create($data);
        return $data;
    }

    private function UniqueSlug(String $title):string
    {
        return  Str::slug(substr($title, 0,80)).'-'.time();
    }

    private function uploadImage($image)
    {
        $imageName= time().'.'.$image->extension();
        $image->storePubliclyAs('public',$imageName);

        return $imageName;
    }



}