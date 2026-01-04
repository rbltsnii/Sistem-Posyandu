@extends('layouts.app')

@section('content')
<h1 class="title">Edit Imunisasi</h1>

<div class="columns">
    <div class="column is-half">
        <form action="{{ route('imunisasies.update', $imunisasi) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="field">
                <label class="label">Balita</label>
                <div class="select is-fullwidth">
                    <select name="balita_id" required>
                        @foreach($balitas as $balita)
                        <option value="{{ $balita->id }}" {{ $imunisasi->balita_id == $balita->id ? 'selected' : '' }}>{{ $balita->nama }} ({{ $balita->nik }})</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="field">
                <label class="label">Tanggal Imunisasi</label>
                <input class="input" type="date" name="tgl_imunisasi" value="{{ $imunisasi->tgl_imunisasi }}" required>
            </div>

            <div class="field">
                <label class="label">Jenis Imunisasi</label>
                <div class="select is-fullwidth">
                    <select name="jenis_imunisasi" required>
                        @php
                            $jenis = ['BCG', 'Polio 1', 'Polio 2', 'Polio 3', 'Polio 4', 'DPT-HB-Hib 1', 'DPT-HB-Hib 2', 'DPT-HB-Hib 3', 'Campak'];
                        @endphp
                        @foreach($jenis as $j)
                            <option value="{{ $j }}" {{ $imunisasi->jenis_imunisasi == $j ? 'selected' : '' }}>{{ $j }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="field">
                <label class="label">Keterangan</label>
                <textarea class="textarea" name="keterangan">{{ $imunisasi->keterangan }}</textarea>
            </div>

            <div class="control">
                <button class="button is-primary">Simpan Perubahan</button>
                <a href="{{ route('imunisasies.index') }}" class="button is-light">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
