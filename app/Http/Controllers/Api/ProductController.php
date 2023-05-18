<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Http\Requests\ProductCreateRequest;

class ProductController extends Controller
{

    use ResponseTrait;
    public $productRepository;

    public function __construct(ProductRepository $productRepository){

        $this->productRepository=$productRepository;
    }
     /**
     * @OA\Get(
     *     path="/api/products",
     *     tags={"Products"},
     *     summary="Get all product summery",
     *     description="Multiple status values can be provided with comma separated string",
     *     operationId="index",
     *     deprecated=true,
     *     @OA\Parameter(
     *         name="perPage",
     *         in="query",
     *         description="Status values that needed to be considered for filter",
     *         required=false,
     *         explode=true,

     *         @OA\Schema(
     *             default="10",
     *             type="integer",
     *            
     *         )
     *     ),
            security={{"Bearer":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid status value"
     *     )
     *     
     * )
     */
    public function index():JsonResponse
    {
       try {
             //$product=Product::all();
       // $productRepository =new ProductRepository;
        return $this->responseSuccess($this->productRepository->getAll(request()->perPage),'product fatch succesfully');
           
       } catch (Exception $e) {
             return $this->responseError('product fatch succesfully',$e-message());
       }

        
    }

   /**
     * @OA\Post(
     *     path="/api/products",
     *     tags={"Products"},
     *     summary="Create Product",
     *     description="Create Product",
     *     operationId="store",
     *     deprecated=true,
            @OA\RequestBody(
     *         required=true,
     *         description="Product Object",   
               @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(
     *                     property="title",
     *                     description="product title",
     *                     type="string",
                           example="Product title"

     *                 ),
                        @OA\Property(
     *                     property="slug",
     *                     description="Product Slug",
     *                     type="string",
                           example="Product-title"

     *                 ), 
     *                 @OA\Property(
     *                     property="price",
     *                     description="Product Price",
     *                     type="string",
                          example="30.00"
     *                 ),
                       @OA\Property(
     *                     property="image",
     *                     description="Product Image",
     *                     type="file",
                          example=" "
     *                 ),
                      required={"title","price"}
     *             )
              ),
              ),
     *        
     *     
     *    
            security={{"Bearer":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid status value"
     *     )
     *     
     * )
     */
    
    public function store(ProductCreateRequest $request):JsonResponse
    {
        try {
             //$product=Product::all();
       // $productRepository =new ProductRepository;
        return $this->responseSuccess($this->productRepository->create($request->all()),'product fatch succesfully');
           
       } catch (Exception $e) {
             return $this->responseError('product fatch succesfully',$e-message());
       }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
