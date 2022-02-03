@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-5">
            {{ $category->name }}
        </h1>

        @foreach ($category->posts as $post) 
            <article>
                <h2>
                    {{ $post->title }}
                    <a class="btn btn-primary"href="{{ route('admin.posts.show', $post->slug) }}">Show</a>
                    <a class="btn btn-warning" href="{{ route('admin.posts.show', $post->id) }}">Edit</a>
                    <hr>
                </h2>
            </article>
        @endforeach
    </div>
@endsection