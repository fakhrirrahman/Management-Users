@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Daftar User</h4>
    <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-primary">Tambah User</a>
</div>
<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Dibuat</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $u)
        <tr>
            <td>{{ $u->id }}</td>
            <td>{{ $u->name }}</td>
            <td>{{ $u->email }}</td>
            <td><span class="badge bg-{{ $u->role==='admin'?'danger':'secondary' }}">{{ $u->role }}</span></td>
            <td>{{ $u->created_at->format('Y-m-d') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $users->links() }}
@endsection