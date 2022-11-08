<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();

        return view('admin.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::all();
        $categories = Category::all();
        return view('admin.posts.create', compact("posts", "categories"));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title, '-');
        $post->description = $request->description;
        $post->published = (bool) $request->published;
        $post->category_id = $request->category_id;

        if(isset($request->image)){
            $file = $request->file('image');

            $imageName = Str::uuid().'.'.$file->extension();
            $post->image = $imageName;
            $request->image->move(public_path('images'), $imageName);
        }

        $post->save();

        session()->flash('success', "L'article a bien été enregistré");

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $slug)
    {
        $post = Post::find($id);
        return view("pages.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view("admin.posts.edit", compact("post", "categories"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $post)
    {
        
        $update = Post::find($post);
        $update->title = $request->get('title');
        $update->slug = Str::slug($request->get('title'), "-");
        $update->description = $request->get('description');
        $update->published = (bool)$request->get('published');
        $update->category_id = $request->get('category_id');
        
        if(isset($request->image)){

            if($update->image != null){
                File::delete(public_path('images/' . $update->image));
            }

            $imageName = Str::uuid().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $update->image = $imageName;
        }

        $update->save();

        session()->flash('success', "L'article a bien été modifié");

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::where('id', $id)->first();
        
        if($post->image != null){
            File::delete(public_path('images/' . $post->image));
        }

        $post->delete();

        session()->flash('success', "L'article a bien été supprimé");

        return redirect()->route('admin.posts.index');
    }
}
