<?php

namespace App\Http\Controllers;
use App\Post;
use Auth;
use App\User;

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
        $user =  Auth::user();
        //dd($user);
        $post = Post::all();
        return view('post.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
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
            'desc' =>'required'
        ]);
        $post = new Post();
        $user = new User();
        $post ->title =$request->title;
        $post ->desc =$request->desc;
        $post ->user_id = Auth::user()->id;
        $post ->user($request['user_id']);
        $post->save();
        return redirect()->route('post.show', $post->id);
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
      
        
        $post = Post::find($id);
        
        return view('post.edit',compact('post'));
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
        ));
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->desc =$request->input('desc');
        $post->user_id = Auth::user()->id;
        $post ->user($request['user_id']);
        $post->user()->associate($user);
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
        $post->delete();
        return back();
    }
}
