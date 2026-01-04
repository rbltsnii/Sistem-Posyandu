@extends('layouts.app')

@section('content')
<h1 class="title">Dashboard Pengguna</h1>
<p class="subtitle">Selamat Datang, {{ Auth::user()->name }}</p>

<div class="columns">
    <div class="column">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">Data Penimbangan Terbaru</p>
            </header>
            <div class="card-content">
                <table class="table is-fullwidth is-striped">
                    <thead>
                        <tr>
                            <th>Balita</th>
                            <th>Tanggal</th>
                            <th>Berat (kg)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recent_penimbangans as $p)
                        <tr>
                            <td>{{ $p->balita->nama }}</td>
                            <td>{{ $p->tgl_penimbangan }}</td>
                            <td>{{ $p->berat_badan }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">Belum ada data.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <a href="{{ route('penimbangans.index') }}" class="button is-small is-link is-light mt-3">Lihat Semua Data</a>
            </div>
        </div>
    </div>

    <div class="column">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">Jadwal Imunisasi</p>
            </header>
            <div class="card-content">
                <table class="table is-fullwidth is-striped">
                    <thead>
                        <tr>
                            <th>Balita</th>
                            <th>Tanggal</th>
                            <th>Jenis</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($upcoming_imunisasis as $i)
                        <tr>
                            <td>{{ $i->balita->nama }}</td>
                            <td>{{ $i->tgl_imunisasi }}</td>
                            <td>{{ $i->jenis_imunisasi }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">Belum ada data mendatang.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <a href="{{ route('imunisasies.index') }}" class="button is-small is-link is-light mt-3">Lihat Semua Data</a>
            </div>
        </div>
    </div>
</div>
@endsection
