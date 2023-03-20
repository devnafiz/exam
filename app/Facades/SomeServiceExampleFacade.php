<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;
//use App\Facade;


class SomeServiceExampleFacade extends Facade
{

	protected static function getFacadeAccessor(){

		return 'SomeService';
		//return  SomeServiceExample::class;
	}
}