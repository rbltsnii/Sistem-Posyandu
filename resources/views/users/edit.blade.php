@extends('layouts.app')

@section('content')
<h1 class="title">Edit User</h1>

<div class="columns">
    <div class="column is-half">
        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="field">
                <label class="label">Nama</label>
                <div class="control">
                    <input class="input" type="text" name="name" value="{{ $user->name }}" required>
                </div>
            </div>

            <div class="field">
                <label class="label">Email</label>
                <div class="control">
                    <input class="input" type="email" name="email" value="{{ $user->email }}" required>
                </div>
            </div>

            <div class="field">
                <label class="label">Password (Biarkan kosong jika tidak ingin mengganti)</label>
                <div class="control">
                    <input class="input" type="password" name="password">
                </div>
            </div>

            <div class="field">
                <label class="label">Role</label>
                <div class="control">
                    <div class="select">
                        <select name="role" required>
                            <option value="parent" {{ $user->role == 'parent' ? 'selected' : '' }}>Pengguna</option>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button class="button is-primary">Simpan Perubahan</button>
                    <a href="{{ route('users.index') }}" class="button is-light">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
