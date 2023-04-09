<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use App\Repositories\ProductRepository;
use App\Traits\ResponseTrait;
use  Illuminate\Http\Exceptions\HttpResponseException;

class Authenticate extends Middleware
{
     use ResponseTrait;
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            //return route('login');
            return $this->responseError(null,'Unauthenticated user');
        }
    }

     /**
     * Handle an unauthenticated user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $guards
     * @return void
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    protected function unauthenticated($request, array $guards)
    {
        throw new HttpResponseException(
            $this->responseError(null,'Unauthenticated user')
        );
    }
}
