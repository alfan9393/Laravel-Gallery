@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

<div class="col-md-8">

<div class="card shadow-sm">

<div class="card-body text-center">

<h3 class="mb-3">Dashboard User</h3>

<p class="text-muted">
Selamat datang <b>{{ session('username') }}</b>
</p>

<hr>

<p>
Silakan melihat galeri foto dan memberikan komentar.
</p>

<a href="/" class="btn btn-primary">
Lihat Galeri
</a>

</div>

</div>

</div>

</div>

@endsection]