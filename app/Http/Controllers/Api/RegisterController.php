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

    public function register(RegisterRequest $request){


        try {
            $data=$this->auth->register($request->all());
            return $this->responseSuccess($data,'login succesfully');
            
        } catch (Exception $e) {
            return $this->responseError(null,'User not exists here');
        }

  }
}
