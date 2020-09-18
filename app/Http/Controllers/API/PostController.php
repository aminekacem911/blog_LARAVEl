<?php

namespace App\Http\Controllers\API;

use Auth;
use App\Post;
use App\User;
use App\Comment;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    use ApiResponseTraitController ;

    public function index(){
        $posts = DB::table('posts')
        ->where('approve','=',1)
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->select('users.name','users.image', 'posts.*')
        ->paginate(5);
            return response()->json([
        
            'posts' => $posts
        ]);
    }
    public function show($id)
    {
        $post = Post::find($id);
        $comment = Comment::get();
        if($post){
            return $this->apiResponse($post);
        }
            return $this->apiResponse(null,'post not found!!',404);
    }
    public function store(Request $request)
    {
            $validate = Validator::make($request->all(),[
                'title'=>'required',
                'desc' =>'required',
                'cat_id' =>'required',


            ]);
            if($validate -> fails())
            {
                return $this->apiResponse(null,$validate->errors(),422);
            }
        
        $user = new User();
        $category = new Category();
        $post = new Post([
            'title' => $request->get('title'),
            'desc' => $request->get('desc'),
            'cat_id' => $request->get('cat_id')
        ]);
        //$post = $request->all();
        
        $post->user_id = Auth::user()->id;
       
        $post->save();

        if($post){
            return $this->apiResponse($post,null,201);
            //return $this->apiResponse(['post'=>$post,'id'=>$post->user_id],null,201);
        }
            return $this->apiResponse(null,'error ',400);
    }
    public function update(Request $request , $id)
    {
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
            $post->user_id = Auth::user()->id;
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
    }
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        if(!$post){
            return $this->apiResponse(null,'post not found!!',404);
        }
        $post->delete();
        return $this->apiResponse(null,'deleted successfulllllyyyyy',200);
    }
}
