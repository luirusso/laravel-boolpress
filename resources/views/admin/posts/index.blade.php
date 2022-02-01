@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Blog Posts</h1>

        @if ($posts->isEmpty())
            <p>No posts yet. <a href="{{ route('admin.posts.create') }}">Create a new one?</a></p>

        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Title
                        </th>
                        <th colspan="3">

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>
                                {{ $post->id }}
                            </td>
                            <td>
                                {{ $post->title }}
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('admin.posts.show', $post->slug) }}">Show</a>
                            </td>
                            <td><a class="btn btn-warning" href="{{ route('admin.posts.edit', $post->id) }}">Edit</a></td>
                            <td>Delete</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection