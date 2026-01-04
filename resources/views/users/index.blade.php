@extends('layouts.app')

@section('content')
<nav class="level">
    <div class="level-left">
        <div class="level-item">
            <h1 class="title">Manajemen Pengguna</h1>
        </div>
    </div>
    <div class="level-right">
        <div class="level-item">
            <a href="{{ route('users.create') }}" class="button is-primary">Tambah User</a>
        </div>
    </div>
</nav>

<div class="box">
    <table class="table is-fullwidth is-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Tgl Dibuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <span class="tag {{ $user->role == 'admin' ? 'is-danger' : 'is-success' }}">
                        {{ $user->role == 'admin' ? 'Admin' : 'Pengguna' }}
                    </span>
                </td>
                <td>{{ $user->created_at->format('d M Y') }}</td>
                <td>
                    <div class="buttons are-small">
                        <a href="{{ route('users.edit', $user) }}" class="button is-warning">Edit</a>
                        <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Yakin hapus user ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button is-danger">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
