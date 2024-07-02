@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ isset($category) ? 'Edit Category' : 'Create Category' }}</h1>
        <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="POST">
            @csrf
            @if(isset($category))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $category->name ?? '' }}">
            </div>
            <button type="submit" class="btn btn-success">{{ isset($category) ? 'Update' : 'Create' }}</button>
        </form>
    </div>
@endsection
