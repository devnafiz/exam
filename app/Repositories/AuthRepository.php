<?php
 namespace App\Repositories;

use App\Models\Product;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\PersonalAccessTokenResult;



class AuthRepository 
{
    
    


    public function login(array $data):void
    {
         $user =$this->getUserByEmail($data['email']);

    	if(!$user){

           //return $this->responseError(null,'User not exists here');
    		throw new Exception("User Does not exists", 404);
    		
    	}
          //hah check
    	if($this->isValidPassword($user,$data))){
    		$tokenCreated=$this->userAuthToken;

    		$data=[
                'user'=>$user,
                'access_token'=>$tokenCreated->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse($tokenCreated->token->expires_at)->toDateTimeString()
                

    		];

    		return $this->responseSuccess($data,'login succesfully');
    	}
    	
    }




    public function getUserByEmail(string $email):?User
    {
    	return User::where('email',$email)->first();
    }



    public function isValidPassword(User $user,array $data):boot
    {

    	return Hash::check($data['password'],$user->password);
    }

    public function userAuthToken(User $user):PersonalAccessTokenResult
    {

    	return $user->createToken('authToken');
    }


}


     