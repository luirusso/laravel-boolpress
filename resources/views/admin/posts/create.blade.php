@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-5">
            Create new Post
        </h1>
        
        {{-- VALIDATION ERRORS --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                Si sono verificati degli errori.
            </div>
        @endif

        
        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label" for="title">Title*</label>
                <input class="form-control" type="text" name="title" id="title" value="{{ old('title') }}">
                @error('title')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content*</label>
                <textarea class="form-control" name="content" id="content" rows="6">{{ old('content') }}</textarea>
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
                        <option value="{{ $category->id }}"
                            @if($category->id == old('category_id')) selected @endif>{{ $category->name }}
                        </option>
                    @endforeach
                    @error('category_id')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </select>
            </div>

            {{-- TAGS --}}
            <div class="mb-3">
                <h4>Tags</h4>

                @foreach($tags as $tag)
                    <span class="d-inline-block mr-3">
                        <input type="checkbox" name="tags[]" id="tag{{ $loop->iteration }}" value="{{ $tag->id }}" @if(in_array($tag->id, old('tags' , [])) ) checked @endif>

                        <label for="tag{{ $loop->iteration }}">
                            {{ $tag->name }}
                        </label>
                    </span>
                @endforeach
                @error('tags')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            {{-- POST COVER IMAGE --}}
            <div class="mb-3">
                <label class="form-label" for="cover" id="cover" name="cover">Post image</label>
                <input class="form-control-file" type="file" name="cover" id="cover">
                @error('cover')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>
@endsection