<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Post Archive
     */
    public function index() {
        // return 'POST JSON HERE';

        $posts = Post::orderBy('id', 'desc')->paginate(2);

        return response()->json($posts);
    }

    public function show($slug) {
        
        // ONLY POSTS WITH NO CATEGS AND TAGS
        $post = Post::where('slug', $slug)->with(['category', 'tags'])->first();
        
        if(! $post) {
            $post['not_found'] = true;
        } elseif($post->cover) {
            $post->cover = url('storage/' . $post->cover);
        }

        return response()->json($post);
    }
}
