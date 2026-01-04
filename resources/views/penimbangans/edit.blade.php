@extends('layouts.app')

@section('content')
<h1 class="title">Edit Penimbangan</h1>

<div class="columns">
    <div class="column is-half">
        <form action="{{ route('penimbangans.update', $penimbangan) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="field">
                <label class="label">Balita</label>
                <div class="select is-fullwidth">
                    <select name="balita_id" required>
                        @foreach($balitas as $balita)
                        <option value="{{ $balita->id }}" {{ $penimbangan->balita_id == $balita->id ? 'selected' : '' }}>{{ $balita->nama }} ({{ $balita->nik }})</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="field">
                <label class="label">Tanggal Penimbangan</label>
                <input class="input" type="date" name="tgl_penimbangan" value="{{ $penimbangan->tgl_penimbangan }}" required>
            </div>

            <div class="field">
                <label class="label">Berat Badan (kg)</label>
                <input class="input" type="number" step="0.1" name="berat_badan" value="{{ $penimbangan->berat_badan }}" required>
            </div>

            <div class="field">
                <label class="label">Tinggi Badan (cm)</label>
                <input class="input" type="number" step="0.1" name="tinggi_badan" value="{{ $penimbangan->tinggi_badan }}" required>
            </div>
            
            <div class="field">
                <label class="label">Lingkar Kepala (cm)</label>
                <input class="input" type="number" step="0.1" name="lingkar_kepala" value="{{ $penimbangan->lingkar_kepala }}">
            </div>

            <div class="field">
                <label class="label">Keterangan</label>
                <textarea class="textarea" name="keterangan">{{ $penimbangan->keterangan }}</textarea>
            </div>

            <div class="control">
                <button class="button is-primary">Simpan Perubahan</button>
                <a href="{{ route('penimbangans.index') }}" class="button is-light">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
