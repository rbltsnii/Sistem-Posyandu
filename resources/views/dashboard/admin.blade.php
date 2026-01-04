@extends('layouts.app')

@section('content')
<h1 class="title">Admin Dashboard</h1>

<div class="tile is-ancestor">
    <div class="tile is-parent">
        <article class="tile is-child box notification is-info">
            <p class="title">{{ $total_balita }}</p>
            <p class="subtitle">Total Balita</p>
        </article>
    </div>
    <div class="tile is-parent">
        <article class="tile is-child box notification is-success">
            <p class="title">{{ $total_penimbangan }}</p>
            <p class="subtitle">Data Penimbangan</p>
        </article>
    </div>
    <div class="tile is-parent">
        <article class="tile is-child box notification is-warning">
            <p class="title">{{ $total_imunisasi }}</p>
            <p class="subtitle">Data Imunisasi</p>
        </article>
    </div>
    <div class="tile is-parent">
        <article class="tile is-child box notification is-danger">
            <p class="title">{{ $total_users }}</p>
            <p class="subtitle">Total Pengguna</p>
        </article>
    </div>
</div>
@endsection
