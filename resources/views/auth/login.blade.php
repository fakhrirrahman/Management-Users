@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
        <h4 class="mb-3">Login</h4>
        <form method="POST" action="{{ route('login.attempt') }}">@csrf
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="form-control @error('email') is-invalid @enderror" required autofocus>
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                    required>
                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                <label for="remember" class="form-check-label">Remember me</label>
            </div>
            <button class="btn btn-primary w-100" type="submit">Login</button>
        </form>
    </div>
</div>
@endsection