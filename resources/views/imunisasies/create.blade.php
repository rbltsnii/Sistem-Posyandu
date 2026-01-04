@extends('layouts.app')

@section('content')
<h1 class="title">Catat Imunisasi</h1>

<div class="columns">
    <div class="column is-half">
        <form action="{{ route('imunisasies.store') }}" method="POST">
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
                <label class="label">Tanggal Imunisasi</label>
                <input class="input" type="date" name="tgl_imunisasi" value="{{ date('Y-m-d') }}" required>
            </div>

            <div class="field">
                <label class="label">Jenis Imunisasi</label>
                <div class="select is-fullwidth">
                    <select name="jenis_imunisasi" required>
                        <option>BCG</option>
                        <option>Polio 1</option>
                        <option>Polio 2</option>
                        <option>Polio 3</option>
                        <option>Polio 4</option>
                        <option>DPT-HB-Hib 1</option>
                        <option>DPT-HB-Hib 2</option>
                        <option>DPT-HB-Hib 3</option>
                        <option>Campak</option>
                    </select>
                </div>
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
