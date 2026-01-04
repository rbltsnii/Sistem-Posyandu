@extends('layouts.app')

@section('content')
<h1 class="title">Edit Balita</h1>

<div class="columns">
    <div class="column is-hald">
        <form action="{{ route('balitas.update', $balita) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="field">
                <label class="label">Nama Balita</label>
                <div class="control">
                    <input class="input" type="text" name="nama" value="{{ $balita->nama }}" required>
                </div>
            </div>

            <div class="field">
                <label class="label">NIK</label>
                <div class="control">
                    <input class="input" type="text" name="nik" value="{{ $balita->nik }}" required>
                </div>
            </div>

            <div class="field">
                <label class="label">Tanggal Lahir</label>
                <div class="control">
                    <input class="input" type="date" name="tgl_lahir" value="{{ $balita->tgl_lahir }}" required>
                </div>
            </div>

            <div class="field">
                <label class="label">Jenis Kelamin</label>
                <div class="control">
                    <div class="select">
                        <select name="jenis_kelamin" required>
                            <option value="L" {{ $balita->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ $balita->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
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
                                <option value="{{ $parent->id }}" {{ $balita->user_id == $parent->id ? 'selected' : '' }}>{{ $parent->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="field">
                <label class="label">Berat Lahir (kg)</label>
                <div class="control">
                    <input class="input" type="number" step="0.1" name="berat_lahir" value="{{ $balita->berat_lahir }}">
                </div>
            </div>

            <div class="field">
                <label class="label">Tinggi Lahir (cm)</label>
                <div class="control">
                    <input class="input" type="number" step="0.1" name="tinggi_lahir" value="{{ $balita->tinggi_lahir }}">
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button class="button is-primary">Simpan Perubahan</button>
                    <a href="{{ route('balitas.index') }}" class="button is-light">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
