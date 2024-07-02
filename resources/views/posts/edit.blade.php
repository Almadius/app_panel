@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Post</h1>
        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control">{{ $post->content }}</textarea>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="published" {{ $post->status == 'published' ? 'selected' : '' }}>Published</option>
                    <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>Draft</option>
                </select>
            </div>
            <div class="form-group">
                <label for="categories">Categories</label>
                <select name="categories[]" id="categories" class="form-control" multiple>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ in_array($category->id, $post->categories->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>

        <h2 class="mt-4">Post Images</h2>
        <form action="{{ route('post-images.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <div class="form-group">
                <label for="image">Upload Image</label>
                <input type="file" name="image_path" id="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>

        <div class="mt-4">
            <h3>Existing Images</h3>
            @foreach($post->images as $image)
                <div class="d-flex align-items-center mb-2">
                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="Image" class="img-thumbnail" width="100">
                    <form action="{{ route('post-images.destroy', $image->id) }}" method="POST" class="ml-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection
