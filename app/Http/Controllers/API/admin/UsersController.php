<?php

namespace App\Http\Controllers\API\admin;
use App\User;
use Gate;
use App\Role;
use App\Post;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\ApiResponseTraitController ;
use Illuminate\Support\Facades\Validator;
class UsersController extends Controller
{
    use ApiResponseTraitController ;
    public function index(){
        if(auth()->user()->hasRole('admin')){
            $users = User::all();
            return $this->apiResponse($users);
        }else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
    public function edit($id)
    {
        if(auth()->user()->hasRole('admin') && Gate::allows('edit-users'))
        {
            $user = User::find($id);   
                if(!$user){
                    return $this->apiResponse(null,'not found',520);
                }else {
                    return response()->json([
                    'user' => $user,
                    'role'=> $user->roles()->get()
            ]);
        }}else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
    public function update(Request $request ,$id)
    {///mizzelt ne9saaaaaa
        if(auth()->user()->hasRole('admin') && Gate::allows('edit-users')){
            $user = User::find($id);
            if(!$user){
                return $this->apiResponse(null,'not found',520);
            }
           else {
            $user->roles()->sync($request->input('role_id'));
            return response()->json([
                'user' => $user,
                'role'=> $user->roles()->get()->pluck('name')
            ]);
           }   
        }else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
  
    }
    public function destroy(Request $request,$id)
    {
        if(auth()->user()->hasRole('admin') && Gate::allows('delete-users')){
            $user = User::find($id);
            
            if(!$user){
                return $this->apiResponse(null,'not found',520);
            }else {

                  $posts= $user->posts;
                  //dd($posts);
                  $comments = $user->comments;
                  foreach($comments as $com){
                    $com->forceDelete();
              }
                  foreach($posts as $post){
                        $post->forceDelete();
                  }
                
                    $user->roles()->detach();

                    $user->forceDelete(); 
                    return $this->apiResponse(null,'deleted success',200);
                }   
        }else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
    public function ban($id)
    {
        if(auth()->user()->hasRole('admin') && Gate::allows('ban-users')){
            $user = User::find($id);
            if(!$user){
                return $this->apiResponse(null,'not found',520);
            }else {
            
                $user->ban([
                    'comment' => 'Enjoy your ban!',
                    'expired_at' => '+1 month'
                ]);  
                    return $this->apiResponse($user,'banned success',200);
                }   
        }else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
