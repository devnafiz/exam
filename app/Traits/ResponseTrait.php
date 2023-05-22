<?php

 namespace  App\Traits;
 use Illuminate\Http\JsonResponse;
 use Illuminate\Http\Response;

trait ResponseTrait

{

	public function responseSuccess($data,$message='successfully'):jsonResponse

	{

		return response()->json([

             'status' =>true,
             'message' =>$message,
             'data'=>$data,
             'errors'=>null

		],Response::HTTP_Ok);


	}

	/*
      *Error Resaponse
      * @param array|object $errors
      * @param string $message 
      * @param int $responseCode

      * return JsonResponse
	*/

	public function responseError($errors,$message='Data is Invalid',int $responseCode=Response::HTTP_INTERNAL_SERVER_ERROR):jsonResponse

	{

		return response()->json([

             'status' =>false,
             'message' =>$message,
             'data'=>null,
             'errors'=>$errors

		],$responseCode);


	}



}