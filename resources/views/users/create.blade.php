@extends('layout')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('user.store') }}" class="">
            @csrf
            <div>
                <div class="form-group">
                    <label>Username</label>
                    <input name="name" type="text" value="{{ old('name', $users->name ?? null) }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input name="password" type="text" value="{{ old('password', $users->password ?? null) }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input name="email" type="text" value="{{ old('email', $users->email ?? null) }}" class="form-control" required>
                </div>
            </div>

            <button type="submit" class="btn btn-sm btn-outline-primary w-100 mt-2">Create</button>
        </form>
    </div>
@endsection
