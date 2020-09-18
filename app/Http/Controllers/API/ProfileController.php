<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Validator;
class ProfileController extends Controller
{
    use ApiResponseTraitController ;

    public function index(){
        $user =  Auth::user();
        return $this->apiResponse($user);
    }
   
   
    public function update(Request $request, User $user)
    {
            $validate = Validator::make($request->all(),[
                'name' => 'required',
                'email' => 'required',
                'password' =>'required',
                'image' =>'required'
            ]);
            if($validate -> fails())
            {
                return $this->apiResponse(null,$validate->errors(),422);
            }
            
            if(!$user)
            {
                return $this->apiResponse(null,'user not found!!',404);
            }
            $user = Auth::user();
            $user->name = $request->input('name');
            $user->email =$request->input('email');
            $user->password = $request->input('password');
            $user->image = $request->input('image');
            $user ->save();
        if($user){
            return $this->apiResponse($user,null,201);
        }
            return $this->apiResponse(null,'error updating',520);
    }
    
}
