<?php

namespace App\Facades;


class SomeServiceExample
{
	protected $secretkey;

	public function __construct(String $secretkey){

		$this->secretkey=$secretkey;
	}

	public function dosomething(){

		return 'done';
	}

}