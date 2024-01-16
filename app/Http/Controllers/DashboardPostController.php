<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'title' => 'Posts',
            'title_2nd' => '',
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'title' => 'Posts',
            'title_2nd' => 'New Post',
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'max:255'],
            'slug' => ['required', 'unique:posts'],
            'category_id' => ['required'],
            'image' => ['image', 'file', 'max:1024'],
            'body' => ['required'],
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('/post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['slug'] = Uuid::uuid4() . '-' . $validatedData['slug'];
        $validatedData['status'] = 'draft';

        Post::create($validatedData);
        
        return redirect('/dashboard/posts')->with('form_toast', [
            'title' => 'New Post Added',
            'description' => 'New post has been added!',
            'type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'title' => 'Posts', 
            'title_2nd' => $post->title,
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $p = $post;
        $parse = explode('-', $p['slug']);
        $p['slug_uuid'] = join('-', array_splice($parse, 0, 5));
        $p['slug'] = join('-', $parse);
        return view('dashboard.posts.edit', [
            'title' => 'Posts',
            'title_2nd' => $p->title,
            'post' => $p,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request['slug'] = $request['slug_uuid'] . '-' . $request['slug'];
        $rules = [
            'title' => ['required', 'max:255'],
            'category_id' => ['required'],
            'image' => ['image', 'file', 'max:1024'],
            'body' => ['required'],
        ];

        if($request->slug != $post->slug){
            $rules['slug'] = ['required', 'unique:posts'];
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('/post-images');
        }
        
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['status'] = 'draft';

        Post::where('id', $post->id)
            ->update($validatedData);
        
        return redirect('/dashboard/posts')->with('form_toast', [
            'title' => 'Post Updated',
            'description' => 'Post has been updated!',
            'type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if($post->image){
            Storage::delete($post->image);
        }
        Post::destroy($post->id);

        return redirect('/dashboard/posts')->with('form_toast', [
            'title' => 'Post Deleted',
            'description' => 'Post has been deleted!',
            'type' => 'success'
        ]);
    }

    public function checkSlug(Request $request)
    {
        $slug = Post::firstWhere('slug', $request['slug']);
        $available = true;
        if($slug) $available = false;
        return response()->json(['slug' => $available], 200);
    }
}
