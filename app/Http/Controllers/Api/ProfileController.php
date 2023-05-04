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
    

    public function show(){

     
        try {
             return Auth::guard()->user();
            
        } catch (Exception $e) {
            return $this->responseError(null,'User not exists here');
        }

  }


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
