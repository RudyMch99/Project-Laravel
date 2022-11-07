<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $post = Post::query()
        ->orderBy('title')
        ->where('published', true)
        ->get();
        
        return view('pages.home', ['posts' => $post]);
    }
}
