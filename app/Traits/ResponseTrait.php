<?php

 namespace  App\Traits;
 use Illuminate\Http\JsonResponse;

trait ResponseTrait

{

	public function responseSuccess($data,$message='successfully'):jsonResponse

	{

		return response()->json([

             'status' =>true,
             'message' =>$message,
             'data'=>$data,
             'errors'=>null

		]);


	}

	public function responseError($errors,$message='Data is Invalid'):jsonResponse

	{

		return response()->json([

             'status' =>false,
             'message' =>$message,
             'data'=>null,
             'errors'=>$errors

		]);


	}



}