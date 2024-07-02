@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ isset($role) ? 'Edit Role' : 'Create Role' }}</h1>
        <form action="{{ isset($role) ? route('roles.update', $role->id) : route('roles.store') }}" method="POST">
            @csrf
            @if(isset($role))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $role->name ?? '' }}">
            </div>
            <button type="submit" class="btn btn-success">{{ isset($role) ? 'Update' : 'Create' }}</button>
        </form>
    </div>
@endsection
