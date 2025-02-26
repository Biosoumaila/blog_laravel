<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\view;

class BlogController extends Controller
{
    public function index():View {
         $posts = \App\Models\Post::paginate(2);
        return view ('blog.index');
    }


    public function show(string $slug,  string $id): RedirectResponses | Post {
        $post = \App\Models\Post::findOrFail($id);
        if($post->slug != $slug) {
            return to_route('blog.show',['slug' => $post->slug,'id' => $post->id]);
        }
        return $post;    
    }
}
