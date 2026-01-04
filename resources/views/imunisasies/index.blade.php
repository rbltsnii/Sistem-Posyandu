@extends('layouts.app')

@section('content')
<nav class="level">
    <div class="level-left">
        <h1 class="title">Data Imunisasi</h1>
    </div>
    <div class="level-right">
        @if(Auth::user()->isAdmin())
        <a href="{{ route('imunisasies.create') }}" class="button is-primary">Catat Imunisasi</a>
        @endif
    </div>
</nav>

<div class="box">
    <table class="table is-fullwidth is-striped">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Balita</th>
                <th>Jenis Imunisasi</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($imunisasis as $i)
            <tr>
                <td>{{ $i->tgl_imunisasi }}</td>
                <td>{{ $i->balita->nama }}</td>
                <td>{{ $i->jenis_imunisasi }}</td>
                <td>{{ $i->keterangan }}</td>
                <td>
                    @if(Auth::user()->isAdmin())
                    <div class="buttons are-small">
                        <a href="{{ route('imunisasies.edit', $i) }}" class="button is-warning">Edit</a>
                        <form action="{{ route('imunisasies.destroy', $i) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?')" style="display:inline;">
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
