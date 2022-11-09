<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function show($id, $slug)
    {
        $post = Post::find($id);
        return view("pages.show", compact("post"));
    }
}
