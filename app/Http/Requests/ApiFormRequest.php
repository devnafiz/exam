<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use App\Traits\ResponseTrait;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Response;



class ApiFormRequest extends FormRequest
{
   use ResponseTrait;
    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(

         $this->responseError((new ValidationException($validator))->errors(),'Invalide Requests',Response::HTTP_BAD_REQUEST)
        );
        
    }
    
}
