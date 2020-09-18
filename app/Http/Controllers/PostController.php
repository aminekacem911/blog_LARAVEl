<?php

namespace App\Http\Controllers;
use App\Post;
use Auth;
use App\User;
use App\Comment;
use App\Category;
use Session;
use Response;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //$users =  User::all();
        //dd($user);
        /*$userimg = DB::table('users')
        ->join('posts','posts.user_id','=','users.id')
        ->select('users.image')
        ->first();*/
        //$user = User::all();
        $post = Post::where('approve','=',1)->paginate(5);
        return view('post.index',compact('post'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'desc' =>'required',
            'cat_id' =>'required'
        ]);
        $post = new Post();
        $user = new User();
        $category = new Category();
        $post ->title =$request->title;
        $post ->desc =$request->desc;
        $post ->user_id = Auth::user()->id;
        $post ->user($request['user_id']);
        $post ->cat_id =$request->cat_id;
        $post ->category($request['cat_id']);  
        //dd($post)  ;
        $post->save();
        Session::flash('succes','the post successfullly submitted !');
        return redirect()->route('post.index');
                //return response()->json($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    { 
        return View('post.show', compact('post')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
        $namecat = Category::all();
        $post = Post::find($id);
        
        return view('post.edit',compact('post','namecat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'title' => 'required',
            'desc' => 'required',
            'cat_id' =>'required'
        ));
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->desc =$request->input('desc');
        $post->user_id = Auth::user()->id;
        $post ->user($request['user_id']);
        $post->cat_id = $request->input('cat_id');
        $post ->save();
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        //dd($post);
        $post->delete();
        return back();
    }
}
