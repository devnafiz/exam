<?php 

namespace App\Services;



class CustomGatway implements PaymentServiceContract 
{
    protected $secretkey;
	public function  __construct(string $secretkey){
		$this->secretkey =$secretkey;


	}


 public function execute(){

 	return 'cutom getway';
 } 


}