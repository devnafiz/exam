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


class LoginController extends Controller
{
    use ResponseTrait;



    public function __construct(AuthRepository $auth){

        $this->auth=$auth;
    }

    /**
     * @OA\Post(
     *     path="/api/login",
     *     tags={"Authentication"},
     *     summary="login",
     *     description="Multiple status values can be provided with comma separated string",
     *     operationId="login",
     *     deprecated=true,
            @OA\RequestBody(
     *         required=true,
     *         description="Pet object that needs to be added to the store",   @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(
     *                     property="email",
     *                     description="Updated email of the pet",
     *                     type="string",

     *                 ),
     *                 @OA\Property(
     *                     property="password",
     *                     description="Updated status of the pet",
     *                     type="string"
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

    public function login(LoginRequest $request){


        try {
            $data=$this->auth->login($request->all());
            return $this->responseSuccess($data,'login succesfully');
            
        } catch (Exception $e) {
            return $this->responseError(null,'User not exists here');
        }

    	//$user =User::where('email',$request->email)->first();
     //    $user =$this->auth->getUserByEmail($request->email);

    	// if(!$user){

     //       return $this->responseError(null,'User not exists here');
    	// }
     //      //hah check
    	// if(Hash::check($request->password,$user->password)){
    	// 	$tokenCreated=$user->createToken('authToken');

    	// 	$data=[
     //            'user'=>$user,
     //            'access_token'=>$tokenCreated->accessToken,
     //            'token_type' => 'Bearer',
     //            'expires_at' => Carbon::parse($tokenCreated->token->expires_at)->toDateTimeString()
                

    	// 	];

    	// 	return $this->responseSuccess($data,'login succesfully');
    	// }
    }
}
