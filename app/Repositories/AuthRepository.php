<?php
 namespace App\Repositories;

use App\Models\Product;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\PersonalAccessTokenResult;
use Carbon\Carbon;



class AuthRepository 
{
    
    


    public function login(array $data):array
    {
         $user =$this->getUserByEmail($data['email']);

    	if(!$user){

           //return $this->responseError(null,'User not exists here');
    		throw new Exception("User Does not exists", 404);
    		
    	}

            //hah check
    	if(!$this->isValidPassword($user,$data)){
          throw new Exception("Password does not match", 401);

         }

         $tokenInstance=$this->userAuthToken($user);

    	return $this->getAuthData($user,$tokenInstance);
       
    	
    }




    public function getUserByEmail(string $email):?User
    {
    	return User::where('email',$email)->first();
    }



    public function isValidPassword(User $user,array $data):bool
    {

    	return Hash::check($data['password'],$user->password);
    }



    public function userAuthToken(User $user):PersonalAccessTokenResult
    {

    	return $user->createToken('authToken');
    }



    public function getAuthData(User $user,PersonalAccessTokenResult $tokenInstance){

    	return[

           'user'=>$user,
                'access_token'=>$tokenInstance->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse($tokenInstance->token->expires_at)->toDateTimeString()
    	];
    }


}


     