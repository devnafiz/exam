<?php

namespace App\Services;


class PaypalGatway implements PaymentServiceContract 
{
    protected $secretkey;
	public function  __construct(string $secretkey){
		$this->secretkey =$secretkey;


	}


 public function execute(){

 	return 'payment getway';
 } 


}