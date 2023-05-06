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
use Auth;

class ProfileController extends Controller
{

	 use ResponseTrait;



    public function __construct(AuthRepository $auth){

        $this->auth=$auth;
    }
    /**
     * @OA\Get(
     *     path="/api/profile",
     *     tags={"Authentication"},
     *     summary="Get  profile summery",
     *     description="Multiple status values can be provided with comma separated string",
     *     operationId="show",
     *     deprecated=true,
     *    
            security={{"Bearer":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticate"
     *     )
     *     
     * )
     */
    

    public function show():JsonResponse

    {

     
        try {
             return $this->responseSuccess(Auth::guard()->user(),'User data  here');
            
        } catch (Exception $e) {
            return $this->responseError(null,'User not exists here');
        }

  }

   /**
     * @OA\Post(
     *     path="/api/logout",
     *     tags={"Authentication"},
     *     summary="logout",
     *     description="Multiple status values can be provided with comma separated string",
     *     operationId="logout",
     *     deprecated=true,

           security={{"Bearer":{}}},
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


   public function logout():JsonResponse
   {

     
        try {
              Auth::guard()->user()->token()->revoke();//

              Auth::guard()->user()->token()->delete();
              return $this->responseSuccess('','Logout succesfully');
            
        } catch (Exception $e) {
            return $this->responseError(null,'User not exists here');
        }

  }
}
