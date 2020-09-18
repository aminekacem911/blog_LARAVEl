<?php

namespace App\Http\Controllers\API;

trait ApiResponseTraitController 

{
   public function apiResponse($data=null,$error=null,$code=200)
   {
       $array =[
           'data' => $data,
           'status' => in_array($code, $this->succesCode())? true:false,
           'error' =>$error
       ];
       return response($array, $code);
   }
   public function succesCode()
   {
        return [
            200,201,202
        ];
   }
}
