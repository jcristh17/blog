<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{

    public function index()
    {
        $posts=Post::count();
        $users=User::count();
        //dd($posts);
        return view('admin.index',compact('posts','users'));
    }
    public function Adash()
    {
        $posts=Post::count();
        $users=User::count();
        //dd($posts);
        return view('admin.dashboard-admin',compact('posts','users'));
    }
}
