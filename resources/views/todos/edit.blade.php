@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center">Edit Todo</h2>
        <form method="POST" action="{{ route('todos.update') }}">
            @csrf
            <input type="hidden" name="index" value="{{ $index }}">
            <div class="form-group">
                <input type="text" name="todo" class="form-control" value="{{ $todo }}" required>
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
@endsection
