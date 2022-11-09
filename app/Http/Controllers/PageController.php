<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $posts = Post::query()
        ->where('published', true)
        ->with('category', 'tags')
        ->latest()
        ->get();
        
        return view('pages.home', compact("posts"));
    }

    public function filterByCategory(Request $request, Category $category)
    {
        $posts = $category
        ->posts()
        ->with(['category', 'tags'])
        ->where('published', true)
        ->latest()
        ->get();

        return view('pages.home', compact("posts"));
    }

    public function filterByTag(Request $request, Tag $tag)
    {
        $posts = $tag
        ->posts()
        ->with(['category', 'tags'])
        ->where('published', true)
        ->latest()
        ->get();

        return view('pages.home', compact("posts"));
    }
}
