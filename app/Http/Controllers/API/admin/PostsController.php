<?php

namespace App\Http\Controllers\API\admin;
use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\ApiResponseTraitController ;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
class PostsController extends Controller
{           
    use ApiResponseTraitController ;
        public function index(){
            if(auth()->user()->hasRole('admin')){
                $post = Post::where('approve','=',0)->paginate(5);
                return $this->apiResponse($post);
            }else {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
    }
    public function approve(Request $request,$id)
    {
        if(auth()->user()->hasRole('admin')){
            $post = Post::find($id);      
            $post->approve = 1;  
            $post->save();
            return $this->apiResponse(null,'post approved',200);
        }else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
    public function update(Request $request , $id)
    {
        if(auth()->user()->hasRole('admin')){
            $validate = Validator::make($request->all(),[
                'title'=>'required',
                'desc' =>'required',
                'cat_id' =>'required'
            ]);
            if($validate -> fails())
            {
                return $this->apiResponse(null,$validate->errors(),422);
            }
            $post = Post::find($id);
            $post->title = $request->input('title');
            $post->desc =$request->input('desc');
            $post->user_id = $request->input('user_id');
            $post->approve = 1;
            $post->cat_id = $request->input('cat_id');
            $post ->save();
            if(!$post)
            {
                return $this->apiResponse(null,'post not found!!',404);
            }
            $post ->update($request->all());
            if($post){
                return $this->apiResponse($post,null,201);
            }
                return $this->apiResponse(null,'error updating',520);
        }else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
    public function destroy($id)
    {
        if(auth()->user()->hasRole('admin')){
            $post = Post::find($id);
            $post->delete();
            if(!$post){
                return $this->apiResponse(null,'post not found!!',404);
            }
            $post->delete();
                return $this->apiResponse(null,'deleted successfulllllyyyyy',200);
        }else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}