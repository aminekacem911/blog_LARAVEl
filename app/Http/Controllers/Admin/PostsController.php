<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(){
        $allposts= Post::all();
        $post = Post::where('approve','=',0)->get();
       
        return view('admin.posts.index',compact('post','allposts'));
        
    }
   
public function approve(Request $request,Post $post)
    {   
        $post = Post::where('id','=',$request->input('id'))->first();
       //$post = Post::find($id);
      // $post->id = $request->input('id');
       //$post = Post::sync($request->id);
       $post->title = $request->input('title');
       $post->desc = $request->input('desc');
       $post->user_id = $request->input('user_id');
       $post->approve = 1;
       $post->save();
        return back();
    }
public function edit($id)
{
    $post = Post::find($id);


   //$namecat =DB::table('posts')
   //->join('category', 'posts.cat_id', '=', 'category.id')
   //->select(['category.category'])
   //->get();
   $namecat = Category::all();
    return view('admin.posts.edit',compact('post','namecat'));
}  
public function update(Request $request,$id)
{
   


    $this->validate($request,array(
        'title' => 'required',
        'desc' => 'required',
        'user_id' => 'required',
        'approve' => 'required',
        'cat_id' =>'required'
    ));
    $post = Post::find($id);
    $post->title = $request->input('title');
    $post->desc = $request->input('desc');
    $post->user_id = $request->input('user_id');
    $post->approve = $request->input('approve');
    $post->cat_id = $request->input('cat_id');
    $post->save();
    return redirect()->route('admin.posts.index');
}   
public function destroy($id)
{
    $post = Post::find($id);
    $post->delete();
    return back();
}
}
