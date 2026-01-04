@extends('layouts.app')

@section('content')
<nav class="level">
    <div class="level-left">
        <h1 class="title">Data Penimbangan</h1>
    </div>
    <div class="level-right">
        @if(Auth::user()->isAdmin())
        <a href="{{ route('penimbangans.create') }}" class="button is-primary">Catat Penimbangan</a>
        @endif
    </div>
</nav>

<div class="box">
    <table class="table is-fullwidth is-striped">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Balita</th>
                <th>Berat (kg)</th>
                <th>Tinggi (cm)</th>
                <th>Lingkar Kepala (cm)</th>
                <th>Kader</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penimbangans as $p)
            <tr>
                <td>{{ $p->tgl_penimbangan }}</td>
                <td>{{ $p->balita->nama }}</td>
                <td>{{ $p->berat_badan }}</td>
                <td>{{ $p->tinggi_badan }}</td>
                <td>{{ $p->lingkar_kepala }}</td>
                <td>{{ $p->kader->name ?? '-' }}</td>
                <td>
                    @if(Auth::user()->isAdmin())
                    <div class="buttons are-small">
                        <a href="{{ route('penimbangans.edit', $p) }}" class="button is-warning">Edit</a>
                        <form action="{{ route('penimbangans.destroy', $p) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?')" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="button is-danger">Hapus</button>
                        </form>
                    </div>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
