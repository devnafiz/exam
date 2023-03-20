<?php 

namespace App\Services;



class StripeGatway implements PaymentServiceContract 
{
    protected $secretkey;
	public function  __construct(string $secretkey){
		$this->secretkey =$secretkey;


	}


 public function execute(){

 	return 'Srtipe getway';
 } 


}