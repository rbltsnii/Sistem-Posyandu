@extends('layouts.app')

@section('content')
<h1 class="title">Tambah Balita</h1>

<div class="columns">
    <div class="column is-hald">
        <form action="{{ route('balitas.store') }}" method="POST">
            @csrf
            
            <div class="field">
                <label class="label">Nama Balita</label>
                <div class="control">
                    <input class="input" type="text" name="nama" required>
                </div>
            </div>

            <div class="field">
                <label class="label">NIK</label>
                <div class="control">
                    <input class="input" type="text" name="nik" required>
                </div>
            </div>

            <div class="field">
                <label class="label">Tanggal Lahir</label>
                <div class="control">
                    <input class="input" type="date" name="tgl_lahir" required>
                </div>
            </div>

            <div class="field">
                <label class="label">Jenis Kelamin</label>
                <div class="control">
                    <div class="select">
                        <select name="jenis_kelamin" required>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="field">
                <label class="label">Orang Tua</label>
                <div class="control">
                    <div class="select">
                        <select name="user_id" required>
                            @foreach($parents as $parent)
                                <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="field">
                <label class="label">Berat Lahir (kg)</label>
                <div class="control">
                    <input class="input" type="number" step="0.1" name="berat_lahir">
                </div>
            </div>

            <div class="field">
                <label class="label">Tinggi Lahir (cm)</label>
                <div class="control">
                    <input class="input" type="number" step="0.1" name="tinggi_lahir">
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button class="button is-primary">Simpan</button>
                    <a href="{{ route('balitas.index') }}" class="button is-light">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
