<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Repositories\AuthRepository;
use App\Requests\LoginRequest;


class LoginController extends Controller
{
    use ResponseTrait;



    public function __construct(AuthRepository $auth){

        $this->auth=$auth;
    }

    public function login(LoginRequest $request){

    	//$user =User::where('email',$request->email)->first();
        $user =$this->auth->getUserByEmail($request->email);

    	if(!$user){

           return $this->responseError(null,'User not exists here');
    	}
          //hah check
    	if(Hash::check($request->password,$user->password)){
    		$tokenCreated=$user->createToken('authToken');

    		$data=[
                'user'=>$user,
                'access_token'=>$tokenCreated->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse($tokenCreated->token->expires_at)->toDateTimeString()
                

    		];

    		return $this->responseSuccess($data,'login succesfully');
    	}
    }
}
