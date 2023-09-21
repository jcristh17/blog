<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $tags=Tag::all();
        $categories = Category::all();
        $posts = Post::where('status',2)->latest('id')->paginate(9);
        return view('posts.index',compact('posts','categories','tags'));
    }

    public function buscar(Request $request)
    {
        $tags = Tag::all();
        $categories = Category::all();


        if ($request->category_id != 'all') {
            $posts =  Post::where('name', 'like', '%' . $request->search . '%')
                ->where('status', 2)
                ->Where('category_id', $request->category_id)
                ->latest('id')
                ->paginate(9);
        } else {
            $posts = Post::where('name', 'like', '%' . $request->search . '%')
            ->where('status',2)->latest('id')->paginate(9);
        }
        $posts->created_at->diffForHumans( Carbon::now() );
        return view('posts.index', compact('posts', 'categories', 'tags','request'));
    }
    public function show(Post $post){
        $this->authorize('published',$post);
        $similares = Post::where('category_id',$post->category_id)
        ->where('status',2)
        ->where('id','!=',$post->id)
        ->latest('id')
        ->take(5)
        ->get();
        return view('posts.show',compact('post','similares'));
    }

    public function category(Category $category)
    {
        $posts = Post::where('category_id',$category->id)
        ->where('status',2)
        ->latest('id')->paginate(6);
        return view('posts.category',compact('posts','category'));
    }

    public function tag(Tag $tag)
    {
        $posts = $tag->posts()->where('status',2)->latest('id')->paginate(4);
        return view('posts.tag',compact('posts','tag'));
    }
}
