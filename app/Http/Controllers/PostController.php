<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['category', 'author'])->latest();

        if (request('search') || request('category') || request('author') || request('page')) {
            $posts->filter(request(['search', 'category', 'author']));
            $view = request('page') === '1' && (!request('search') && !request('category') && !request('author')) ? 'posts' : 'result-posts';
            return view($view, [
                "title" => "Blog",
                "title_2nd" => "",
                "title_page" => 'Blog',
                "posts" => $posts->paginate(9)->withQueryString(),
            ]);
        }
        return view('posts', [
            "title" => "Blog",
            "title_2nd" => "",
            "title_page" => "Blog",
            "posts" => $posts->paginate(9)
        ]);
    }

    public function show($post)
    {
        $getPost = Post::firstWhere('slug', $post);
        return view('post', [
            "title" => "Blog",
            "title_2nd" => $getPost->title ?? '',
            "post" => $getPost
        ]);
    }
    
    public function categories(){
        return view('categories', [
            "title" => "Blog",
            "title_2nd" => "Categories",
            "categories" => Category::all()
        ]);
    }

    public function category(Category $category){
        return view('result-posts', [
            "title" => "Blog",
            "title_2nd" => $category->name,
            "posts" => $category->posts->load('category', 'author'),
            "title_page" => 'Result for Category: ' . $category->name,
        ]);
    }

    public function author(User $author){
        return view('result-posts', [
            "title" => "Blog",
            "title_2nd" => $author->name,
            "title_page" => 'Author by: ' . $author->name,
            "posts" => $author->posts->load('category', 'author'),
        ]);
    }
}
