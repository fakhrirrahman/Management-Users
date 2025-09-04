@extends('layouts.app')
@section('content')
<div class="p-5 bg-light rounded-3">
    <h1 class="display-6">Selamat datang, {{ $user->name }}</h1>
    <p class="lead">Anda login sebagai <strong>{{ $user->role }}</strong>.</p>
</div>
@endsection