<?php

namespace App\Services;
//use App\Services\PaymentGatway;

/**
 * 
 */
// class PaymentService 
// {
//     protected $getway;
// 	public function __construct(PaymentGatway $getway){

// 		$this->getway=$getway;
// 	}

	
// 	public function process()
// 	{
// 		//$this->getway->
// 	 return $this->getway->execute();
// 	}
// }


interface PaymentServiceContract{


  public function execute();
}