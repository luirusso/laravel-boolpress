<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ], [
            'required' => 'The ":attribute" is a required field!',
            'max' => 'Max :max characters allowed for this field!'
        ]);

        $data = $request->all();

        $new_post = new Post();

        // GENERATE UNIQUE SLUG
        $slug = Str::slug($data['title'], '-');
        $count = 1;

        while(Post::where('slug', $slug)->first() ) {
            $slug .= '-' . $count;
            $count++;
        }
        $data['slug'] = $slug;

        $new_post->fill($data); //!!REQUIRES MASS ASSIGNMENT ON MODEL!!

        $new_post->save();

        return redirect()->route('admin.posts.show', $new_post->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();

        if (! $post) {
            abort(404);
        }

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        
        if(! $post) {
            abort(404);
        }

        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'title' => 'required|max:255',
        //     'content' => 'required',
        // ], [
        //     'required' => 'The ":attribute" is a required field!',
        //     'max' => 'Max :max characters allowed for this field!'
        // ]);

        $request->validate($this->validation_rules(), $this->validation_messages() );

        $data = $request->all();

        $post = Post::find($id);

        if($data['title'] != $post->title) {
            $slug = Str::slug($data['title'], '-');
            $count = 1;

            while(Post::where('slug', $slug)->first() ) {
                $slug .= '-' . $count;
                $count++;
            }
            $data['slug'] = $slug;
        }
        else {
            $data['slug'] = $post->slug;
        }

        $post->update($data); // NO SAVE NEEDED

        return redirect()->route('admin.posts.show', $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }




    /**
     * VALIDATION RULES
     */
    private function validation_rules() {
        return [
            'title' => 'required|max:255',
            'content' => 'required',
        ];
    }

    private function validation_messages() {
        return [
            'required' => 'The ":attribute" is a required field!',
            'max' => 'Max :max characters allowed for this field!'
        ];
    }
}
