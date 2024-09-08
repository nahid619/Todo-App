@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Edit Profile</h2>

    @if (session('status') === 'profile-updated')
        <div class="alert alert-success" role="alert">
            Profile updated successfully!
        </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="form-group">
            <label for="password">Password (leave blank to keep current password)</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>
@endsection
