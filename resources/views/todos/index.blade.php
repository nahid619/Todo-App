@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4 text-center font-weight-bold">Todo List</h1>

        <!-- Todo List -->
        <ul class="list-group mb-4">
        @foreach (session('todos', []) as $index => $todo)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $todo }}
                <div>
                    <a href="{{ route('todos.edit', $index) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ route('todos.delete', $index) }}" class="btn btn-danger btn-sm">Delete</a>
                </div>
            </li>
        @endforeach
        </ul>


        
        <!-- Add Todo Form -->
        <h2 class="text-center mb-4">Add Todo</h2>
        <form method="POST" action="{{ route('todos.add') }}" class="mb-4">
            @csrf
            <div class="form-group">
                <input type="text" name="todo" class="form-control" placeholder="Enter new todo" required>
            </div>
            <button type="submit" class="btn btn-primary btn-lg w-100">Add</button>
        </form>
    </div>
@endsection
