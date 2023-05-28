<?php
namespace Nafiz\LaravelSlug;

use Illuminate\Support\ServiceProvider;

class UniqueSlugServiceProvider extends ServiceProvider
{
  

    /**
     * Register any application services.
     */

   public function register(): void
    {
        $this->app->bind('Laravel-unique-slug',function($app){
           return new Nafiz\LaravelSlug\UniqueSlug();

        });
    }


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       
    }
}


?>