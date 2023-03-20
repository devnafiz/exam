<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\PaymentServiceContract;
use App\Services\PaypalGatway;
use App\Services\StripeGatway;
use App\Services\CustomGatway;
use App\Facades\SomeServiceExample;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind(PaymentGatway::class, function(){
        //   return new PaymentGatway('12123');

        // });

        $this->app->singleton(PaymentServiceContract::class, function(){

            if(request()->gatway ==='stripe'){
             return new StripeGatway('44545');

            }

         return new PaypalGatway('34343');
        });

        $this->app->extend(PaymentServiceContract::class, function(){

          return new CustomGatway('545');
        });

        $this->app->bind('SomeService',function(){
          return new SomeServiceExample('444');

        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
