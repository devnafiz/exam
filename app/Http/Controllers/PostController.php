<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Services\PaymentServiceContract;

class PostController extends Controller
{
    public function show(){

    	//$payment= new PaymentService();

    	//$payment->process();
    	$payment=resolve(PaymentServiceContract::class);

        //dd($payment->process());
        dd(resolve(PaymentServiceContract::class),resolve(PaymentServiceContract::class));
    }
}
