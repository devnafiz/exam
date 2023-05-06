<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Repositories\AuthRepository;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
     use ResponseTrait;



    public function __construct(AuthRepository $auth){

        $this->auth=$auth;
    }


    /**
     * @OA\Post(
     *     path="/api/register",
     *     tags={"Authentication"},
     *     summary="register",
     *     description="Multiple status values can be provided with comma separated string",
     *     operationId="register",
     *     deprecated=true,
            @OA\RequestBody(
     *         required=true,
     *         description="Pet object that needs to be added to the store",   @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(
     *                     property="name",
     *                     description="Updated name of the pet",
     *                     type="string",
                           example="jon doe"

     *                 ),
                        @OA\Property(
     *                     property="email",
     *                     description="Updated email of the pet",
     *                     type="string",
                           example="jondoe@gmail.com"

     *                 ), 
     *                 @OA\Property(
     *                     property="password",
     *                     description="Updated status of the pet",
     *                     type="string",
                          example="12345678"
     *                 ),
                       @OA\Property(
     *                     property="password_confirmation",
     *                     description="Updated status of the pet",
     *                     type="string",
                          example="12345678"
     *                 ),
                      required={"email","password"}
     *             )
              ),
     *        
     *     ),
     *    
     
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

    public function register(RegisterRequest $request){


        try {
            $data=$this->auth->register($request->all());
            return $this->responseSuccess($data,'User crreate succesfully');
            
        } catch (Exception $e) {
            return $this->responseError(null,'User not exists here');
        }

  }
}
