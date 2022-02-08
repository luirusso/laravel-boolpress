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

        $posts = Post::all();

        return response()->json($posts);
    }
}
