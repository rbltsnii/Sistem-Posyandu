@extends('layouts.app')

@section('content')
<h1 class="title">Tambah User Baru</h1>

<div class="columns">
    <div class="column is-half">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div class="field">
                <label class="label">Nama</label>
                <div class="control">
                    <input class="input" type="text" name="name" required>
                </div>
            </div>

            <div class="field">
                <label class="label">Email</label>
                <div class="control">
                    <input class="input" type="email" name="email" required>
                </div>
            </div>

            <div class="field">
                <label class="label">Password</label>
                <div class="control">
                    <input class="input" type="password" name="password" required>
                </div>
            </div>

            <div class="field">
                <label class="label">Role</label>
                <div class="control">
                    <div class="select">
                        <select name="role" required>
                            <option value="parent">Pengguna</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button class="button is-primary">Simpan</button>
                    <a href="{{ route('users.index') }}" class="button is-light">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
