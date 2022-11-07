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
}
