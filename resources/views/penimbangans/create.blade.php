@extends('layouts.app')

@section('content')
<h1 class="title">Catat Penimbangan</h1>

<div class="columns">
    <div class="column is-half">
        <form action="{{ route('penimbangans.store') }}" method="POST">
            @csrf

            <div class="field">
                <label class="label">Balita</label>
                <div class="select is-fullwidth">
                    <select name="balita_id" required>
                        @foreach($balitas as $balita)
                        <option value="{{ $balita->id }}">{{ $balita->nama }} ({{ $balita->nik }})</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="field">
                <label class="label">Tanggal Penimbangan</label>
                <input class="input" type="date" name="tgl_penimbangan" value="{{ date('Y-m-d') }}" required>
            </div>

            <div class="field">
                <label class="label">Berat Badan (kg)</label>
                <input class="input" type="number" step="0.1" name="berat_badan" required>
            </div>

            <div class="field">
                <label class="label">Tinggi Badan (cm)</label>
                <input class="input" type="number" step="0.1" name="tinggi_badan" required>
            </div>
            
            <div class="field">
                <label class="label">Lingkar Kepala (cm)</label>
                <input class="input" type="number" step="0.1" name="lingkar_kepala">
            </div>

            <div class="field">
                <label class="label">Keterangan</label>
                <textarea class="textarea" name="keterangan"></textarea>
            </div>

            <div class="control">
                <button class="button is-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
