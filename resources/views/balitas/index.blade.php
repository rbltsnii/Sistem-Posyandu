@extends('layouts.app')

@section('content')
<nav class="level">
    <div class="level-left">
        <div class="level-item">
            <h1 class="title">Data Balita</h1>
        </div>
    </div>
    <div class="level-right">
        @if(Auth::user()->isAdmin())
        <div class="level-item">
            <a href="{{ route('balitas.create') }}" class="button is-primary">Tambah Balita</a>
        </div>
        @endif
    </div>
</nav>

<div class="box">
    <div class="table-container">
        <table class="table is-fullwidth is-striped is-hoverable">
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Tgl Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Orang Tua</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($balitas as $balita)
                <tr>
                    <td>{{ $balita->nik }}</td>
                    <td>{{ $balita->nama }}</td>
                    <td>{{ $balita->tgl_lahir }}</td>
                    <td>{{ $balita->jenis_kelamin }}</td>
                    <td>{{ $balita->orangTua->name ?? '-' }}</td>
                    <td>
                        <div class="buttons are-small">
                            <a href="{{ route('balitas.show', $balita) }}" class="button is-info">Lihat</a>
                            @if(Auth::user()->isAdmin())
                                <a href="{{ route('balitas.edit', $balita) }}" class="button is-warning">Edit</a>
                                <form action="{{ route('balitas.destroy', $balita) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini? Data penimbangan/imunisasi terkait juga akan terhapus.')" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="button is-danger">Hapus</button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
