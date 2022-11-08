<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $post = Post::query()
        ->where('published', true)
        ->with('category')
        ->latest()
        ->get();
        
        return view('pages.home', ['posts' => $post]);
    }

    public function filterByCategory(Request $request)
    {
        $posts = Post::with('category')
        ->latest()
        ->where('category_id', $request->id)
        ->where('published', true)
        ->get();

        return view('pages.home', compact("posts"));
    }
}
