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

        $posts = Post::paginate(2);

        return response()->json($posts);
    }

    public function show($slug) {
        
        // ONLY POSTS WITH NO CATEGS AND TAGS
        $post = Post::where('slug', $slug)->first();

        return response()->json($post);
    }
}
