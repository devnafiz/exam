<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PostController;

use App\Facades\SomeServiceExample;
use Illuminate\Support\Facades\Config;
use App\Facades\SomeServiceExampleFacade;
use  SomeService as B;
use App\Http\Controllers\LocalizationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

     //$service= new SomeServiceExample();
    // dd(SomeServiceExampleFacade::dosomething());
      // dd(Config::get('app.name'));
     //dd(B::dosomething());
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::get('/post/{post}',[PostController::class,'show']);
Route::get('/locale/{lange}',[LocalizationController::class,'setLocal']);

Route::get('/user',function(){

 //factory(\App\User::class,3)->create();
  // $ser=App\Models\User::factory()->create();
  //  $ser->address()->create([
  //    'country'=>'India'
  //  ]);
    $users =App\Models\User::has('posts')->with('posts')->get();
    // $users[0]->addressess()->create([
    //     'country'=>'Nepal'
    // ]);
    //dd($users);
    return view('backend.user.index',compact('users'));
});

Route::get('/posts',function(){
    // App\Models\tag::create([
    //        'name'=>'PHP',
           
    // ]);
    // App\Models\tag::create([
    //        'name'=>'Javascript',
           
    // ]);
    // App\Models\tag::create([
    //        'name'=>'HTML',
           
    // ]);
    //  App\Models\tag::create([
    //        'name'=>'Laravel',
           
    // ]);
       $tag =App\Models\Tag::first();
       $post =App\Models\Post::with('tags')->first();
       //$post->tags()->detach([2,3,4]);
       $post->tags()->sync([2,3]);// ageula remove kore dey

       // dd($post);


        $posts =App\Models\Post::with('user','tags')->get();
        return view('backend.post.index',compact('posts'));

});

