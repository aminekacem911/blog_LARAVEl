<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\User;
use App\Post;
use App\Comment;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
       //select count users
        $count_users = User::count();
        
        //select count posts
        $count_posts = Post::count();
        
        //select count comments
        $count_comments = Comment::count();
        

        return view('admin.dashboard',compact('count_users','count_posts','count_comments'));
        
    }
}
