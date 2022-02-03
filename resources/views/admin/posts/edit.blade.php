@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-5">
            Edit "{{ $post->title }}"
        </h1>
        
        {{-- VALIDATION ERRORS --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                Si sono verificati degli errori.
            </div>
        @endif

        
        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="title" class="form-label" for="title">Title*</label>
                <input class="form-control" type="text" name="title" value="{{ old('title', $post->title) }}" id="title">
                @error('title')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content*</label>
                <textarea class="form-control" name="content" id="content" rows="6">{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- CATEGORIES --}}
            <div class="mb-3">
                <label for="category_id">Category</label>
                <select class="form-control" name="category_id" id="category_id">
                    <option value="">Uncategorized</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if($category->id == old('category_id', $post->category_id)) selected @endif>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Edit "{{ $post->title }}"</button>
        </form>
    </div>
@endsection