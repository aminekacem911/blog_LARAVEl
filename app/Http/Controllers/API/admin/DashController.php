<?php

namespace App\Http\Controllers\API\admin;
use Auth;
use App\User;
use App\Post;
use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashController extends Controller
{
    use ApiResponseTraitController ;
    public function index(){
        
        if(auth()->user()->hasRole('admin')){
        
         //select count users
         $count_users = User::count();
        
         //select count posts
         $count_posts = Post::count();
         
         //select count comments
         $count_comments = Comment::count();
         
          return response()->json([
            'user' => $count_users,
            'posts' => $count_posts,
            'comments' => $count_comments
        ]);
          }else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
    }
}
