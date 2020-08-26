<?php

namespace App\Http\Controllers;
use App\Comment;
use App\Post;
use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
class CommentController extends Controller
{
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, array(

            'comment'   =>  'required',
            ));
        //$post = Post :: find($id);
        //$post = Post::find($id);
           // dd($post);
        $comment = new Comment();
        $comment->comment = $request->comment; 
        $comment->post_id = $request->post_id;
        //$comment->post()->associate($post);
        $comment->user_id = Auth::user()->id;
       // $comment->user()->associate($user);
        $comment->save();
               
      

        return back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('comment.edit')->withComment($comment);
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
        //$post = new Post();
        $comment = Comment::find($id);
        
        $this->validate($request, array(
            'comment' => 'required'));

        $comment->comment = $request->input('comment');
        
        $comment->user_id = Auth::user()->id;
        $comment ->user($request['user_id']);
        $comment-> post($request['id']);
        //$comment->post_id = $request->input($post_id);
        //dd($comment);
        //$comment->post()->associate($post);
       
        $comment->save();

        

        return back();
    }

    public function delete($id)
    {
        $comment = Comment::find($id);
        return view('comment.delete')->withComment($comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $post_id = $comment->post->id;
        $comment->delete();

       

        return redirect()->route('post.show', $post_id);
    }
}