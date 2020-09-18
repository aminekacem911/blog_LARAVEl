<?php

namespace App\Http\Controllers\API;

use Auth;
use App\Post;
use App\User;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    use ApiResponseTraitController ;

   
   public function index($id)
   {
       
    $comments = DB::table('comments')
    ->where('comments.post_id',$id)
    ->join('users', 'users.id', '=', 'comments.user_id')
    ->select('users.name','users.image', 'comments.*')
    ->get();
    if($comments)
    {
        return $this->apiResponse($comments,201);
    }
    return $this->apiResponse(null,'comment not found!!',404);
   }
    public function store(Request $request)
    {
        
            $validate = Validator::make($request->all(),[
                'comment'   =>  'required'
            ]);
            if($validate -> fails())
            {
                return $this->apiResponse(null,$validate->errors(),422);
            }
            
            if(!$user)
            {
                return $this->apiResponse(null,'comment not found!!',404);
            }
        $comment = new Comment();
        $comment->comment = $request->comment; 
        $comment->post_id = $request->post_id;
        $comment->user_id = Auth::user()->id;
        $comment->save();
        if($comment){
            return $this->apiResponse($comment,null,201);
        }
            return $this->apiResponse(null,'error updating',520);
    }
    public function delete($id)
    {
        $comment = Comment::find($id);
        $post_id = $comment->post->id;
        $comment->delete();
        if(!$comment){
            return $this->apiResponse(null,'post not found!!',404);
        }
        
        return $this->apiResponse(null,'deleted successfulllllyyyyy',200);
    }
    public function update(Request $request , $id)
    {
            $validate = Validator::make($request->all(),[
                'comment' => 'required'
            ]);
            if($validate -> fails())
            {
                return $this->apiResponse(null,$validate->errors(),422);
            }

            if(!$comment || $comment->user_id = !Auth::user()->id)
            {
                return $this->apiResponse(null,'comment not found!!',404);
            }
            $comment = Comment::find($id);
            $comment->comment = $request->input('comment');
            $comment->user_id = Auth::user()->id;
            $comment-> post($request['id']);
            $comment ->save();
        if($comment){
            return $this->apiResponse($comment,null,201);
        }
            return $this->apiResponse(null,'error updating',520);
    }
    public function edit($id)
    {
        
        $comment = Comment::find($id);
        if($comment){
            return $this->apiResponse($comment,null,201);
        }
            return $this->apiResponse(null,'coment not found',520);
        
    }
    
}
