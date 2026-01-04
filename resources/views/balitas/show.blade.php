@extends('layouts.app')

@section('content')
<nav class="breadcrumb" aria-label="breadcrumbs">
  <ul>
    <li><a href="{{ route('balitas.index') }}">Data Balita</a></li>
    <li class="is-active"><a href="#" aria-current="page">{{ $balita->nama }}</a></li>
  </ul>
</nav>

<h1 class="title">Detail Balita</h1>

<div class="tile is-ancestor">
    <div class="tile is-parent is-vertical is-4">
        <div class="tile is-child box">
            <p class="title is-4">{{ $balita->nama }}</p>
            <p class="subtitle is-6">
                @if($balita->jenis_kelamin == 'L')
                    <span class="icon is-small has-text-info"><i class="fas fa-mars"></i></span> Laki-laki
                @else
                    <span class="icon is-small has-text-danger"><i class="fas fa-venus"></i></span> Perempuan
                @endif
            </p>
            
            <table class="table is-fullwidth is-striped">
                <tbody>
                    <tr>
                        <td><strong>NIK</strong></td>
                        <td>{{ $balita->nik }}</td>
                    </tr>
                    <tr>
                        <td><strong>Tgl Lahir</strong></td>
                        <td>{{ \Carbon\Carbon::parse($balita->tgl_lahir)->format('d F Y') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Usia</strong></td>
                        <td>{{ \Carbon\Carbon::parse($balita->tgl_lahir)->age }} Tahun</td>
                    </tr>
                    <tr>
                        <td><strong>Orang Tua</strong></td>
                        <td>{{ $balita->orangTua->name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Berat Lahir</strong></td>
                        <td>{{ $balita->berat_lahir }} kg</td>
                    </tr>
                    <tr>
                        <td><strong>Tinggi Lahir</strong></td>
                        <td>{{ $balita->tinggi_lahir }} cm</td>
                    </tr>
                </tbody>
            </table>

            @if(Auth::user()->isAdmin())
            <div class="buttons">
                <a href="{{ route('balitas.edit', $balita) }}" class="button is-warning is-fullwidth">Edit Data</a>
            </div>
            @endif
        </div>
    </div>

    <div class="tile is-parent is-vertical">
        <div class="tile is-child box">
            <p class="title is-4">Riwayat Penimbangan</p>
            <table class="table is-fullwidth is-hoverable">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Berat (kg)</th>
                        <th>Tinggi (cm)</th>
                        <th>Ket</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($balita->penimbangans()->latest()->get() as $penimbangan)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($penimbangan->tgl_penimbangan)->format('d M Y') }}</td>
                        <td>{{ $penimbangan->berat_badan }}</td>
                        <td>{{ $penimbangan->tinggi_badan }}</td>
                        <td>{{ $penimbangan->keterangan }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="has-text-centered has-text-grey">Belum ada data penimbangan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="tile is-child box">
            <p class="title is-4">Riwayat Imunisasi</p>
            <table class="table is-fullwidth is-hoverable">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Jenis Imunisasi</th>
                        <th>Ket</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($balita->imunisasis()->latest()->get() as $imunisasi)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($imunisasi->tgl_imunisasi)->format('d M Y') }}</td>
                        <td>{{ $imunisasi->jenis_imunisasi }}</td>
                        <td>{{ $imunisasi->keterangan }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="has-text-centered has-text-grey">Belum ada data imunisasi.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
